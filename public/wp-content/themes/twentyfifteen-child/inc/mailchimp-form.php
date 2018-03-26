<?php 

if ( is_single() || is_page() ) {
	$query = new WP_Query( array ( 
		'post_type' => 'mc4wp-form',
		'posts_per_page' => 1,
	) );

	$posts = $query->get_posts();

	if ( $posts && $post = $posts[0] ) {
		echo do_shortcode( '[mc4wp_form id="'.$post->ID.'"]' );
	}
}
