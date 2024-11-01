<?php
add_action( 'add_meta_boxes' , 'fbfba_add_meta_boxes');

/* META BOXES */

function fbfba_add_meta_boxes(){
// Shortcode meta box
	add_meta_box( 'fbfba_shortcode_meta_box' , 'Shortcode' , 'fbfba_shortcode_meta_box_UI' , 'fbfba_facebook_feed','side');
	 add_meta_box( 'fbfba_buy_premium_meta_box' , 'Buy Premium And:' , 'fbfba_premium_version' , 'fbfba_facebook_feed' , 'side' , 'high'); 
 add_meta_box( 'fbfba_promotion_meta_box2' , 'You may also need:' , 'fbfba_promotion2' , 'fbfba_facebook_feed' , 'side'); 


}
function fbfba_shortcode_meta_box_UI( $post ){
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

	?>
	<p id="fbfba_shortcode_label">Use this shortcode to add Facebook Feed in your Posts, Pages</p>
	<input style="width: 100%;
    text-align: center;
    font-weight: bold;
    font-size: 20px;" type="text" readonly id="fbfba_shortcode_value" name="fbfba_shortcode_value" value="[arrow_fb_feed id='<?php echo $post->ID; ?>']" />
	<p id="fbfba_shortcode_label">Add Facebook Feed into your Widgets, or in Header Widget area <a href="https://www.arrowplugins.com/facebook-feed">Buy Premium Version!</a></p>

	<?php
}

function fbfba_premium_version(){

 ?> <style type="text/css"> .fbfba-action-button{ width: 93%; text-align: center; background: #e14d43; display: block; padding: 18px 8px; font-size: 16px; border-radius: 5px; color: white; text-decoration: none; border: 2px solid #e14d43;

 transition: all 0.2s; } .fbfba-action-button:hover{ width: 93%; text-align: center; display: block; padding: 18px 8px; font-size: 16px; border-radius: 5px; color: white !important; text-decoration: none; background: #bb4138 !important; border: 2px solid #bb4138; }

 </style><strong> <ul> <li> - Unlock All Feed Templates</li> <li> - Unlock All Feed Styles</li> <li> - Unlock Hashtage Support</li> <li> - Unlock Unlimited Creation of Feeds</li> <li> - Unlock Widget Support</li> <li> - Unlock All Customization Optisons</li> <li> - Create 3, 4, 5, 6 Columns Masonry Feed</li> <li> - Custom Size for Thumbnail View</li> <li> - Get 24/7 Premium Support</li> <li> - Unlimited Updates</li> </ul> </strong> <a href="https://www.arrowplugins.com/facebook-feed/" target="_blank" class="fbfba-action-button">GET PREMIUM NOW</a> <?php }


 function fbfba_promotion2(){ ?> <style type="text/css"> #fbfba_promotion_meta_box2 .inside{ margin: 0 !important; padding:0; margin-top: 5px; } </style><p style="font-weight: bold; text-align: center;">WordPress Popup Plugin</p> <a href="https://www.arrowplugins.com/popup-plugin" target="_blank"><img width="100%" src="<?php echo plugins_url('images/promotion.png' , __FILE__); ?>" /></a> <p style="font-weight: bold; text-align: center;">Instagram Feed Plugin</p><a href="https://www.arrowplugins.com/instagram-feed" target="_blank"><img width="100%" src="<?php echo plugins_url('images/promo.png' , __FILE__); ?>" /></a><strong> <ul style="margin-left: 10px;">  </ul> </strong> <?php }  

