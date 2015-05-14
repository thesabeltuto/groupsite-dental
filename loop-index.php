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
               
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php if ( is_front_page() ) { ?>
						<h2><?php the_title(); ?></h2>
					<?php } else { ?>
						<h2><?php the_title(); ?></h2>
					<?php } ?>
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
				<?php //comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>

        <div id="web_side" class="web_only">
			<?php get_sidebar(); ?>                
        </div>
