<?php
add_action('admin_menu', 'register_custom_menu_page');

function register_custom_menu_page() {
   add_menu_page('Custom Settings', 'Custom Settings', 'add_users', 'custom.php', 'settings');
}


function settings()
{
	global $wpdb;
	$sql = "CREATE TABLE ".$wpdb->prefix."customsettings (
	  `id` INT NOT NULL AUTO_INCREMENT ,
		`header_contact_1` VARCHAR( 255 ) NOT NULL ,
		`header_contact_1_no` VARCHAR( 255 ) NOT NULL ,
		`header_contact_2` VARCHAR( 255 ) NOT NULL ,
		`header_contact_2_no` VARCHAR( 255 ) NOT NULL ,
		`header_contact_3` VARCHAR( 255 ) NOT NULL ,
		`header_contact_3_no` VARCHAR( 255 ) NOT NULL ,
		`header_contact_4` VARCHAR( 255 ) NOT NULL ,
		`header_contact_4_no` VARCHAR( 255 ) NOT NULL ,
		`header_contact_5` VARCHAR( 255 ) NOT NULL ,
		`header_contact_5_no` VARCHAR( 255 ) NOT NULL ,
		`slogan` VARCHAR( 255 ) NOT NULL ,
		`site_location` TEXT NOT NULL ,
		`header_site_title` VARCHAR( 255 ) NOT NULL ,
		`header_site_slogan` VARCHAR( 255 ) NOT NULL ,
		`special_offer_amount` INT NOT NULL ,
		`special_offer_date` DATE NOT NULL ,
		`why_choose_us` TEXT NOT NULL ,
		`multiple_office` TEXT NOT NULL ,
		`footer_text` TEXT NOT NULL ,
		PRIMARY KEY ( `id` ) 
	   );";
	
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	
	setup();
}

function setup()
{
	global $wpdb;
	/*------English-------*/
	if($_REQUEST['submit']!='')
	{
		
		$sql_select="SELECT * FROM ".$wpdb->prefix."customsettings WHERE id=1";
		$custom = $wpdb->get_row($sql_select, OBJECT);
		extract($_POST);
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		if(empty($custom)){
		$sql="INSERT INTO `dental`.`".$wpdb->prefix."customsettings` (
		`id` ,
		`why_choose_us_1` ,
		`multiple_office_1` ,
		`header_contact_1` ,
		`header_contact_1_no` ,
		`header_contact_2` ,
		`header_contact_2_no` ,
		`header_contact_3` ,
		`header_contact_3_no` ,
		`header_contact_4` ,
		`header_contact_4_no` ,
		`header_contact_5` ,
		`header_contact_5_no` ,
		`slogan` ,
		`site_location`,
		`header_site_title` ,
		`header_site_slogan` ,
		`special_offer_amount` ,
		`special_offer_date` ,
		`why_choose_us` ,
		`multiple_office`,
		`footer_text`
		)
		VALUES (
		NULL , '$why_choose_us_1', '$multiple_office_1', '$header_contact_1', '$header_contact_1_no', '$header_contact_2', '$header_contact_2_no', '$header_contact_3', '$header_contact_3_no', '$header_contact_4', '$header_contact_4_no', '$header_contact_5', '$header_contact_5_no', '$slogan', '$header_site_title', '$header_site_slogan', '$special_offer_amount', '$special_offer_date', '$why_choose_us', '$multiple_office','$footer_text'
		);";
		}
		else
		{
			$sql="UPDATE ".$wpdb->prefix."customsettings SET why_choose_us_1='$why_choose_us_1', multiple_office_1='$multiple_office_1',header_contact_1='$header_contact_1',header_contact_1_no='$header_contact_1_no',header_contact_2='$header_contact_2',header_contact_2_no='$header_contact_2_no',header_contact_3='$header_contact_3',header_contact_3_no='$header_contact_3_no',header_contact_4='$header_contact_4',header_contact_4_no='$header_contact_4_no',header_contact_5='$header_contact_5',header_contact_5_no='$header_contact_5_no',slogan='$slogan',site_location='$site_location',header_site_title='$header_site_title',header_site_slogan='$header_site_slogan',special_offer_amount='$special_offer_amount',special_offer_date='$special_offer_date',why_choose_us='$why_choose_us',multiple_office='$multiple_office',footer_text='$footer_text' WHERE id=1";
		}
		dbDelta($sql);
		
		
	}
	
	/*------Spanish-------*/
	if($_REQUEST['submit_es']!='')
	{
		
		$sql_select="SELECT * FROM ".$wpdb->prefix."customsettings WHERE id=2";
		$custom = $wpdb->get_row($sql_select, OBJECT);
		extract($_POST);
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		if(empty($custom)){
		$sql="INSERT INTO `dental`.`".$wpdb->prefix."customsettings` (
		`id` ,
		`why_choose_us_1` ,
		`multiple_office_1` ,
		`header_contact_1` ,
		`header_contact_1_no` ,
		`header_contact_2` ,
		`header_contact_2_no` ,
		`header_contact_3` ,
		`header_contact_3_no` ,
		`header_contact_4` ,
		`header_contact_4_no` ,
		`header_contact_5` ,
		`header_contact_5_no` ,
		`slogan` ,
		`site_location`,
		`header_site_title` ,
		`header_site_slogan` ,
		`special_offer_amount` ,
		`special_offer_date` ,
		`why_choose_us` ,
		`multiple_office`,
		`footer_text`
		)
		VALUES (
		NULL , '$why_choose_us_1', '$multiple_office_1', '$header_contact_1', '$header_contact_1_no', '$header_contact_2', '$header_contact_2_no', '$header_contact_3', '$header_contact_3_no', '$header_contact_4', '$header_contact_4_no', '$header_contact_5', '$header_contact_5_no', '$slogan', '$header_site_title', '$header_site_slogan', '$special_offer_amount', '$special_offer_date', '$why_choose_us', '$multiple_office','$footer_text'
		);";
		}
		else
		{
			$sql="UPDATE ".$wpdb->prefix."customsettings SET why_choose_us_1='$why_choose_us_1', multiple_office_1='$multiple_office_1',header_contact_1='$header_contact_1',header_contact_1_no='$header_contact_1_no',header_contact_2='$header_contact_2',header_contact_2_no='$header_contact_2_no',header_contact_3='$header_contact_3',header_contact_3_no='$header_contact_3_no',header_contact_4='$header_contact_4',header_contact_4_no='$header_contact_4_no',header_contact_5='$header_contact_5',header_contact_5_no='$header_contact_5_no',slogan='$slogan',site_location='$site_location',header_site_title='$header_site_title',header_site_slogan='$header_site_slogan',special_offer_amount='$special_offer_amount',special_offer_date='$special_offer_date',why_choose_us='$why_choose_us',multiple_office='$multiple_office',footer_text='$footer_text' WHERE id=2";
		}
		dbDelta($sql);
		
		
	}
	/*------Select English-------*/
	$sql_select="SELECT * FROM ".$wpdb->prefix."customsettings WHERE id=1";
	$custom = $wpdb->get_row($sql_select, OBJECT);
	
	
	/*------Select Spanish-------*/
	$sql_select_es="SELECT * FROM ".$wpdb->prefix."customsettings WHERE id=2";
	$custom_es = $wpdb->get_row($sql_select_es, OBJECT);
	?>
<h2>Custom Settings</h2>
<a href="#" onclick="language('en')">English</a>&nbsp;| &nbsp;<a href="#" onclick="language('es')">Spanish</a>
<div id="english">
<form name="custom" action="" method="post">
<table width="460" >
    <tr>
      <td width="141">Header contact  1</td>
      <td width="315"><input type="text" name="header_contact_1" value="<?php echo $custom->header_contact_1; ?>" />
      <input type="text" name="header_contact_1_no" value="<?php echo $custom->header_contact_1_no; ?>" /></td>
    </tr>
    <tr>
      <td>Header contact 2</td>
      <td><input type="text" name="header_contact_2" value="<?php echo $custom->header_contact_2; ?>" />
      <input type="text" name="header_contact_2_no" value="<?php echo $custom->header_contact_2_no; ?>" /></td>
    </tr>
    <tr>
      <td>Header contact 3</td>
      <td><input type="text" name="header_contact_3" value="<?php echo $custom->header_contact_3; ?>" />
      <input type="text" name="header_contact_3_no" value="<?php echo $custom->header_contact_3_no; ?>" /></td>
    </tr>
    <tr>
      <td>Header contact 4</td>
      <td><input type="text" name="header_contact_4" value="<?php echo $custom->header_contact_4; ?>" />
      <input type="text" name="header_contact_4_no" value="<?php echo $custom->header_contact_4_no; ?>" /></td>
    </tr>
    <tr>
      <td>Header contact 5</td>
      <td><input type="text" name="header_contact_5" value="<?php echo $custom->header_contact_5; ?>" />
      <input type="text" name="header_contact_5_no" value="<?php echo $custom->header_contact_5_no; ?>" /></td>
    </tr>
    <tr>
      <td>Site slogan</td>
      <td><input type="text" name="slogan" size="47" value="<?php echo $custom->slogan; ?>" /></td>
    </tr>
    <tr>
      <td>Site Location</td>
      <td><input type="text" name="site_location" size="47" value="<?php echo $custom->site_location; ?>" /></td>
    </tr>
    <tr>
      <td>Header site title</td>
      <td><input type="text" name="header_site_title" size="47" value="<?php echo $custom->header_site_title; ?>" /></td>
    </tr>
    <tr>
      <td>Header site slogan</td>
      <td><input type="text" name="header_site_slogan" size="47" value="<?php echo $custom->header_site_slogan; ?>" /></td>
    </tr>
    <tr>
      <td>Special offer amount</td>
      <td><input type="text" name="special_offer_amount" size="47" value="<?php echo $custom->special_offer_amount; ?>" /></td>
    </tr>
    <tr>
      <td>Special offer date</td>
      <td><input type="text" name="special_offer_date" size="47" value="<?php echo $custom->special_offer_date; ?>" /></td>
    </tr>
    <tr>
      <td valign="top">Bottom box 1</td>
      <td valign="top"><input type="text" name="why_choose_us" value="<?php echo $custom->why_choose_us; ?>" /><textarea name="why_choose_us_1" rows="3" cols="20"><?php echo $custom->why_choose_us_1; ?></textarea></td>
    </tr>
    <tr>
      <td valign="top">Bottom box 2</td>
      <td valign="top"><input type="text" name="multiple_office" value="<?php echo $custom->multiple_office; ?>" />
      <textarea name="multiple_office_1" rows="3" cols="20"><?php echo $custom->multiple_office_1; ?></textarea></td>
    </tr>
    <tr>
      <td valign="top">Footer Text</td>
      <td valign="top">
      <textarea name="footer_text" rows="3" cols="20"><?php echo $custom->footer_text; ?></textarea></td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
      <td valign="top"><input type="submit" name="submit" value="Save" /></td>
    </tr>
  </table>
</form>
</div>
<div id="spanish" style="display:none;">
<form name="custom" action="" method="post">
<table width="460" >
    <tr>
      <td width="141">Header contact  1</td>
      <td width="315"><input type="text" name="header_contact_1" value="<?php echo $custom_es->header_contact_1; ?>" />
      <input type="text" name="header_contact_1_no" value="<?php echo $custom_es->header_contact_1_no; ?>" /></td>
    </tr>
    <tr>
      <td>Header contact 2</td>
      <td><input type="text" name="header_contact_2" value="<?php echo $custom_es->header_contact_2; ?>" />
      <input type="text" name="header_contact_2_no" value="<?php echo $custom_es->header_contact_2_no; ?>" /></td>
    </tr>
    <tr>
      <td>Header contact 3</td>
      <td><input type="text" name="header_contact_3" value="<?php echo $custom_es->header_contact_3; ?>" />
      <input type="text" name="header_contact_3_no" value="<?php echo $custom_es->header_contact_3_no; ?>" /></td>
    </tr>
    <tr>
      <td>Header contact 4</td>
      <td><input type="text" name="header_contact_4" value="<?php echo $custom_es->header_contact_4; ?>" />
      <input type="text" name="header_contact_4_no" value="<?php echo $custom_es->header_contact_4_no; ?>" /></td>
    </tr>
    <tr>
      <td>Header contact 5</td>
      <td><input type="text" name="header_contact_5" value="<?php echo $custom_es->header_contact_5; ?>" />
      <input type="text" name="header_contact_5_no" value="<?php echo $custom_es->header_contact_5_no; ?>" /></td>
    </tr>
    <tr>
      <td>Site slogan</td>
      <td><input type="text" name="slogan" size="47" value="<?php echo $custom_es->slogan; ?>" /></td>
    </tr>
    <tr>
      <td>Site Location</td>
      <td><input type="text" name="site_location" size="47" value="<?php echo $custom_es->site_location; ?>" /></td>
    </tr>
    <tr>
      <td>Header site title</td>
      <td><input type="text" name="header_site_title" size="47" value="<?php echo $custom_es->header_site_title; ?>" /></td>
    </tr>
    <tr>
      <td>Header site slogan</td>
      <td><input type="text" name="header_site_slogan" size="47" value="<?php echo $custom_es->header_site_slogan; ?>" /></td>
    </tr>
    <tr>
      <td>Special offer amount</td>
      <td><input type="text" name="special_offer_amount" size="47" value="<?php echo $custom_es->special_offer_amount; ?>" /></td>
    </tr>
    <tr>
      <td>Special offer date</td>
      <td><input type="text" name="special_offer_date" size="47" value="<?php echo $custom_es->special_offer_date; ?>" /></td>
    </tr>
    <tr>
      <td valign="top">Bottom box 1</td>
      <td valign="top"><input type="text" name="why_choose_us" value="<?php echo $custom_es->why_choose_us; ?>" /><textarea name="why_choose_us_1" rows="3" cols="20"><?php echo $custom->why_choose_us_1; ?></textarea></td>
    </tr>
    <tr>
      <td valign="top">Bottom box 2</td>
      <td valign="top"><input type="text" name="multiple_office" value="<?php echo $custom_es->multiple_office; ?>" />
      <textarea name="multiple_office_1" rows="3" cols="20"><?php echo $custom_es->multiple_office_1; ?></textarea></td>
    </tr>
    <tr>
      <td valign="top">Footer Text</td>
      <td valign="top">
      <textarea name="footer_text" rows="3" cols="20"><?php echo $custom_es->footer_text; ?></textarea></td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
      <td valign="top"><input type="submit" name="submit_es" value="Save" /></td>
    </tr>
  </table>
</form>
</div>
    <?php
}