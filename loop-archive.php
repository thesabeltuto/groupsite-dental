<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content. See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Dental_GS
 * @since Dental  1.0
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php /*if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
	</div>
<?php endif;*/ ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In Dental  we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>

<?php while ( have_posts() ) : the_post(); ?>


		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h3 class="entry-title archives"><?php the_title(); ?></h3>

	<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<?php /*?><div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><?php */?>
	<?php endif; ?>

        </div>
        
<?php endwhile; // End the loop. Whew. ?>

<?php
global $wp_query;
$total_pages = $wp_query->max_num_pages;

if ($total_pages > 1) :
	$current_page = max(1, get_query_var('paged'));
	echo '<div id="page-below" class="navigation">';
	echo paginate_links(array(
		'base' => get_pagenum_link(1) . '%_%',
		'format' => '/page/%#%',
		'current' => $current_page,
		'total' => $total_pages,
		'prev_text' => '<span class="meta-nav">&larr;</span> Prev',
		'next_text' => 'Next <span class="meta-nav">&rarr;</span>'
	));
	echo '</div>';

endif;
?>
