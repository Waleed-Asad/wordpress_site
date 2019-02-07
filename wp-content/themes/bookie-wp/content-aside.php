<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package WordPress
 * @subpackage Bookie
 * @since Bookie 1.0
 */
?>

<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( is_sticky() && is_home() ) : ?>
        <span class="sticky-label"><?php esc_html_e( 'Sticky', 'bookie-wp' ); ?></span>
    <?php endif; ?>

    <div class="entry-content">
    	<?php the_content(); ?>
		<?php toko_link_pages(); ?>
		<?php toko_meta_date(); ?>
    </div>

</article>