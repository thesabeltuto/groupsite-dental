<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Dental_GS
 * @since Dental  1.0
 */
get_header(); 
?>
        <div class="main_content">
        	<div class="content">
                <div class="home_widgets">
                            <div class="home_left">
                                <?php dynamic_sidebar('home-left'); ?>
                            </div>
                            <div class="home_right">
                                <?php dynamic_sidebar('home-right'); ?>
                            </div>
                            <div class="clear"></div>
                </div>
                <div id="mobile_side" class="mobile_only">
                    <div class="clear"></div>
                </div>
               <div class="common_cont_area">
			<?php
			/* Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page' );
			?>
               </div>
			</div>
            <div id="web_side" class="web_only">
                <?php get_sidebar(); ?>                
            </div>
            <br class="spacer" />
<?php get_footer(); ?>