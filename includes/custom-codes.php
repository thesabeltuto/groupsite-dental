<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="<?php echo bloginfo("template_url"); ?>/css/style-ie.css" />
<![endif]-->

<?php	$custom_css = get_option('custom_css');
		$custom_script = get_option('custom_script');
		$custom_html = get_option('custom_html');
?>
<style>
<?php if($custom_css !='' || $custom_css != null ) echo $custom_css; ?>
</style>
<script>
<?php if($custom_script !='' || $custom_script != null ) echo $custom_script; ?>
</script>
<?php if($custom_html !='' || $custom_html != null ) echo $custom_html; ?>
