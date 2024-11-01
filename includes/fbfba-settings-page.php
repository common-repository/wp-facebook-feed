<?php
wp_nonce_field( 'fbfba_ui_meta_box_nonce', 'fbfba_meta_box_nonce' );

global $post;
$fbfba_show_photos_from = get_post_meta($post->ID, '_fbfba_show_photos_from', true);
$fbfba_facebook_access_token = get_post_meta($post->ID, '_fbfba_facebook_access_token', true);
$fbfba_user_id = get_post_meta($post->ID, '_fbfba_user_id', true);
$fbfba_hashtag = get_post_meta($post->ID, '_fbfba_hashtag', true);
$fbfba_location = get_post_meta($post->ID, '_fbfba_location', true);
$fbfba_container_width = get_post_meta($post->ID, '_fbfba_container_width', true);
$fbfba_date_posted = get_post_meta($post->ID, '_fbfba_date_posted', true);
$fbfba_profile_picture = get_post_meta($post->ID, '_fbfba_profile_picture', true);
$fbfba_caption_text = get_post_meta($post->ID, '_fbfba_caption_text', true);
$fbfba_link_photos_to_instagram = get_post_meta($post->ID, '_fbfba_link_photos_to_instagram', true);
$fbfba_show_photos_only = get_post_meta($post->ID, '_fbfba_show_photos_only', true);
$fbfba_number_of_photos = get_post_meta($post->ID, '_fbfba_number_of_photos', true);
$fbfba_feed_style = get_post_meta($post->ID, '_fbfba_feed_style', true);
$fbfba_limit_post_characters = get_post_meta($post->ID, '_fbfba_limit_post_characters', true);
$fbfba_thumbnail_size = get_post_meta($post->ID, '_fbfba_thumbnail_size', true);
$fbfba_column_count = get_post_meta($post->ID, '_fbfba_column_count', true);
$fbfba_feed_post_size = get_post_meta($post->ID, '_fbfba_feed_post_size', true);
$fbfba_theme_selection = get_post_meta($post->ID, '_fbfba_theme_selection', true);
$fbfba_private_access_token = get_post_meta($post->ID, '_fbfba_private_access_token', true);
$fbfba_read_more = get_post_meta($post->ID, '_fbfba_read_more', true);

$fbfba_social_card_width = get_post_meta($post->ID, '_fbfba_social_card_width', true);
$fbfba_social_card_background_color = get_post_meta($post->ID, '_fbfba_social_card_background_color', true);
$fbfba_heading_font_size = get_post_meta($post->ID, '_fbfba_heading_font_size', true);
$fbfba_caption_font_size = get_post_meta($post->ID, '_fbfba_caption_font_size', true);
$fbfba_social_card_heading_color = get_post_meta($post->ID, '_fbfba_social_card_heading_color', true);
$fbfba_social_card_content_color = get_post_meta($post->ID, '_fbfba_social_card_content_color', true);
$fbfba_social_card_date_color = get_post_meta($post->ID, '_fbfba_social_card_date_color', true);
$fbfba_feed_profile_style = get_post_meta($post->ID, '_fbfba_feed_profile_style', true);
$fbfba_hide_media = get_post_meta($post->ID, '_fbfba_hide_media', true);


?>
<script type="text/javascript">
  jQuery(document).ready( function($) {
    var selected_feed_style = $('input[name=fbfba_feed_style]:checked', '#fbfba_style_selection_option').val();
    if(selected_feed_style == 'thumbnails'){
      $('#fbfba_thumbnail_style_options').show();
      $('#fbfba_column_count_settings').hide();
      $('#fbfba_thumbnails_image').css('border','2px inset #858585');
      $('#fbfba_masonry_image').css('border','none');
      $('#fbfba_blog_image').css('border','none');
    }
    if(selected_feed_style == 'blog_style' ){
      $('#fbfba_blog_masonry_style_options').show();
      $('#fbfba_column_count_settings').hide();
      $('#fbfba_blog_image').css('border','2px inset #858585');
      $('#fbfba_thumbnails_image').css('border','none');
      $('#fbfba_masonry_image').css('border','none');

    }
    if(selected_feed_style == 'masonry'){
      $('#fbfba_blog_masonry_style_options').show();
      $('#fbfba_column_count_settings').show();
      $('#fbfba_masonry_image').css('border','2px inset #858585');
      $('#fbfba_blog_image').css('border','none');
      $('#fbfba_thumbnails_image').css('border','none');


    }
    if(selected_feed_style == 'vertical' ){
      $('#fbfba_blog_masonry_style_options').show();
      $('#fbfba_column_count_settings').hide();
      $('#fbfba_vertical_image').css('border','2px inset #858585');
      $('#fbfba_blog_image').css('border','none');
      $('#fbfba_thumbnails_image').css('border','none');
      $('#fbfba_masonry_image').css('border','none');

    }
    $('#fbfba_style_selection_option input').on('change', function() {
      var feed_style_selection = $('input[name=fbfba_feed_style]:checked', '#fbfba_style_selection_option').val(); 
      if(feed_style_selection == 'thumbnails'){
        $('#fbfba_thumbnail_style_options').show();
        $('#fbfba_blog_masonry_style_options').hide();
      $('#fbfba_column_count_settings').hide();
        $('#fbfba_thumbnails_image').css('border','2px inset #858585');
        $('#fbfba_vertical_image').css('border','none');
        $('#fbfba_masonry_image').css('border','none');
        $('#fbfba_blog_image').css('border','none');
      }
      if(feed_style_selection == 'blog_style' ){
        $('#fbfba_thumbnail_style_options').hide();
        $('#fbfba_blog_masonry_style_options').show();
      $('#fbfba_column_count_settings').hide();
        $('#fbfba_blog_image').css('border','2px inset #858585');
         $('#fbfba_vertical_image').css('border','none');
        $('#fbfba_thumbnails_image').css('border','none');
        $('#fbfba_masonry_image').css('border','none');
      }
      if(feed_style_selection == 'vertical' ){
        $('#fbfba_thumbnail_style_options').hide();
        $('#fbfba_blog_masonry_style_options').show();
      $('#fbfba_column_count_settings').hide();
        $('#fbfba_vertical_image').css('border','2px inset #858585');
        $('#fbfba_blog_image').css('border','none');
        $('#fbfba_thumbnails_image').css('border','none');
        $('#fbfba_masonry_image').css('border','none');
      }
      if(feed_style_selection == 'masonry'){
        $('#fbfba_thumbnail_style_options').hide();
        $('#fbfba_blog_masonry_style_options').show();
      $('#fbfba_column_count_settings').show();
       $('#fbfba_vertical_image').css('border','none');
        $('#fbfba_masonry_image').css('border','2px inset #858585');
        $('#fbfba_blog_image').css('border','none');
        $('#fbfba_thumbnails_image').css('border','none');
      }
    });
  });
</script>
<style type="text/css">

  main {
    background: #FFF;
    width: 98%;
    padding: 1%;
    margin-top: 1%;
    box-shadow: 0 3px 5px rgba(0,0,0,0.2);
  }
  main p {
    font-size: 13px;
  }
  main #fbfba-tab1, main #fbfba-tab2, main #fbfba-tab3, main #fbfba-tab4, main section {
    clear: both;
    padding-top: 30px;
    display: none;
  }
  #fbfba-tab1-label, #fbfba-tab2-label,  #fbfba-tab3-label,  #fbfba-tab4-label {
    font-weight: bold;
    font-size: 14px;
    display: block;
    float: left;
    padding: 10px 30px;
    border-top: 2px solid transparent;
    border-right: 1px solid transparent;
    border-left: 1px solid transparent;
    border-bottom: 1px solid #DDD;
  }
  main label:hover {
    cursor: pointer;
    text-decoration: underline;
  }
  #fbfba-tab1:checked ~ #fbfba-content1, #fbfba-tab2:checked ~ #fbfba-content2, #fbfba-tab3:checked ~ #fbfba-content3, #fbfba-tab4:checked ~ #fbfba-content4 {
    display: block;
  }
  main input:checked + #fbfba-tab1-label, main input:checked + #fbfba-tab2-label, main input:checked +  #fbfba-tab3-label, main input:checked +  #fbfba-tab4-label {
    border-top-color: #0073aa;
    border-right-color: #DDD;
    border-left-color: #DDD;
    border-bottom-color: transparent;
    text-decoration: none;
  }
  #fbfba_show_photos_from_id , #fbfba_show_photos_from_location , #fbfba_show_photos_from_hashtag{
    margin-top: 2px;
  }
  .fbfba_checkbox{
    width: 25px !important;
    height: 25px !important;
    border: 1px solid lightgrey !important;
    border-radius: 5px !important;
    margin-left: 10px !important;
        border: 2px solid #34c5ff !important;
    
  }
  .fbfba_checkbox:checked:before{
    font-size: 30px !important;
  }
  #fbfba_theme_selection_table tr td{
    vertical-align: top;
    display: inline-block;
  }
</style>
<p style="text-align: center;
    background: white;
    border: 2px solid #0073aa;
    padding: 5px;
    font-size: 17px;">Copy this shortcode & paste into your Post or Page to show Facebook Feed<br/> <strong>[arrow_fb_feed id='<?php echo $post->ID; ?>']</strong></p>
<main>
    <div id="fbwait" style="display: none;"><img src='https://www.arrowplugins.com/1.gif' width="64" height="64" /><br>Getting Your Facebook Pages...</div>
  <input id="fbfba-tab1" type="radio" name="fbfba-tabs" checked>
    <label id="fbfba-tab1-label" for="fbfba-tab1">General Settings</label>
     <input id="fbfba-tab3" type="radio" name="fbfba-tabs">
  <label id="fbfba-tab3-label" for="fbfba-tab3">Appearance</label>
  <section id="fbfba-content1">
    <h2 style="font-size: 17px;">Select Feed Style:</h2>
    <table id="fbfba_style_selection_option">
      <tr>
       <td>
          <p style="text-align: center;margin: 0;">
            <input id="fbfba_feed_style_vertical" type="radio" name="fbfba_feed_style" value="vertical" <?php echo ($fbfba_feed_style == 'vertical')? 'checked="checked"':''; ?>  <?php if($fbfba_feed_style == ''){ echo 'checked="checked"';} ?> /> 
            <label for="fbfba_feed_style_vertical"><strong>Vertical</strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
            <label for="fbfba_feed_style_vertical">
              <img id="fbfba_vertical_image" src="<?php echo plugins_url('images/vertical.png',__FILE__); ?>" />
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input id="fbfba_feed_style_blog_style" type="radio" name="fbfba_feed_style" value="blog_style" <?php echo ($fbfba_feed_style == 'blog_style')? 'checked="checked"':''; ?> /> 
            <label for="fbfba_feed_style_blog_style"><strong>Blog Style</strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
            <label for="fbfba_feed_style_blog_style">
              <img id="fbfba_blog_image" class="fbfba_style_image" src="<?php echo plugins_url('images/blog_style.png',__FILE__); ?>" />
            </label>
          </p>
        </td>
           <td>
          <p style="text-align: center;margin: 0;">
            <input disabled id="fbfba_feed_style_thumbnails" type="radio" name="fbfba_feed_style" value="" /> 
            <label for="fbfba_feed_style_thumbnails"><strong>Thumbnails</strong> <a href="https://www.arrowplugins.com/facebook-feed" target="_blank">Locked</a></label>
          </p>
          <p style="text-align: center;margin: 5px;">
            <label for="fbfba_feed_style_thumbnails">
              <img id="fbfba_thumbnails_image" src="<?php echo plugins_url('images/thumbnails.png',__FILE__); ?>" />
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input disabled id="fbfba_feed_style_masonry" type="radio" name="fbfba_feed_style" value="" /> 
            <label for="fbfba_feed_style_masonry"><strong>Masonry</strong> <a href="https://www.arrowplugins.com/facebook-feed" target="_blank">Locked</a></label>
          </p>
          <p style="text-align: center;margin: 5px;">
            <label for="fbfba_feed_style_masonry">
              <img id="fbfba_masonry_image" class="fbfba_style_image" src="<?php echo plugins_url('images/masonry.png',__FILE__); ?>" />
            </label>
          </p>
        </td>
      </tr>
    </table>

<script>
jQuery(document).ready(function(){
    jQuery("#tooltipAT").click(function(){
        jQuery("#tooltipATShowHide").slideToggle( "slow" );
    });
});
</script>
<?php
    
    $postId = $_REQUEST['post'];
    $actionId = $_REQUEST['action'];
    //$url = "";

   //$url .= '/wordpress';// comment this line before upload the production server.

   /* if(strlen($postId) > 0 && strlen($actionId) > 0 && $actionId == "edit"){
        $url = "/sfbap1-landing-page.php";
        $_SESSION['post_id'] = $postId;
    }
    else
        $url = "/wp-admin/post-new.php?post_type=sfbap1_social_feed";*/

    $protocol = site_url();
    $_SESSION['post_id'] = $postId;
   /* if( !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on") $protocol = "https://";
    else $protocol = "http://";*/

?>

<a id="fbaccesstokenbutton" href="https://www.facebook.com/dialog/oauth?client_id=340145266536074&response_type=token&scope=manage_pages&redirect_uri=https://www.arrowplugins.com/fbfba-landing-page.php&state=<?php echo $postId . '!@@!' . $protocol ?>" />LOGIN & GET ACCESS TOKEN</a><a id="notworking" href="https://www.arrowplugins.com/generate-facebook-page-access-token/" target="_blank" style="font-size: 16px;">Button not working?</a>
</br>
</br>
<div style="height: auto; display: block;" id="sfbap_access_token_pages"></div>

            <p style="font-size: 1.3em;"><strong>Enter your own Access Token: </strong> <input type="text" placeholder="Copy & Paste Generated Access Token" style="display: inline-block; width: 350px;" name="fbfba_facebook_access_token" id="fbfba_facebook_access_token" value="<?php echo $fbfba_facebook_access_token; ?>" ><a id="tooltipAT" style="    cursor: pointer;
    margin-left: 10px;
    font-size: 13px;">What is this?</a>
                <div style="display: none;
    padding: 10px 15px;
    margin: 10px 0;
    font-size: 13px;
    background: #fffbcc;
    background: #fffbcc;
    -moz-border-radius: 8px;
    -webkit-border-radius: 8px;
    border-radius: 8px;" id="tooltipATShowHide">To show your Facebook "Page" posts you have to be it's <strong>"Admin"</strong> it is highly recommended that you retrieve your own Access Token for that page to avoid any API rate limit errors. Simply follow these <a href="https://www.arrowplugins.com/generate-facebook-page-access-token/" target="_blank">step-by-step</a> instructions or Click on the <strong>LOGIN & GET ACCESS TOKEN</strong> Button above to obtain one.</div>
            </p>

    <table id="fbfba_general_options">
      <tr>
        <td style="vertical-align: top;">
        <h3 >Enter Facebook Page URL:</h3>
        </td>
        <td>
          <table id="fbfba_selection_table">
            <tr>
              <td>
                <input checked="checked" type="radio" id="fbfba_show_photos_from_id" name="fbfba_show_photos_from" value='userid'<?php checked( "userid", $fbfba_show_photos_from); ?>  />
                <label for="fbfba_show_photos_from_id"><strong>http://www.facebook.com/</strong></label> 
              </td>
              <td>
                <input type="text" id="fbfba_show_photos_from_id_value" name="fbfba_user_id" placeholder="subway" value="<?php echo $fbfba_user_id; ?>" /> 
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <h3>Number of Feeds to Show: </h3> 
        </td>
        <td>
          <input style="margin-left: 15px;" type="number" min="1" max="20" id="fbfba_number_of_photos" name="fbfba_number_of_photos" value="<?php if($fbfba_number_of_photos == ''){ echo '20' ;}else{ echo $fbfba_number_of_photos; } ?>" /> Max 20 allowed in Free Version
        </td>
      </tr>
      <tr>
        <td>
          <h3>Change Date Posted Language: </h3> 
        </td>
        <td>
        <select name="" id="" value= >
            <option value="en"  >English (Default)</option>
            <option disabled value="ar"  >Arabic (Premium)</option>
            <option disabled value="bn"  >Bangali (Premium)</option>
            <option disabled value="cs"  >Czech (Premium)</option>
            <option  disabled value="da" >Danish (Premium)</option>
            <option disabled value="nl" >Dutch (Premium)</option>
            <option disabled value="fr" >French (Premium)</option>
            <option disabled value="de"  >German (Premium)</option>
            <option disabled value="it" >Italian (Premium)</option>
            <option disabled value="ja"  >Japanese (Premium)</option>
            <option disabled value="ko"  >Korean (Premium)</option>
            <option disabled value="pt" >Portuguese (Premium)</option>
            <option disabled value="ru" >Russian (Premium)</option>
            <option disabled value="es"  >Spanish (Premium)</option>
            <option disabled value="tr" >Turkish (Premium)</option>
            <option disabled value="uk"  >Ukranian (Premium)</option>
        </select>
        </td>
      </tr>
    </table>

    <table id="fbfba_thumbnail_style_options" style="display: none;">
      <tr>
        <td>
          <h3>Thumbnail Size: </h3> 
        </td>
        <td>
          <input style="width: 70px;margin-left: 106px;" type="number"  id="fbfba_thumbnail_size" name="fbfba_thumbnail_size" value="<?php if($fbfba_thumbnail_size == ''){ echo '250' ;}else{ echo $fbfba_thumbnail_size; } ?>" /> px 
        </td>
      </tr>
    </table>

<table id="fbfba_column_count_settings" style="display: none;">
      <tr>
        <td>
          <h3>Number of Columns in a Row: </h3> 
        </td>
        <td>
          <input style="width: 70px;margin-left: ;" type="number"  id="fbfba_column_count" name="fbfba_column_count" value="<?php if($fbfba_column_count == ''){ echo '2' ;}else{ echo $fbfba_column_count; } ?>" /> 
        </td>
      </tr>
    </table>

    <table id="fbfba_blog_masonry_style_options" style="display: none;">
      <tr>
        <td>
          <h3>Limit Post Caption Text: </h3> 
        </td>
        <td>
          <input type="number" min="10" max="600" id="fbfba_limit_post_characters" name="fbfba_limit_post_characters" value="<?php if($fbfba_limit_post_characters == ''){ echo '300' ;}else{ echo $fbfba_limit_post_characters; } ?>" /> Characters <span>Minimum value is 50 & Maximum value is 600</span>
        </td>
      </tr>
      <tr>
        <td>
          <h3>Show Facebook Photos Only: </h3> 
        </td>
        <td>
          <input type="checkbox" class="fbfba_checkbox" name="fbfba_show_photos_only" id="fbfba_show_photos_only"  value='1'<?php checked(1, $fbfba_show_photos_only); ?> /> <span style="font-size: 13px;"><strong>(This will hide Post Caption Text, Profile Picture & Date Posted from your feed card)</strong></span>
        </td>
      </tr>
      <tr>
        <td>
          <h3>Hide Date Posted: </h3> 
        </td>
        <td>
          <input type="checkbox" class="fbfba_checkbox" name="fbfba_date_posted" id="fbfba_date_posted"  value='1'<?php checked(1, $fbfba_date_posted); ?> />
        </td>
      </tr>
      <tr>
        <td>
          <h3>Hide Profile Picture: </h3> 
        </td>
        <td>
          <input type="checkbox" class="fbfba_checkbox" name="fbfba_profile_picture" id="fbfba_profile_picture" value='1'<?php checked('1', $fbfba_profile_picture); ?> />
        </td>
      </tr>
      <tr>
        <td>
          <h3>Hide Post Caption Text: </h3> 
        </td>
        <td>
          <input type="checkbox" class="fbfba_checkbox" name="fbfba_caption_text" id="fbfba_caption_text" value='1'<?php checked('1', $fbfba_caption_text); ?> />
        </td>
      </tr>
    </table>
<br/>

<h2 style="    font-size: 18px; margin: 0;padding: 3px;">Select Feed Template:</h2>
<br/>
    
    <table id="fbfba_theme_selection_table">
      <tr>
        <td>
          <p style="text-align: center;margin: 0;">
            <input type="radio" id="fbfba_theme_selection_default" name="fbfba_theme_selection" value="default" <?php echo ($fbfba_theme_selection == 'default')? 'checked="checked"':''; ?>  <?php if($fbfba_theme_selection == ''){ echo 'checked="checked"';} ?>  />
            <label for="fbfba_theme_selection_default"><strong>Default</strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
          <label for="fbfba_theme_selection_default">
            <img style="    box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important; width: 200px;" src="<?php echo plugins_url('images/default.png',__FILE__); ?>">
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input disabled type="radio" id="fbfba_theme_selection_template0" name="fbfba_theme_selection" value="template0"  />
            <label for="fbfba_theme_selection_template0"><strong>Dark <a href="https://www.arrowplugins.com/facebook-feed" target="_blank">Locked</a></strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
          <label for="fbfba_theme_selection_template0">
            <img style="width: 200px;" src="<?php echo plugins_url('images/template0.png',__FILE__); ?>">
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input disabled type="radio" id="fbfba_theme_selection_template1" name="fbfba_theme_selection" value="" />
            <label for="fbfba_theme_selection_template1"><strong>Pinterest Like Layout <a href="https://www.arrowplugins.com/facebook-feed" target="_blank">Locked</a></strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
          <label for="fbfba_theme_selection_template1">
            <img style="width: 200px;" src="<?php echo plugins_url('images/template1.png',__FILE__); ?>">
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input disabled type="radio" id="fbfba_theme_selection_template2" name="fbfba_theme_selection" value="" />
            <label for="fbfba_theme_selection_template2"><strong>Modern Light <a href="https://www.arrowplugins.com/facebook-feed" target="_blank">Locked</a></strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
          <label for="fbfba_theme_selection_template2">
            <img style="    box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important; width: 200px;" src="<?php echo plugins_url('images/template2.png',__FILE__); ?>">
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input disabled type="radio" id="fbfba_theme_selection_template3" name="fbfba_theme_selection" value="" />
            <label for="fbfba_theme_selection_template3"><strong>Modern Dark <a href="https://www.arrowplugins.com/facebook-feed" target="_blank">Locked</a></strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
          <label for="fbfba_theme_selection_template3">
            <img style="    box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important; width: 200px;" src="<?php echo plugins_url('images/template3.png',__FILE__); ?>">
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input disabled type="radio" id="fbfba_theme_selection_template4" name="fbfba_theme_selection" value="" />
            <label for="fbfba_theme_selection_template4"><strong>Space White <a href="https://www.arrowplugins.com/facebook-feed" target="_blank">Locked</a></strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
          <label for="fbfba_theme_selection_template4">
            <img style="    box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important; width: 200px;" src="<?php echo plugins_url('images/template4.png',__FILE__); ?>">
            </label>
          </p>
        </td>
      </tr>
    </table>
  </section>
  <section id="fbfba-content2">
   
  </section>
  <section id="fbfba-content3">
    <table>
    
    <tr>
        <td><h3>Social Feed Card Width:</h3></td>
        <td> <input style="width: 70px;" type="number"  id="fbfba_social_card_width" name="fbfba_social_card_width" value="<?php if($fbfba_social_card_width == ''){ echo '400' ;}else{ echo $fbfba_social_card_width; } ?>" /> px
        </td>
    </tr>
    <tr>
        <td><h3 style="margin: 0;margin-top: 6px;margin-bottom: -15px;">Heading Font Size:</h3>
            </br>
            <h4 style="margin: 0;font-weight: normal;">Your Profile Account Name Font Size</h4>
        </td>
        <td>
            <input style="width: 70px;" type="number"  id="fbfba_heading_font_size" name="fbfba_heading_font_size" value="<?php if($fbfba_heading_font_size == ''){ echo '' ;}else{ echo $fbfba_heading_font_size; } ?>" /> px <span style="font-weight: bold;color:red;">(Leave empty for default theme font size)</span>
        </td>
    </tr>
    <tr>
        <td><h3  style="margin: 0;margin-top: 6px;margin-bottom: -15px;">Post Content Font Size:</h3>
            </br>
            <h4 style="margin: 0;font-weight: normal;">Single Post Caption Text Font Size</h4>
        </td>
        <td>
            <input style="width: 70px;" type="number"  id="fbfba_caption_font_size" name="fbfba_caption_font_size" value="<?php if($fbfba_caption_font_size == ''){ echo '' ;}else{ echo $fbfba_caption_font_size; } ?>" /> px <span style="font-weight: bold;color:red;">(Leave empty for default theme font size)</span>
        </td>
    </tr>
    <tr>
        <td><h3>Heading Color:</h3></td>
        <td><input type="text" id="fbfba_social_card_heading_color" name="fbfba_social_card_heading_color" class="color_picker" value="<?php if($fbfba_social_card_heading_color == '') { echo '';}else { echo $fbfba_social_card_heading_color;} ?>"> </td>
    </tr>
    <tr>
        <td><h3>Post Content Color:</h3></td>
        <td><input type="text" id="fbfba_social_card_content_color" name="fbfba_social_card_content_color" class="color_picker" value="<?php if($fbfba_social_card_content_color == '') { echo '';}else { echo $fbfba_social_card_content_color;} ?>"> </td>
    </tr>
    <tr>
        <td><h3>Date Text Color:</h3></td>
        <td><input type="text" id="fbfba_social_card_date_color" name="fbfba_social_card_date_color" class="color_picker" value="<?php if($fbfba_social_card_date_color == '') { echo '';}else { echo $fbfba_social_card_date_color;} ?>"> </td>
    </tr>
    <tr>
        <td><h3>Profile Picture Style:</h3></td>
        <td>
           <table id="fbfba_profile_style_selection_option">
      <tr>
       <td>
          <p style="text-align: center;margin: 0;">
            <input id="fbfba_feed_profile_style_square" type="radio" name="fbfba_feed_profile_style" value="square" <?php echo ($fbfba_feed_profile_style == 'square')? 'checked="checked"':''; ?> <?php if($fbfba_feed_profile_style == ''){ echo 'checked="checked"';} ?> /> 
            <label for="fbfba_feed_profile_style_square"><strong>Square</strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
            <label for="fbfba_feed_profile_style_square">
              <img id="fbfba_vertical_image" src="<?php echo plugins_url('images/square.png',__FILE__); ?>" />
            </label>
          </p>
        </td>
        <td>
          <p style="text-align: center;margin: 0;">
            <input id="fbfba_feed_profile_style_rounded" type="radio" name="fbfba_feed_profile_style" value="rounded" <?php echo ($fbfba_feed_profile_style == 'rounded')? 'checked="checked"':''; ?> /> 
            <label for="fbfba_feed_profile_style_rounded"><strong>Rounded</strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
            <label for="fbfba_feed_profile_style_rounded">
              <img id="fbfba_thumbnails_image" src="<?php echo plugins_url('images/rounded.png',__FILE__); ?>" />
            </label>
          </p>
        </td>
           <td>
          <p style="text-align: center;margin: 0;">
            <input id="fbfba_feed_profile_style_curved" type="radio" name="fbfba_feed_profile_style" value="curved" <?php echo ($fbfba_feed_profile_style == 'curved')? 'checked="checked"':''; ?> /> 
            <label for="fbfba_feed_profile_style_curved"><strong>Curved</strong></label>
          </p>
          <p style="text-align: center;margin: 5px;">
            <label for="fbfba_feed_profile_style_curved">
              <img id="fbfba_thumbnails_image" src="<?php echo plugins_url('images/curved.png',__FILE__); ?>" />
            </label>
          </p>
        </td>
      </tr>
    </table>
        </td>
    </tr>
    </table>
  </section>
  <section id="fbfba-content4">
    <h3>Here Are Many Words</h3>
    <p>Vivamus convallis lectus lobortis dapibus ultricies. Sed fringilla vitae velit id rutrum. Maecenas metus felis, congue ut ante vitae, porta cursus risus. Nulla facilisi. Praesent vel ligula et erat euismod luctus. Etiam scelerisque placerat dapibus. Vivamus a mauris gravida urna mattis accumsan. Duis sagittis massa vel elit tincidunt, sed molestie lacus dictum. Mauris elementum, neque eu dapibus gravida, eros arcu euismod metus, vitae porttitor nibh elit at orci. Vestibulum laoreet id nulla sit amet mattis.</p>
  </section>
  <div class="">
            <h3>Like the plugin? Share with friends & family!</h3>
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="https://wordpress.org/plugins/wp-facebook-feed" data-text="Display your Facebook Page posts on your site using the Facebook Feed WordPress plugin!" data-via="arrowplugins" data-dnt="true">Tweet</a>
            <a href="https://twitter.com/arrowplugins?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @arrowplugins</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            <div id="fb-root" style="display: none;"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=340145266536074&autoLogAppEvents=1';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div style="vertical-align: top;" class="fb-share-button" data-href="https://wordpress.org/plugins/wp-facebook-feed" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share Facebook Feed Plugin</a></div>
            <div class="fb-like" data-href="https://www.facebook.com/wparrowplugins" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" style="display: block; float: left; margin-right: 4px;"></div>
            <script src="//platform.linkedin.com/in.js" type="text/javascript">
              lang: en_US
            </script>
            <script type="IN/Share" data-url="https://wordpress.org/plugins/wp-facebook-feed"></script>
            <script src="https://apis.google.com/js/platform.js" async defer></script>
            <div class="g-plusone" data-size="medium" data-href="https://wordpress.org/plugins/wp-facebook-feed"></div>
        </div>
</main>

<script type="text/javascript">

     var fragment = window.location.hash;

    if(fragment.length>0)
    {
                  jQuery("#fbwait").css("display", "block");

        var tokenArray = fragment.split("&");
        var accessTokenArray = tokenArray[0].split("=");
        var accessToken = accessTokenArray[1];

        if(accessToken.length>0)
        {
                                

            jQuery.ajax({
                type: "GET",
                dataType: "JSON",
                url: "https://graph.facebook.com/v3.2/me?access_token="+accessToken, 
                data: "",
                success: function(data) {

                    var userId = data['id'];

                    if(userId.length > 0)
                    {

                        jQuery.ajax({
                            type: "GET",
                            dataType: "JSON",
                            url: "https://graph.facebook.com/v3.2/" + userId + "/accounts?fields=access_token,name,username,picture&access_token="+accessToken, 
                            data: "",
                            success: function(data) {
                                var NeverAccessToken = data['data'];

                                var html = "";
                                var longLifeAccessToken = "";
                                for(var i=0; i<NeverAccessToken.length; i++)
                                {

                                    longLifeAccessToken = data['data'][i]['access_token'];
                                    jQuery.ajax({
                                        type: "GET",
                                        dataType: "JSON",
                                        async: false,
                                        url: "https://graph.facebook.com/oauth/access_token?client_id=340145266536074&client_secret=1b2d50fa8abef3b87d5769f1ba762b15&grant_type=fb_exchange_token&fb_exchange_token=" + longLifeAccessToken, 
                                        data: "",
                                        success: function(data) {

                                            if(null != data['access_token'] && data['access_token'].length > 0)
                                                longLifeAccessToken = data['access_token'];
                                            
                                            html += "<div class='fbpagetoken' style='cursor: pointer;' onclick='set_never_expire_token(this);' name='" + NeverAccessToken[i]['username'] + "' id='" + longLifeAccessToken + "'> <img id='fbpp' src=\"" + NeverAccessToken[i]['picture']['data']['url'] + "\" alt=\"" + NeverAccessToken[i]['name'] + "\" height=\"" + NeverAccessToken[i]['picture']['data']['height']  + "\" width=\"" + NeverAccessToken[i]['picture']['data']['width']  + "\"> <span id='fbpn'> " + NeverAccessToken[i]['name'] + "</span> </div>"

                                        }
                                    });
                                     
                                    jQuery("#sfbap_access_token_pages").html('<p id="tokeninfo">Click on a page in the list below and it will add the <strong>Page ID</strong> and <strong>Access Token</strong> automatically, then click Publish or Update button to save settings.</p>'+html); 
                                    jQuery('#sfbap_access_token_pages').css({"border-color": "#dadada", 
                                                                       "border-width":"1px", 
                                                                       "border-style":"solid"});
                                    var y = jQuery(window).scrollTop();  //your current y position on the page
                                    jQuery(window).scrollTop(y+80);  
                                    jQuery("#fbwait").css("display", "none");

                                  }
                              }
                        });
                    }

                  
                    
                }
            });

        }
    }

    function set_never_expire_token(element){

        var username = jQuery(element).attr("name");

        if(username == "undefined") username = "";;
        jQuery("#fbfba_facebook_access_token").val(jQuery(element).attr("id"));
        jQuery("#fbfba_show_photos_from_id_value").val(username);
        jQuery('#sfbap_access_token_pages .fbpagetoken').removeClass('fbpagetokenactive');
        jQuery(element).addClass('fbpagetokenactive');
        jQuery('#fbfba_facebook_access_token').addClass('tokengeneratedappearance');
        jQuery('#fbfba_show_photos_from_id_value').addClass('tokengeneratedappearance');
        
    }

</script>

<style type="text/css">
.tokengeneratedappearance{
border: 2px dashed #5b7dc5 !important;
}
.fbpagetokenactive{
    background: #eaeaea;
}
div#sfbap_access_token_pages div {
    display: inline-block;
    margin: 10px;
    text-align: center;
    padding: 10px;
    border-radius: 5px;

}
img#fbpp {
    display: block;
    margin: 0 auto;
    border-radius: 5px;
    margin-bottom: 10px;
}
span#fbpn {
    font-size: 14px;
    font-weight: bold;
    color: #585858;
}
div#sfbap_access_token_pages div:hover {
    background: #dedede;
    
}
#tokeninfo{
    font-size: 15px;
    text-align: center;
    background: #5b7dc5;
    color: white;
    padding-top: 6px;
    padding-bottom: 5px;
    margin-top: 0;
    width: 100%;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
#sfbap_access_token_pages{
    padding: 0px;
    padding-top: 0;
    border-radius: 5px;
    text-align: center;
}
#fbaccesstokenbutton{
    /* width: 350px; */
    /* height: 51px; */
    background: #4867aa;
    display: inline-block;
    border-radius: 5px;
    color: white;
    padding: 17px;
    font-size: 16px;
    text-decoration: none;
}
#notworking{
  margin-left: 20px;
  font-size: 14px !important;
  text-decoration: none;
}
#fbaccesstokenbutton {
    display: inline-block;
    font-size: 14px;
    padding: 17px 30px 15px 44px;
    background-color: #2b4170; /* fallback color */
  background: -moz-linear-gradient(top, #3b5998, #2b4170);
  background: -ms-linear-gradient(top, #3b5998, #2b4170);
  background: -webkit-linear-gradient(top, #3b5998, #2b4170);
  border: 1px solid #2b4170;
    color: #fff;
    text-shadow: 0 -1px 0 rgba(0,0,20,.4);
    text-decoration: none;
    line-height: 1;
    position: relative;
    border-radius: 5px;
        font-family: sans-serif;
    font-weight: bold;
}
#fbwait{
    width: 18%;
    height: 94px;
    border: 1px solid #444444;
    position: fixed;
    top: 40%;
    left: 40%;
    padding: 2px;
    background: white;
    text-align: center;
    border-radius: 5px;
    box-shadow: 0 5px 38px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.4);
    padding-right: 5px;
    background: white;
    font-weight: bold;
    font-size: 15px;
    z-index: 9999;
    line-height: 1.5;
}
#fbaccesstokenbutton:before {
    display: inline-block;
    position: relative;
    background-image: url(data:image/png;base64,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);
    height: 23px;
    background-repeat: no-repeat;
    background-position: 0px 0px;
    text-indent: -9999px;
    text-align: center;
    width: 29px;
    line-height: 23px;
    margin: -8px 7px -7px -30px;
    padding: 2 25px 0 0;
    content: "f";

}
#fbaccesstokenbutton:hover {
  background-color: #3b5998; /* fallback color */
  background: -moz-linear-gradient(top, #2b4170, #3b5998);
  background: -ms-linear-gradient(top, #2b4170, #3b5998);
  background: -webkit-linear-gradient(top, #2b4170, #3b5998);
}
</style>