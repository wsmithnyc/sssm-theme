<div class="block-post-grid <?php block_field( 'className') ?>">
	
	<?php
	// Variables
	$post_count = block_value( 'number-of-posts' );
	$post_type  = block_value( 'post-type' );
	
	// WP_Query arguments
	$args = array(
		'post_type'         => array( $post_type ),
		'posts_per_page'    => $post_count,
	);
	
	// The Query
	$post_grid_query = new WP_Query( $args );
	
	// The Loop
	while ( $post_grid_query->have_posts() ) {
		$post_grid_query->the_post();
		?>
		
		<div class="block-post-grid--post">
			<div class="block-post-grid--post-thumbnail" style="background-image: url('<?php the_post_thumbnail_url( 'large' ); ?>');">
			</div>
			<div class="block-post-grid--post-content">
				<h4><?php the_title(); ?></h4>
				<p><?php the_excerpt(); ?></p>
				<a href="<?php the_permalink(); ?>" >Read More</a>
			</div>
		</div>
		
	<?php
	}
	
	// Restore original Post Data
	wp_reset_postdata();
	?>

</div>
