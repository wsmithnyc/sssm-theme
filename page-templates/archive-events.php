<?php
/*
* Archive Events Template - archive-events.php
*/

//This sets the custom post archive to display the fill content from each post.
add_filter( 'genesis_pre_get_option_content_archive','seaport_museum_cp_content_display' );
function seaport_museum_cp_content_display() {
	return 'full';
}

//This returns the post thumbnail
add_filter( 'genesis_pre_get_option_content_archive_thumbnail','seaport_museum_cp_image_display' );
function seaport_museum_cp_image_display() {
	return 1;
}

//Set the image thumbnail size (options: thumbnail, medium, large, and featured-image if defined in your theme)
add_filter( 'genesis_pre_get_option_image_size','seaport_museum_cp_image_size' );
function seaport_museum_cp_image_size() {
	return 'featured-image';
}

//Changes the image alignment.
add_filter( 'genesis_pre_get_option_image_alignment','seaport_museum_cp_image_alignment' );
function seaport_museum_cp_image_alignment() {
	return 'aligncenter';
}



// Remove default post title (with link)
remove_action( 'genesis_entry_header','genesis_do_post_title' );


// Function to display the post title without a link
function seaport_museum_cp_archive_title() {
	echo '<h2 class="title">' . get_the_title() . '</h2> ';
}

// Add the new post title without a link
add_action( 'genesis_entry_header','seaport_museum_cp_archive_title' );


genesis();
