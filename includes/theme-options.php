<?php /************ THESA - EDIT - THEME OPTIONS *************************/

// create custom plugin settings menu
add_action('admin_menu', 'theme_create_menu');
require_once('wm4d-functions.php');

// Global variables
$THEME_VERSION = '2.3.1';
$THEME_CSS_VERSION = '2.3';
$THEME_JS_VERSION = '2.3';
$THEME_ADMIN_CSS_VERSION = '2.3';
$THEME_ADMIN_JS_VERSION = '2.3';

if ( is_admin() ) {
	add_action('init', 'theme_custom_admin_init');
} 

add_action( 'wp_head', 'theme_custom_scripts' );
function theme_custom_scripts() {
    wp_register_script('custom-script', get_stylesheet_directory_uri() . '/js/thescripts.js', array( 'jquery' ), $GLOBALS['THEME_JS_VERSION'], false);	

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'custom-script');
	wp_enqueue_script( 'lightbox-script', get_stylesheet_directory_uri() . '/js/jquery.fancybox.pack.js', array( 'jquery' )	);
	wp_enqueue_script( 'jquery-cycle-script', get_stylesheet_directory_uri() . '/js/jquery.cycle.all.js', array( 'jquery' )	);
	
	require('custom-codes.php');
	require('shortcodes.php');
}

function theme_custom_admin_init() {
	wp_register_script('custom_header', get_template_directory_uri().'/js/media-script.js', array('jquery','media-upload','thickbox'), '', false);
    wp_register_script('theme-custom-admin.js', get_template_directory_uri() . '/js/admin.js', array('jquery'), $GLOBALS['THEME_ADMIN_JS_VERSION'], false);	
	wp_register_style('theme-custom-admin.css',  get_template_directory_uri() . '/css/admin.css', '', $GLOBALS['THEME_ADMIN_CSS_VERSION'], '');

	// enqueue scripts for uploader
	wp_enqueue_script('jquery');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
	wp_enqueue_script('custom_header');
	wp_enqueue_script('theme-custom-admin.js');	
	wp_enqueue_style('theme-custom-admin.css');
	
}



function theme_create_menu() {
	//create new top-level menu
	add_menu_page('Theme Options', 'Theme Options', 'administrator', __FILE__, 'theme_custom_page', '', 50 );

	//call register settings function
	add_action('admin_init', 'register_theme_options' );
}

function register_theme_options() {
	//register our settings
	register_setting( 'theme-options-group', 'custom_css' );
	register_setting( 'theme-options-group', 'custom_script' );
	register_setting( 'theme-options-group', 'custom_header' );
	register_setting( 'theme-options-group', 'custom_footer' );
	register_setting( 'theme-options-group', 'custom_testimonials' );
	register_setting( 'theme-options-group', 'custom_before_afters' );
	register_setting( 'theme-options-group', 'custom_office_images' );
	register_setting( 'theme-options-group', 'custom_html' );
}

function theme_custom_page() {

	?>
	<div class="wm4d_gs_d_wrap">
	<h1>Theme Options</h1>
	

    <div id="wm4d_nav_gs_d">
        <ul>
            <li id="wm4d_gs_d_li1"><a href="#">Custom Codes</a></li>
            <li id="wm4d_gs_d_li2"><a href="#">Theme Options</a></li>
            <li id="wm4d_gs_d_li3"><a href="#">Page Texts</a></li>
            <li id="wm4d_gs_d_li4"><a href="#">Support</a></li>
            <li id="wm4d_gs_d_li5"><a href="#">About</a></li>
       </ul>
    </div>
	
	<form method="post" action="options.php">
		<?php settings_fields( 'theme-options-group' );
				do_settings_sections( 'theme-options-group' ); ?>
        
        <div class="wm4d_gs_d_content" id="wm4d_gs_d_li-1">
			<h2>Custom Codes</h2>
	
    		<?php submit_button(); ?>

			<h3>Custom Style</h3>
			<div class="wm4d_section"><textarea type="text" name="custom_css" rows="7" cols="60" /><?php echo get_option('custom_css'); ?></textarea>
            <br />Enter your custom style in css. No need to add &lt;style&gt; tags.
            </div>
			<h3>Custom Script</h3>
			<div class="wm4d_section"><textarea type="text" name="custom_script" rows="7" cols="60" /><?php echo get_option('custom_script'); ?></textarea>
            <br />Enter your custom script in javascript or jquery. No need to add &lt;script&gt; tags.
            </div>
			<h3>Custom HTML</h3>
			<div class="wm4d_section"><textarea type="text" name="custom_html" rows="7" cols="60" /><?php echo get_option('custom_html'); ?></textarea>
            <br />Enter your custom scripts in javascript, jquery or css. Accepts HTML script and style tags.
            </div>

    		<?php submit_button(); ?>

		</div>

        
		<div class="wm4d_gs_d_content" id="wm4d_gs_d_li-2">
			<h2>Theme Options</h2>

    		<?php submit_button(); ?>

			<h3>Upload Header</h3>
			<div class="wm4d_section"><input id="custom_header" type="text" size="44" name="custom_header" value="<?php echo get_option('custom_header'); ?>" />
            <input id="custom_header_button" type="button" value="Upload Image" />
            <br />Enter an URL or upload an image for the banner.
            </div>

			<h3>Footer Text</h3>
			<div class="wm4d_section"><textarea type="text" name="custom_footer" rows="7" cols="60" /><?php echo get_option('custom_footer'); ?></textarea>
            <br />Enter desired footer text. Copyright and year is already in the template.
            </div>
            
    		<?php submit_button(); ?>

		</div>


		<div class="wm4d_gs_d_content" id="wm4d_gs_d_li-3">
			<h2>Page Texts</h2>

    		<?php submit_button(); ?>

			<h3>Before and Afters Page Text</h3>
			<div class="wm4d_section"><textarea type="text" name="custom_before_afters" rows="7" cols="60" /><?php echo get_option('custom_before_afters'); ?></textarea>
            <br />Enter your desired text for Before and Afters archive page.
            </div>

			<h3>Testimonials Page Text</h3>
			<div class="wm4d_section"><textarea type="text" name="custom_testimonials" rows="7" cols="60" /><?php echo get_option('custom_testimonials'); ?></textarea>
            <br />Enter your desired text for Testimonials archive page.
            </div>

			<h3>Office Images Page Text</h3>
			<div class="wm4d_section"><textarea type="text" name="custom_office_images" rows="7" cols="60" /><?php echo get_option('custom_office_images'); ?></textarea>
            <br />Enter your desired text for Office Images archive page.
            </div>

    		<?php submit_button(); ?>

		</div>
        
        
		<div class="wm4d_gs_d_content" id="wm4d_gs_d_li-4">
			<h2>Support</h2>
            
			<h3>Custom Codes</h3>
            <div class="wm4d_section wm4d_support">
            	<p>Custom Codes was created for you to be able to customize your website. This section saves your Styles and Scripts to the database.</p>
            	<p><strong>Custom Style</strong> is where you enter your custom style in css. No need to add &lt;style&gt; tags.</p>
                <p><strong>Custom Script</strong> is where you enter your custom script in javascript or jquery.</p>
                <p><strong>Custom HTML</strong> is where you add generated scripts like google scripts, etc. to be added inside the &lt;head&gt; of your website. This area accepts HTML script and style tags.</p>
            </div>

			<h3>Theme Options</h3>
            <div class="wm4d_section wm4d_support">
            	<p>Theme Options was created for you to be able to customize your website without having to edit the theme files and worry about the theme updates. This section saves your Header and Footer settings to the database.</p>
            	<p><strong>Upload Header</strong> is where you upload and select the header image for your website.</p>
                <p><strong>Footer Text</strong> is where you enter the footer text. Copyright and year is already in the template.</p>
            </div>
                        
			<h3>Page Texts</h3>
            <div class="wm4d_section wm4d_support">
            	<p>Page Texts is for a full customization of your archives page where you put descriptions to the Before and Afters, Testimonials and Office Images pages.</p>
            	<p><strong>Before and Afters Page Text</strong> is where you enter your desired text for Before and Afters archive page.</p>
            	<p><strong>Testimonials Page Text</strong> is where you enter your desired text for Testimonials archive page.</p>
            	<p><strong>Office Images Page Text</strong> is where you enter your desired text for Office Images archive page.</p>
            </div>


			<h3>Custom Post Types</h3>
            <div class="wm4d_section wm4d_support">
            	<p>Custom Post Types are created for ease of navigation and categorization of contents for your website.</p>
            	<p><strong>Procedures</strong> is where you add Procedures or Services contents. Contents posted in this section will be displayed as a regular post page.</p>
            	<p><strong>Offers</strong> is where you add offer contents. This custom post type is based on the original wm4d plugin. This is where you link your procedures to specific Offers. Contents posted in this section will be displayed as a regular post page.</p>
            	<p><strong>Testimonials</strong> is where you add Testimonial contents. Contents posted in this section will be displayed as a regular post page. A widget is available for this post type for you to display a slider section to your website.</p>
            	<p><strong>Office Images</strong> is where you add Office contents. Contents posted in this section will be displayed as a regular post page. A widget is available for this post type for you to display a slider section to your website.</p>
            </div>


			<h3>Widgets</h3>
            <div class="wm4d_section wm4d_support">
             	<p>Wigets are created to feature your Special Offers, Before and Afters, Office Images, and Testimonials in your website.</p>
           	<p><strong>Special Offer</strong> is widget where you can display your offers, NOT linked to any custom post type Offers above. Displaying different Special Offer to different Procedures or pages, you will need the <a href="https://wordpress.org/plugins/widget-context/" target="_blank">Widget Context</a> plugin.</p>
             	<p><strong>Before and Afters</strong> is a widget slider that will cycle all content posted in the custom post type Before and Afters. It will display the featured image of the content.</p>
            	<p><strong>Testimonials</strong> is a widget slider that will cycle all content posted in the custom post type Testimonials. It will display images, texts, embeds, iframes, etc.</p>
            	<p><strong>Office Images</strong> is a widget slider that will cycle all content posted in the custom post type Office Images. It will display the featured image of the content.</p>
           </div>

		</div>
        
		<div class="wm4d_gs_d_content" id="wm4d_gs_d_li-5">
			<h2>About</h2>
			<h3>Description</h3>
            <div class="wm4d_section about">
            	<p>This theme is a dental groupsite <a href="http://www.wm4d.com/" target="_blank">WM4D</a> theme that includes custom post types and widgets of  before and afters, prodecures, offers, office images and testimonials. This theme also includes theme options that can help you edit styles and scripts on dashboard.</p>
            </div>
            
            <h3>Version</h3>
            <div class="wm4d_section about">
                <p>Version: <?= $GLOBALS['THEME_VERSION']?></p>
            </div>

            <h3>Author</h3>
            <div class="wm4d_section about">
            	<p>Created by <a href="http://thesabeltuto.blogspot.com" target="_blank">Thesabel Tuto</a>. For questions, suggestions and bug reports please contact the author.</p>
            </div>
            
            <h3>Plugin Site</h3>
            <div class="wm4d_section about">
            	<p>Plugin site at <a href="http://ttplugins.wordpress.com/" target="_blank">TT Plugins</a>. Check out other plugins created by the author.</p>
            </div>
            
            <h3>Donate</h3>
            <div class="wm4d_section about">
            	<p>Donations are accepted via Paypal Donate to <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=H228JQZP6269J&lc=US&item_name=TT%2dPlugins%3a%20Support%20WordPress%20Plugin%20Development&item_number=TT%2dPlugins&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted" target="_blank">TT Plugins</a>. Please donate to support the author in improving this plugin and in creating more useful and helpful plugins. Thank you for supporting!</p>
            </div>
            
		</div>
        
	</form>
	</div>
<?php } ?>