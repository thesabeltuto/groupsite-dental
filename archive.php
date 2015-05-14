<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Dental_GS
 * @since Dental  1.0
 */
get_header(); ?>
			<div class="main_content">
			<div class="content">
            <div class="common_cont_area">
<?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>
			<h2 class="page-title">
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: <span>%s</span>', 'twentyten' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: <span>%s</span>', 'twentyten' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyten' ) ) ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: <span>%s</span>', 'twentyten' ), get_the_date( _x( 'Y', 'yearly archives date format', 'twentyten' ) ) ); ?>
<?php elseif ( is_post_type_archive( 'testimonials' ) ) : ?>
				<?php _e( 'Testimonials', 'twentyten' ); ?>
<?php elseif ( is_post_type_archive( 'before-and-afters' ) ) : ?>
				<?php _e( 'Before and Afters', 'twentyten' ); ?>
<?php elseif ( is_post_type_archive( 'office-images' ) ) : ?>
				<?php _e( 'Office Images', 'twentyten' ); ?>
<?php else : ?>
				<?php _e( 'Blog Archives', 'twentyten' ); ?>
<?php endif; ?>
			</h2>
<?php if ( is_post_type_archive( 'testimonials' ) ) : ?>       
    <div class="hentry"><?php echo get_option('custom_testimonials'); ?></div>
<?php elseif ( is_post_type_archive( 'before-and-afters' ) ) : ?>
    <div class="hentry"><?php echo get_option('custom_before_afters'); ?></div>
<?php elseif ( is_post_type_archive( 'office-images' ) ) : ?>
    <div class="hentry"><?php echo get_option('custom_office_images'); ?></div>
<?php endif; wp_reset_query(); ?>
<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();
	/* Run the loop for the archives page to output the posts.
	 * If you want to overload this in a child theme then include a file
	 * called loop-archive.php and that will be used instead.
	 */
	 get_template_part( 'loop', 'archive' );
?>
	</div>
			</div>
            <?php get_sidebar(); ?>
			 <?php get_footer(); ?>
		</div>