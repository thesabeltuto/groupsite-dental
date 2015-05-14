<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Dental_GS
 * @since Dental  1.0
 */

get_header(); 
?>
        <div class="main_content">
        	<div class="content">
                <div id="mobile_side" class="mobile_only">
                    <div class="clear"></div>
                </div>
               <div class="common_cont_area">
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
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