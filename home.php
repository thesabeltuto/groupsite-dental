<?php /* Template Name: Homepage Template */ 
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
                if ( have_posts() ) while ( have_posts() ) : the_post();
                                    if ( is_front_page() ) { ?>
                                        <h2><?php the_title(); ?></h2>
                                    <?php } else { ?>
                                        <h2><?php the_title(); ?></h2>
                                    <?php } ?>
                                    <div class="entry-content"?>
                                    <?php the_content();
                                        wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) );
                                        edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); 
                                //comments_template( '', true );
                endwhile; // end of the loop.  ?>
                </div>
            </div>
        </div> 
            
        <div id="web_side" class="web_only">
			<?php get_sidebar(); ?>                
        </div>

<?php get_footer(); ?>