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
function my_theme_post_date()
{
	$published = get_the_date();
	$str = sprintf('Published on %s. ', $published);
	$updated = get_the_modified_date();

	if ($published !== $updated) {
		$str .= sprintf('Updated on %s.', $updated);
	}

	printf('<div class="post-date">%s</div>', $str);
}
