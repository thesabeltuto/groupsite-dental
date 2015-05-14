<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Dental_GS
 * @since Dental  1.0
 */
?>
    <div class="clear"></div>
    <div id="bottom-content">
        <div class="footer_left">
           <?php dynamic_sidebar('footer-left'); ?>
        </div>
        <div class="footer_right">
            <?php dynamic_sidebar('footer-right'); ?>
        </div>
        <div class="clear"></div>
    </div>
</div>
    
<div class="footer">Copyright &copy; <?php echo date("Y") .' &mdash; '. get_option('custom_footer'); ?></div>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>
</body>
</html>