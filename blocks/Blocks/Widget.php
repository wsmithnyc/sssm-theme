<?php

namespace Blocks;

class Widget
{
	/**
	 * Renders the widget for a supplied post. Optionally provide a target date for ticket links
	 *
	 * If the post is not an 'event' type, then the ticket link will not be created.
	 *
	 * returns the html for the post's grid widget
	 *
	 * @param $post
	 *
	 * @return string
	 */
	public static function getWidgetHtml($post, $accentClass = '', $target_date = null)
	{
		//use the featured image for the post
		static $fallback_id = 0;
		
		if ( $fallback_id == 0 ) {
			//NOTE: Dependency on Plugin "display-featured-image-genesis
			if ( function_exists( 'displayfeaturedimagegenesis_get_setting' ) ) {
				$setting     = displayfeaturedimagegenesis_get_setting();
				$fallback_id = $setting['default'];
			}
		}
		
		$image_id = get_post_thumbnail_id($post);
		
		if (empty($image_id)) $image_id = $fallback_id;
		
		$thumbnail_img = wp_get_attachment_image($image_id, 'medium_large'); //widget-thumb   large medium_large
		
		$excerpt = $post->post_excerpt;
		
		if (strlen($excerpt) > 79) {
			$last_space = strpos( $excerpt, ' ', min( 80, strlen( $excerpt ) ) );
			
			$excerpt = substr( $excerpt, 0, min( $last_space, 90 ) );
		}
		
		//possibly use a custom field for the title when displaying the widget
		$custom_fields = get_post_custom( $post->ID );
		
		if (!empty(trim($custom_fields['widget-title'][0] ?? '')))
		{
			//title custom field was added to the page and populated with non-empty text
			$title = $custom_fields['widget-title'][0];
		}
		else
		{
			//use the posts title.
			$title = get_the_title($post);
		}
		
		
		//Trim long titles down to approximately fit in the display area.
		if (strlen($title) > 36) {
			$last_space = strpos( $title, ' ', min( 35, strlen( $title ) - 1 ) );
			
			if (!empty($last_space) && ($last_space < strlen($title)))
			{
				$title = substr( $title, 0, min( $last_space, 36 ) );
			}
		}
		
		$post_block_id = str_replace('.','', microtime(true));
		
		$block_head_class = $accentClass;
		
		
		$permalink = get_the_permalink($post);
		
		$ticket_url = '';
		
		if (!empty(trim($custom_fields['book-now-url'][0] ?? '')))
		{
			//title custom field was added to the page and populated with non-empty text
			$ticket_url = $custom_fields['book-now-url'][0];
		}
		
		
		//build the ticket button, or ignore if the post type is not an event
		$ticket_button = self::getTicketButton($ticket_url, $block_head_class);
		
		$page_button = self::getPageButton($permalink, $block_head_class);
		
		$excerptHtml = ''; // "<p class='block-post-grid--post-content-excerpt'>&nbsp;</p>";
		
		
		//get the categories
		
		$categories = wp_get_post_categories($post->ID);
		
		$category_data_tags = [];
		
		foreach ($categories as $category)
		{
			$category_data_tags[$category] = "data-category-$category='$category'";
		}
		
		$category_data_tags = implode(" ", $category_data_tags);
		
		
		if (!empty($excerpt))
		{
			$excerptHtml = "<p class='block-post-grid--post-content-excerpt'><a href='{$permalink}'>{$excerpt}</a></p>";
		}
		
		$html = "<div {$category_data_tags} class=\"block-post-grid--post\" id=\"block-{$post_block_id}\" data-url=\"{$permalink}\">
			<div onclick='window.location=\"{$permalink}\"' class=\"block-post-grid--post-thumbnail\" >{$thumbnail_img}</div>
			<div class=\"block-post-grid--post-content {$block_head_class} has-theme-white-color\">
				<h2><a href='{$permalink}'>{$title}</a></h2>
				<!--<p class=\"subtitle\">Subtitle</p>-->
				<div id=\"extra-{$post_block_id}\" class=\"block-post-grid--post-content-extra  {$block_head_class} has-theme-white-color\">
					{$excerptHtml}
				</div>
				<div class='{$block_head_class} block-post-grid--post-actions no-touch-hide'>{$ticket_button} {$page_button}</div>
			</div>
			
		</div>
		";
		
		return $html;
		
	}
	
	
	/**
	 * Build the Ticket Link button
	 * Will return empty space if the post is not an "event" type.
	 *
	 * @param string $block_head_class
	 * @param null $target_date
	 *
	 * @return string
	 */
	protected static function getTicketButton($ticket_url, $block_head_class = '')
	{
		if (empty(trim($ticket_url))) return '';
		
		return "<a class='event-button wp-block-button__link {$block_head_class}' href='{$ticket_url}'>BOOK NOW</a>";
	}
	
	/**
	 *
	 * Build the Page Link button
	 * Will return empty space if the post is not an "event" type.
	 *
	 * @param $permalink
	 * @param string $block_head_class
	 *
	 * @return string
	 */
	protected static function getPageButton($permalink, $block_head_class = '')
	{
		if (empty(trim($permalink))) return '';
		
		return "<a class='event-button wp-block-button__link {$block_head_class}' href='$permalink}'>LEARN MORE</a>";
	}

}
