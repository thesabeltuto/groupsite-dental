<?php
global $wpdb;
$custom_select="SELECT * FROM ".$wpdb->prefix."customsettings WHERE id=1";
$custom_field = $wpdb->get_row($custom_select, OBJECT);

?>
		<!-- main content start -->
        <div class="main_content">
        	<!-- content start -->
        	<div class="content">
Z            	<div class="home_top_cont">
					<div id="offer-box">
						<div class="wrap">

							<div id="offer-heading"><?php if($_REQUEST['lang']=='es') echo "Oferta especial:"; else echo "Special Offer:"; ?></div>
							<div id="offer-wrap">
								<div id="offer">
									<h2>$<?php echo $custom_field->special_offer_amount; ?> / mo  <span class="size26"><?php if($_REQUEST['lang']=='es') echo "Implante dental completo"; else echo "Full Tooth Implant"; ?> </span></h2>
								</div>
							</div>
				
							<div id="offer-details">
								<ul id="offer-features">
									<li><?php if($_REQUEST['lang']=='es') echo "Incluye Post + corona"; else echo "Includes Post + Crown"; ?></li>
									<li><?php if($_REQUEST['lang']=='es') echo "Finanzas Garantizada 0%"; else echo "Guaranteed 0% Finance"; ?></li>
									<li><?php if($_REQUEST['lang']=='es') echo "(Condiciones)"; else echo "(Conditions apply)"; ?></li>
								</ul>
								<div id="btn_offer" class="action-button">
									<a href="http://www.wm4ddev2.com/contact-us/" class="consult cboxElement"><?php if($_REQUEST['lang']=='es') echo "Haga clic para consultar"; else echo "Click for Consult"; ?><div class="textwidget"></div></a>
								</div>
								<p class="expiration"><?php if($_REQUEST['lang']=='es') echo "* La oferta expira"; else echo "*Offer Expires "; ?><span class="time"><?php echo $custom_field->special_offer_date; ?></span></p>
							</div>
				
							<div id="offer-action-box">
								<a href="http://www.wm4ddev2.com/contact-us/" class="extend-offer extend cboxElement"><?php if($_REQUEST['lang']=='es') echo "Extender esta oferta"; else echo "Extend this Offer"; ?></a>
                            </div>
												
                       </div>
					</div>
                    <div class="map">
						<div class="map-head"> <?php if($_REQUEST['lang']=='es') echo "Elija una ubicaci�n"; else echo "Pick a Location"; ?><span><?php if($_REQUEST['lang']=='es') echo "Usted cercana"; else echo "Nearest You"; ?></span></div>
						<iframe width="378" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?hl=en&amp;client=firefox-a&amp;q=4195+Shields+Ave.+Fresno,+CA+93726&amp;ie=UTF8&amp;view=map&amp;cid=9510878442097892547&amp;ll=36.779827,-119.75459&amp;spn=0.006295,0.006295&amp;t=m&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.co.in/maps?hl=en&amp;client=firefox-a&amp;q=4195+Shields+Ave.+Fresno,+CA+93726&amp;ie=UTF8&amp;view=map&amp;cid=9510878442097892547&amp;ll=36.779827,-119.75459&amp;spn=0.006295,0.006295&amp;t=m&amp;iwloc=A&amp;source=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small>
						<div class="map-bottom"><?php if($_REQUEST['lang']=='es') echo "Tenemos"; else echo "We have"; ?> <span><?php if($_REQUEST['lang']=='es') echo "5 Fresno Ubicaciones"; else echo "5 Fresno Locations"; ?></span><?php if($_REQUEST['lang']=='es') echo "para su conveniencia."; else echo "for your convenience."; ?> </div>
                    </div>
                    <br class="spacer" />
                </div>
                <?php
				$my_id = ($_REQUEST['lang']=='es')?103:2;
				$post_id_7 = get_post($my_id); 
				$title = $post_id_7->post_title;
				$content=$post_id_7->post_content;
				?> 
                <div class="common_cont_area">
                	<h2><?php echo $title ;?></h2>
                    <div class="entry-content">
                       <?php echo $content ;?>
                    </div>
                </div>
            </div>
        	<!-- content end -->
        	<!-- sidebar start -->
            <?php get_sidebar(); ?>
        	<!-- sidebar end -->
            <br class="spacer" />
       