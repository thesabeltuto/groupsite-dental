jQuery(document).ready(function($) {
	
	jQuery('div.wm4d_gs_d_content').hide();
	jQuery('div#wm4d_gs_d_li-1').show();
	jQuery('#wm4d_nav_gs_d li').removeClass('active');
	jQuery('#wm4d_nav_gs_d li#wm4d_gs_d_li1').addClass('active');
	jQuery('#wm4d_nav_gs_d li').click(function() {
		var id = jQuery(this).attr('id').substr(12); //wm4d_gs_d_li
			jQuery('div.wm4d_gs_d_content').hide();
			jQuery('#wm4d_nav_gs_d li').removeClass('active');
			jQuery('#wm4d_nav_gs_d li#wm4d_gs_d_li'+id).addClass('active');
			jQuery('div.wm4d_gs_d_content#wm4d_gs_d_li-'+id).show();
	});
	
});