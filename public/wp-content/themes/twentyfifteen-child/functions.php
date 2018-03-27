<?php

/**
 * Configure both parent and child themes's CSS files
 *
 * @author Junior Grossi
 */
function my_theme_enqueue_styles() {

    $parent_style = 'twentyfifteen-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail('large'); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
			the_post_thumbnail( 'large', array( 'alt' => get_the_title() ) );
		?>
	</a>

	<?php endif; // End is_singular()
}

/**
 * Display the post published date and updated date if present.
 */
function my_theme_post_date($show_updated = false)
{
	$published = get_the_date();
	$updated = get_the_modified_date();
	?>
	<div class="post-date">
		Published on <?php echo $published ?>.
		<?php if ($show_updated && strtotime($updated) > strtotime($published)): ?>
			Updated on <?php echo $updated ?>.
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Show the MailPoet Form #2 after all posts
 */
function add_mailpoet_form_after_post_content( $content )
{
	global $post;

	if (in_the_loop() && is_single() && $post->post_type == 'post') {
		$content .= do_shortcode('[mailpoet_form id="2"]');	
	}
	
	return $content;
}
add_filter( 'the_content', 'add_mailpoet_form_after_post_content' );

