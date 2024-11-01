<?php 
add_filter('widget_text','do_shortcode');
add_shortcode( 'arrow_fb_feed', 'fbfba_arrow_feed_shortcode' );
function fbfba_arrow_feed_shortcode($atts , $content){

extract( shortcode_atts( array( 'id' => null ) , $atts ) );
$fbfba_show_photos_from = get_post_meta( $id,'_fbfba_show_photos_from',true);
if($fbfba_show_photos_from == 'userid'){
$instagram_query =  get_post_meta( $id,'_fbfba_user_id',true);
}
if($fbfba_show_photos_from == 'hashtag'){
$instagram_query = get_post_meta( $id,'_fbfba_hashtag',true);
}
$fbfba_facebook_access_token = get_post_meta( $id,'_fbfba_facebook_access_token',true);

$fbfba_number_of_photos = get_post_meta( $id,'_fbfba_number_of_photos',true);
$fbfba_date_posted = get_post_meta($id, '_fbfba_date_posted', true);
$fbfba_profile_picture = get_post_meta($id, '_fbfba_profile_picture', true);
$fbfba_caption_text = get_post_meta($id, '_fbfba_caption_text', true);
$fbfba_show_photos_only = get_post_meta($id, '_fbfba_show_photos_only', true);
$fbfba_feed_style = get_post_meta($id, '_fbfba_feed_style', true);
$fbfba_thumbnail_size = get_post_meta($id, '_fbfba_thumbnail_size', true);
$fbfba_limit_post_characters = get_post_meta($id, '_fbfba_limit_post_characters', true);
$fbfba_column_count = get_post_meta($id, '_fbfba_column_count', true);
$fbfba_theme_selection = get_post_meta($id, '_fbfba_theme_selection', true);
$fbfba_private_access_token = get_post_meta($id, '_fbfba_private_access_token', true);
$fbfba_date_posted_lang = get_post_meta($id, '_fbfba_date_posted_lang', true);


$fbfba_social_card_width = get_post_meta($id, '_fbfba_social_card_width', true);
$fbfba_social_card_background_color = get_post_meta($id, '_fbfba_social_card_background_color', true);
$fbfba_heading_font_size = get_post_meta($id, '_fbfba_heading_font_size', true);
$fbfba_caption_font_size = get_post_meta($id, '_fbfba_caption_font_size', true);
$fbfba_social_card_heading_color = get_post_meta($id, '_fbfba_social_card_heading_color', true);
$fbfba_social_card_content_color = get_post_meta($id, '_fbfba_social_card_content_color', true);
$fbfba_social_card_date_color = get_post_meta($id, '_fbfba_social_card_date_color', true);
$fbfba_feed_profile_style = get_post_meta($id, '_fbfba_feed_profile_style', true);
$fbfba_hide_media = get_post_meta($id, '_fbfba_hide_media', true);


ob_start();

?>
<style>

.social-feed-container-<?php echo $id; ?> .social-feed-element a{
color: #0088cc !important;
text-decoration: none !important;
border-bottom: none !important;
}
.social-feed-container-<?php echo $id; ?> .pull-left{

<?php if($fbfba_profile_picture == '1'){echo 'display: none !important;';}?>
<?php if($fbfba_feed_profile_style == 'square'){?> 
    border-radius: 0 !important;
<?php } ?>
<?php if($fbfba_feed_profile_style == 'rounded'){?> 
    border-radius: 50% !important;
<?php } ?>
<?php if($fbfba_feed_profile_style == 'curved'){?> 
    border-radius: 5px !important;
<?php } ?>
}
.social-feed-container-<?php echo $id; ?> .media-object{

<?php if($fbfba_profile_picture == '1'){echo 'display: none !important;';}?>

<?php if($fbfba_feed_profile_style == 'square'){?> 
    border-radius: 0 !important;
<?php } ?>
<?php if($fbfba_feed_profile_style == 'rounded'){?> 
    border-radius: 50% !important;
<?php } ?>
<?php if($fbfba_feed_profile_style == 'curved'){?> 
    border-radius: 5px !important;
<?php } ?>

}
.social-feed-container-<?php echo $id; ?> .pull-right{

<?php if($fbfba_date_posted == '1'){echo 'display: none !important;';}?>
}
.social-feed-container-<?php echo $id; ?> .text-wrapper{

<?php if($fbfba_caption_text == '1'){echo 'display: none !important;';}?>
}
.social-feed-container-<?php echo $id; ?> .content{

<?php if($fbfba_show_photos_only == '1' || $fbfba_feed_style == 'thumbnails'){echo 'display: none !important;';}?>
}
.social-feed-container-<?php echo $id; ?> .text-wrapper{

<?php if($fbfba_show_photos_only == '1' || $fbfba_feed_style == 'thumbnails'){echo 'display: none !important;';}?>
}
.social-feed-container-<?php echo $id; ?> .pull-right{

<?php if($fbfba_show_photos_only == '1' || $fbfba_feed_style == 'thumbnails'){echo 'display: none !important;';}?>
}
.social-feed-container-<?php echo $id; ?> p.social-feed-text{
<?php if($fbfba_show_photos_only == '1' || $fbfba_feed_style == 'thumbnails'){echo 'display: none !important;';}?>
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body{
<?php if($fbfba_show_photos_only == '1' || $fbfba_feed_style == 'thumbnails'){echo 'display: none !important;';}?>
}
<?php if($fbfba_theme_selection == 'default' || $fbfba_theme_selection == 'template0'){  ?>

<?php  if($fbfba_feed_style == 'thumbnails'){ ?>
.social-feed-container-<?php echo $id; ?> .social-feed-element{
width: <?php echo $fbfba_thumbnail_size; ?>px !important;
display: inline-block !important;
background-color:white !important;
padding: 0 !important;
margin: 5px !important;
vertical-align: middle !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .muted{
color: #6d6d6d;
}
.grid-item {
display: inline-block !important;
} 
.social-feed-container-<?php echo $id; ?> {
text-align: center !important;

}<?php } if($fbfba_feed_style == 'blog_style' || $fbfba_feed_style == 'vertical' ){ ?>

<?php if($fbfba_feed_style == 'vertical'){?> 
.social-feed-container-<?php echo $id; ?> {
<?php if($fbfba_social_card_width != ''){?> 
width: <?php echo $fbfba_social_card_width; ?>px !important;
    <?php } ?>
        <?php if($fbfba_social_card_heading_color != ''){?> 
color: <?php echo $fbfba_social_card_heading_color; ?> !important;
    <?php } ?>
margin: 0 auto !important;

}
.social-feed-container-<?php echo $id; ?> .social-feed-element {
	margin-bottom: 10px !important;
}
.social-feed-container-<?php echo $id; ?> .pull-right{
float: right !important;
}
<?php } ?>
<?php if($fbfba_feed_style == 'vertical' && $fbfba_theme_selection == 'template0'){?> 

.social-feed-container-<?php echo $id; ?> .social-feed-element p.social-feed-text{
	     <?php if($fbfba_caption_font_size != ''){?> 
font-size: <?php echo $fbfba_caption_font_size; ?>px !important;
    <?php } ?>
         <?php if($fbfba_social_card_content_color != ''){?> 
color: <?php echo $fbfba_social_card_content_color; ?> !important;
    <?php } ?>
color: white !important;
}.social-feed-container-<?php echo $id; ?> .pull-right{
float: right !important;
}
.social-feed-container-<?php echo $id; ?> .content .media-body p{
	margin: 0 !important;
}
<?php } ?>
.social-feed-container-<?php echo $id; ?> .social-feed-element{
box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important;
transition: 0.25s !important;
/*-webkit-backface-visibility: hidden !important;*/
background-color: <?php if($fbfba_theme_selection == 'template0'){echo '#414141';}else{echo '#fff ';} ?> !important;
color: #333 !important;
text-align: left !important;
font-size: 14px !important;
font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
line-height: 16px !important;
color: black  !important;
padding: 0 !important;
width: 100% !important;
margin-bottom: 5px !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element:hover {
box-shadow: 0 0 20px 0 rgba(10, 10, 10, 0.4) !important;
}
.social-feed-container-<?php echo $id; ?> .author-title{
        <?php if($fbfba_heading_font_size != ''){?> 
font-size: <?php echo $fbfba_heading_font_size; ?>px !important;
    <?php } ?>
        <?php if($fbfba_social_card_heading_color != ''){?> 
color: <?php echo $fbfba_social_card_heading_color; ?> !important;
    <?php } ?>
}
.social-feed-container-<?php echo $id; ?> .social-feed-text{
margin: 0 !important;
}
.social-feed-container-<?php echo $id; ?>  {

text-align: center !important;
}
.social-feed-container-<?php echo $id; ?> .content .media-body p{
	margin: 0 !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element p.social-feed-text{
    <?php if($fbfba_caption_font_size != ''){?> 
font-size: <?php echo $fbfba_caption_font_size; ?>px !important;
    <?php } ?>
color: <?php if($fbfba_theme_selection == 'template0'){echo 'white';}else{echo 'black';} ?> !important;
         <?php if($fbfba_social_card_content_color != ''){?> 
color: <?php echo $fbfba_social_card_content_color; ?> !important;
    <?php } ?>
}
 .social-feed-container-<?php echo $id; ?> .content .media-body p{
	margin: 0 !important;
}
<?php } if($fbfba_feed_style == 'masonry'){ ?>
.social-feed-container-<?php echo $id; ?> .social-feed-element{
box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important;
transition: 0.25s !important;
/*-webkit-backface-visibility: hidden !important;*/
background-color: <?php if($fbfba_theme_selection == 'template0'){echo '#414141';}else{echo '#fff ';} ?> !important;
color: #333 !important;
text-align: left !important;
font-size: 14px !important;
font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
line-height: 16px !important;
color: black  !important;
padding: 0 !important;
margin: 0 !important;

}
.grid-item {
padding: 3px;
} 
.social-feed-container-<?php echo $id; ?> .social-feed-element:hover {
box-shadow: 0 0 20px 0 rgba(10, 10, 10, 0.4) !important;
}
.social-feed-container-<?php echo $id; ?> .author-title{
        <?php if($fbfba_heading_font_size != ''){?> 
font-size: <?php echo $fbfba_heading_font_size; ?>px !important;
    <?php } ?>
        <?php if($fbfba_social_card_heading_color != ''){?> 
color: <?php echo $fbfba_social_card_heading_color; ?> !important;
    <?php } ?>
text-decoration: none !important;

}
.social-feed-container-<?php echo $id; ?> .social-feed-text{
margin: 0 !important;
color: black !important;
}
.social-feed-container-<?php echo $id; ?>  {

text-align: center !important;
}
.social-feed-container-<?php echo $id; ?>{
column-gap: 0 !important;
column-count: <?php echo $fbfba_column_count; ?> ;
-webkit-column-count: <?php echo $fbfba_column_count; ?> ;
    -moz-column-count: <?php echo $fbfba_column_count; ?> ;
}
.social-feed-container-<?php echo $id; ?> .content{
padding-top: 15px !important;

}
.social-feed-container-<?php echo $id; ?> .social-feed-element p.social-feed-text{
width: 100% !important;
font-size: 14px !important;
color: <?php if($fbfba_theme_selection == 'template0'){echo 'white';}else{echo 'black';} ?> !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .author-title{
font-size: 15px !important;
font-weight: bold !important;
        <?php if($fbfba_heading_font_size != ''){?> 
font-size: <?php echo $fbfba_heading_font_size; ?>px !important;
    <?php } ?>
        <?php if($fbfba_social_card_heading_color != ''){?> 
color: <?php echo $fbfba_social_card_heading_color; ?> !important;
    <?php } ?>
text-decoration: none !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element  {
break-inside: avoid;
padding: 0 !important;
vertical-align: top !important;
margin: 0 !important;

}

.social-feed-element .media-body > p{
	margin: 0 !important;
}
@media (max-width: 600px) {
.social-feed-container-<?php echo $id; ?> {
column-count: 2;
-webkit-column-count:2;
    -moz-column-count: 2;
}
}
@media (max-width: 360px) {
.social-feed-container-<?php echo $id; ?> {
column-count: 1;
-webkit-column-count: 1 ;
    -moz-column-count: 1 ;
}
}
<?php } } if($fbfba_theme_selection == 'template1'){ ?>
.social-feed-container-<?php echo $id; ?> .social-feed-element {
padding: 10px !important;
background: transparent !important;
border: none !important;
box-shadow: none !important;
margin: 0 !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .muted{
color: #6d6d6d;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element:hover{
box-shadow: none !important;
background-color: #e6e6e6 !important;
border-radius: 10px !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .attachment{
border-radius: 10px !important;
}
.social-feed-container-<?php echo $id; ?> .text-wrapper{
margin: 5px !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .pull-right{
float: left !important;
margin: 0 !important;
margin-top: -5px !important;
}
<?php if($fbfba_feed_style == 'thumbnails'){ ?>
.social-feed-container-<?php echo $id; ?> .social-feed-element{
width: <?php echo $fbfba_thumbnail_size; ?>px !important;
display: inline-block !important;
background-color:white !important;
padding: 0 !important;
vertical-align: middle;
margin: 0px !important;
}
.social-feed-container-<?php echo $id; ?> .text-wrapper{
	display: block !important;
}
.grid-item {
display: inline-block !important;
} 
.social-feed-container-<?php echo $id; ?> .content{
display: block !important;
padding: 0 !important;
}
.social-feed-container-<?php echo $id; ?> p.social-feed-text{
display: none !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body{
display: none !important;
}
<?php } ?>
<?php if($fbfba_feed_style == 'blog_style' || $fbfba_feed_style == 'masonry'|| $fbfba_feed_style == 'vertical' ){ ?>

<?php if($fbfba_feed_style == 'vertical'){?> 
.social-feed-container-<?php echo $id; ?> {
<?php if($fbfba_social_card_width != ''){?> 
width: <?php echo $fbfba_social_card_width; ?>px !important;
    <?php } ?>
margin: 0 auto !important;

}
.social-feed-container-<?php echo $id; ?> .social-feed-element {
	margin-bottom: 10px !important;
}
<?php } ?>
.social-feed-container-<?php echo $id; ?> .social-feed-element .content{
padding: 0 !important;
display: block !important;
}
.social-feed-container-<?php echo $id; ?> .text-wrapper{
	display: block !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element p.social-feed-text{
color: black !important;
margin-top: 10px !important;
margin-bottom: 0px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element p{

margin-bottom: 5px !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .author-title{
        <?php if($fbfba_heading_font_size != ''){?> 
font-size: <?php echo $fbfba_heading_font_size; ?>px !important;
    <?php } ?>
        <?php if($fbfba_social_card_heading_color != ''){?> 
color: <?php echo $fbfba_social_card_heading_color; ?> !important;
    <?php } ?>
font-weight: bold !important;
text-decoration: none !important;

}
<?php } if($fbfba_feed_style == 'masonry'){ ?>
.social-feed-container-<?php echo $id; ?> .social-feed-element .content {
padding: 0 !important;
display: block !important;

}.grid-item {
padding: 3px;
} 
.social-feed-container-<?php echo $id; ?> .social-feed-element  {
break-inside: avoid;
padding: 0 !important;
vertical-align: top !important;
margin: 0 !important;

}
.social-feed-container-<?php echo $id; ?>{
column-gap: 0;
column-count: <?php echo $fbfba_column_count; ?> ;
-webkit-column-count: <?php echo $fbfba_column_count; ?> ;
    -moz-column-count: <?php echo $fbfba_column_count; ?> ;
}
@media (max-width: 600px) {
.social-feed-container-<?php echo $id; ?> {
column-count: 2;
-webkit-column-count: 2 ;
    -moz-column-count:2 ;
}
}
@media (max-width: 360px) {
.social-feed-container-<?php echo $id; ?> {
column-count: 1;
-webkit-column-count: 1;
    -moz-column-count:1 ;
}
}

<?php	} } if($fbfba_theme_selection == 'template2' || $fbfba_theme_selection == 'template3'){ ?>
.social-feed-container-<?php echo $id; ?> .social-feed-element {
border: none !important;
margin: 0 !important;
box-shadow: none !important;
background-color: <?php if($fbfba_theme_selection == 'template2'){echo 'white';}else{echo '#414141';} ?> !important;

}
.social-feed-container-<?php echo $id; ?> .social-feed-element .muted{
color: <?php if($fbfba_theme_selection == 'template2'){echo '#6d6d6d';}else{echo '#ababab ';} ?> !important;
}
<?php if($fbfba_theme_selection == 'template2') { ?>
.social-feed-container-<?php echo $id; ?> .social-feed-element:hover{
border-radius: 10px !important;
}
<?php } ?>
.social-feed-container-<?php echo $id; ?> .text-wrapper{
margin: 0px 15px !important;
line-height: 18px !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .pull-right{
float: none;
margin: 15px;
display: block;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .content{
border-top: 2px solid #dfdfdf;
margin: 10px;
display: block;
height: 55px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element, .social-feed-element .media-body{
margin-top: 5px;
}
<?php if($fbfba_feed_style == 'thumbnails'){ ?>
.social-feed-container-<?php echo $id; ?> .social-feed-element{
width: <?php echo $fbfba_thumbnail_size; ?>px !important;
display: inline-block !important;
background-color:white !important;
padding: 0 !important;
vertical-align: middle;
margin: 5px !important;

}
.social-feed-container-<?php echo $id; ?>{
	text-align: center;
}
.grid-item {
display: inline-block !important;
} 
.social-feed-container-<?php echo $id; ?> .pull-right{
	display: none !important;
}
.social-feed-container-<?php echo $id; ?> .content{
	display: none !important;
}
.social-feed-container-<?php echo $id; ?> .text-wrapper{
	display: none !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element{
width: <?php echo $fbfba_thumbnail_size; ?>px !important;
display: inline-block !important;
background-color:white !important;
}
<?php } ?>
<?php if($fbfba_feed_style == 'blog_style' || $fbfba_feed_style == 'vertical' ){ ?>

<?php if($fbfba_feed_style == 'vertical'){?> 
.social-feed-container-<?php echo $id; ?> {
<?php if($fbfba_social_card_width != ''){?> 
width: <?php echo $fbfba_social_card_width; ?>px !important;
    <?php } ?>
margin: 0 auto !important;

}
.social-feed-container-<?php echo $id; ?> .social-feed-element{
margin: 10px !important;
}
<?php } ?>
.social-feed-container-<?php echo $id; ?> .social-feed-element .content{
margin: 5px 5px 25px 3px !important;
padding: 15px 0 0 15px !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .pull-right{
float: none;
margin: 15px;
display: block;
}
.social-feed-container-<?php echo $id; ?>.social-feed-element a{
color: #0088cc !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element {
border: none !important;
box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important;
padding: 0 !important;
margin: 0 !important;
width: 100% !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element p.social-feed-text {
color: <?php if($fbfba_theme_selection == 'template2'){echo 'black';}else{echo 'white ';} ?> !important;
margin: 0 !important;
}
.social-feed-container-<?php echo $id; ?> .text-wrapper{
margin-top: 10px !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .author-title{
color: <?php if($fbfba_theme_selection == 'template2'){echo 'black';}else{echo 'white ';} ?> !important;
font-weight: bold;
text-decoration: none !important;

}
<?php if($fbfba_feed_style == 'vertical'){?> 
.social-feed-container-<?php echo $id; ?> {
<?php if($fbfba_social_card_width != ''){?> 
width: <?php echo $fbfba_social_card_width; ?>px !important;
    <?php } ?>
margin: 0 auto !important;

}
.social-feed-container-<?php echo $id; ?> .social-feed-element{
margin: 10px !important;
}
<?php } ?>
<?php } if($fbfba_feed_style == 'masonry'){ ?>
.social-feed-container-<?php echo $id; ?>{
column-gap: 0;
column-count: <?php echo $fbfba_column_count; ?> ;
-webkit-column-count: <?php echo $fbfba_column_count; ?> ;
    -moz-column-count: <?php echo $fbfba_column_count; ?> ;
}
.social-feed-container-<?php echo $id; ?> .text-wrapper{
margin-top: 10px !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .content{
margin: 5px 5px 0px 3px !important;
padding: 15px 0 0 15px !important;
height: 75px;
}.grid-item {
padding: 3px;
} 
.social-feed-container-<?php echo $id; ?> .social-feed-element {
border: none !important;
box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important;
padding: 0 !important;
margin: 0 !important;

}
.social-feed-container-<?php echo $id; ?> .social-feed-element p.social-feed-text {
color: <?php if($fbfba_theme_selection == 'template2'){echo 'black';}else{echo 'white ';} ?> !important;
margin: 0 !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .author-title{
color: <?php if($fbfba_theme_selection == 'template2'){echo 'black';}else{echo 'white ';} ?> !important;
font-weight: bold;
text-decoration: none !important;

}
.social-feed-container-<?php echo $id; ?> .social-feed-element  {
break-inside: avoid;
padding: 0 !important;
vertical-align: top !important;
margin: 0 !important;

}
@media (max-width: 600px) {
.social-feed-container-<?php echo $id; ?> {
column-count: 2;
-webkit-column-count: 2 ;
    -moz-column-count: 2 ;
}
}
@media (max-width: 360px) {
.social-feed-container-<?php echo $id; ?> {
column-count: 1;
-webkit-column-count: 1 ;
    -moz-column-count: 1 ;
}
}

<?php	} } if($fbfba_theme_selection == 'template4') { ?>

<?php if($fbfba_feed_style == 'thumbnails'){ ?>
.social-feed-container-<?php echo $id; ?> .social-feed-element{
width: <?php echo $fbfba_thumbnail_size; ?>px !important;
display: inline-block !important;
background-color:white !important;
padding: 0 !important;
vertical-align: middle;
margin: 5px;
}
.grid-item {
display: inline-block !important;
} 
.social-feed-container-<?php echo $id; ?>{
	text-align: center !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element{
width: <?php echo $fbfba_thumbnail_size; ?>px !important;
display: inline-block !important;
background-color:white !important;
}
.social-feed-container-<?php echo $id; ?> .text-wrapper{
display: none !important;
}
.social-feed-container-<?php echo $id; ?> .pull-right{
display: none !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element p.social-feed-text{
display: none !important;
}

<?php }	if($fbfba_feed_style == 'blog_style'|| $fbfba_feed_style == 'vertical' ){ ?>



.social-feed-container-<?php echo $id; ?> .social-feed-element:hover {
box-shadow: 0 0 20px 0 rgba(10, 10, 10, 0.4) !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .content{
padding: 10px 0 !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .pull-left{
display: block !important;
width: 100% !important;
float: none !important;
margin: 0;
text-align: center !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .pull-right{
display: block !important;
width: 100% !important;
float: none !important;
margin: 0;
text-align: center !important;
color: #969696;
height: 17px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-object{
margin: 0 auto !important;
width: 70px !important;
<?php if($fbfba_feed_profile_style == 'square'){?> 
    border-radius: 0 !important;
<?php } ?>
<?php if($fbfba_feed_profile_style == 'rounded'){?> 
    border-radius: 50% !important;
<?php } ?>
<?php if($fbfba_feed_profile_style == 'curved'){?> 
    border-radius: 5px !important;
<?php } ?>
}
.social-feed-container-<?php echo $id; ?> .social-feed-element {
border: none !important;
box-shadow: none !important;
padding: 0 !important;
width: 100% !important;
background: white !important;
box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important;
transition: 0.25s !important;
/*-webkit-backface-visibility: hidden !important;*/
}
.social-feed-container-<?php echo $id; ?> .social-feed-element p.social-feed-text {
color: black !important;
margin: 0 !important;
line-height: 1.3 !important;
}
.social-feed-container-<?php echo $id; ?> .text-wrapper{
margin-top: 10px !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .author-title{
        <?php if($fbfba_heading_font_size != ''){?> 
font-size: <?php echo $fbfba_heading_font_size; ?>px !important;
    <?php } ?>
        <?php if($fbfba_social_card_heading_color != ''){?> 
color: <?php echo $fbfba_social_card_heading_color; ?> !important;
    <?php } ?>
font-weight: bold;
margin: 5px !important;
font-size: 17px !important;
text-decoration: none !important;

}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body{
text-align: center !important;
line-height: 1 !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body > p{
margin: 0 !important;
padding: 0 !important;
color: white !important;
margin-top: 5px !important;
text-align: center !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .attachment{
width: 95%;
margin: 0 auto !important;
display: block;
}
.social-feed-container-<?php echo $id; ?> .text-wrapper{
width: 95%;
text-align: center;
margin: 0 auto !important;
display: block;
margin-top: 15px !important;
font-size: 1.4em;
padding-bottom: 15px !Important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body{
overflow: none !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .social-feed-element .media-body{
overflow: none !important;
}
<?php }	 if($fbfba_feed_style == 'vertical'){?> 
.social-feed-container-<?php echo $id; ?> {
<?php if($fbfba_social_card_width != ''){?> 
width: <?php echo $fbfba_social_card_width; ?>px !important;
    <?php } ?>
margin: 0 auto !important;

}
.social-feed-container-<?php echo $id; ?> .social-feed-element {
	margin-bottom: 10px !important;
}
.social-feed-container-<?php echo $id; ?>  .social-feed-element .social-feed-text{
color: white !important;
}
<?php } if($fbfba_feed_style == 'masonry'){ ?>
.social-feed-container-<?php echo $id; ?> .social-feed-element:hover {
box-shadow: 0 0 20px 0 rgba(10, 10, 10, 0.4) !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .content{
padding: 10px 0 !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .pull-left{
display: block !important;
float: none !important;
margin: 0;
text-align: center !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .pull-right{
display: block !important;
width: 100% !important;
float: none !important;
margin: 0;
text-align: center !important;
color: #969696;
height: 17px;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-object{
margin: 0 auto !important;
width: 70px !important;
<?php if($fbfba_feed_profile_style == 'square'){?> 
    border-radius: 0 !important;
<?php } ?>
<?php if($fbfba_feed_profile_style == 'rounded'){?> 
    border-radius: 50% !important;
<?php } ?>
<?php if($fbfba_feed_profile_style == 'curved'){?> 
    border-radius: 5px !important;
<?php } ?>
}
.social-feed-container-<?php echo $id; ?> .social-feed-element {
border: none !important;
box-shadow: none !important;
padding: 0 !important;
background: white !important;
box-shadow: 0 0 10px 0 rgba(10, 10, 10, 0.2) !important;
transition: 0.25s !important;
/*-webkit-backface-visibility: hidden !important;*/
margin: 0 !important;

}.grid-item {
padding: 3px;
} 
.social-feed-container-<?php echo $id; ?> .social-feed-element p.social-feed-text {
color: black !important;
margin: 0 !important;
line-height: 1.3 !important;
}

.social-feed-container-<?php echo $id; ?> .social-feed-element .author-title{
        <?php if($fbfba_heading_font_size != ''){?> 
font-size: <?php echo $fbfba_heading_font_size; ?>px !important;
    <?php } ?>
        <?php if($fbfba_social_card_heading_color != ''){?> 
color: <?php echo $fbfba_social_card_heading_color; ?> !important;
    <?php } ?>
font-weight: bold;
margin: 5px !important;
font-size: 17px !important;
text-decoration: none !important;

}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body{
text-align: center !important;
line-height: 1 !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body > p{
margin: 0 !important;
padding: 0 !important;
color: white !important;
margin-top: 5px !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element .attachment{
width: 90%;
margin: 0 auto !important;
display: block;
}
.social-feed-container-<?php echo $id; ?> .text-wrapper{
width: 90%;
text-align: center;
margin: 0 auto !important;
display: block;
margin-top: 15px !important;
font-size: 16px;
padding-bottom: 15px !important;
line-height: 1.5 !important;

}
.social-feed-container-<?php echo $id; ?> .social-feed-element .media-body{
overflow: none !important;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element, .social-feed-element .media-body{
overflow: none !important;
}
.social-feed-container-<?php echo $id; ?>{
column-gap: 0;
column-count: <?php echo $fbfba_column_count; ?> ;
-webkit-column-count: <?php echo $fbfba_column_count; ?> ;
    -moz-column-count: <?php echo $fbfba_column_count; ?> ;
}
.social-feed-container-<?php echo $id; ?> .social-feed-element  {
break-inside: avoid;
padding: 0 !important;
vertical-align: top !important;
margin: 0 !important;

}
@media (max-width: 600px) {
.social-feed-container-<?php echo $id; ?> {
column-count: 1;
-webkit-column-count: 1;
    -moz-column-count:1 ;
}
}
@media (max-width: 520px) {
.social-feed-container-<?php echo $id; ?> {
column-count: 1;
-webkit-column-count: 1;
 -moz-column-count: 1 ;
}
}

<?php	} } ?>
.social-feed-container-<?php echo $id; ?> .pull-right{
        <?php if($fbfba_social_card_date_color != ''){?> 
color: <?php echo $fbfba_social_card_date_color; ?> !important;
    <?php } ?>
}
</style>

<div id="social-feed-container-<?php echo $id; ?>" class="social-feed-container-<?php echo $id; ?>"> 

</div>

<script>
var fbfba_date_posted_lang = '<?php echo $fbfba_date_posted_lang; ?>';

setTimeout(function(){ 

var fbfba_


 = '';
var fbfba_show_photos_from = '<?php echo $fbfba_show_photos_from; ?>';
var fbfba_private_access_token = '<?php echo $fbfba_private_access_token; ?>';
var instagram_query_string = '<?php echo $instagram_query; ?>';
var instagram_limit = '<?php echo $fbfba_number_of_photos; ?>';
var fbfba_theme_selection = '<?php echo $fbfba_theme_selection; ?>';

var fbfba_facebook_access_token = '<?php echo $fbfba_facebook_access_token; ?>';
var fbfba_limit_post_characters = '<?php echo $fbfba_limit_post_characters; ?>';

jQuery(document).ready(function(){
	if(fbfba_private_access_token == ''){
	fbfba_access_token = '3115610306.54da896.ae799867a8074bcb91b5cd6995b4974e';
}else{
	fbfba_access_token = fbfba_private_access_token;
}
if(fbfba_show_photos_from == 'hashtag'){
fbfba_access_token = '3115610306.54da896.ae799867a8074bcb91b5cd6995b4974e';
}
jQuery('.social-feed-container-'+<?php echo $id; ?>).socialfeed({
	 facebook:{
        accounts: ['@'+instagram_query_string],  //Array: Specify a list of accounts from which to pull wall posts
        limit: instagram_limit,                                   //Integer: max number of posts to load
        access_token: fbfba_facebook_access_token  //String: "APP_ID|APP_SECRET"
    },
<?php if($fbfba_theme_selection == 'default' || $fbfba_theme_selection == 'template0') { ?>
template_html: '<div class="grid-item"><div class="social-feed-element {{? !it.moderation_passed}}hidden{{?}}" dt-create="{{=it.dt_create}}" social-feed-id = "{{=it.id}}"><div class="content"><a class="pull-left" href="{{=it.author_link}}" target="_blank"><img class="media-object" src="{{=it.author_picture}}"></a><div class="media-body"><p><span class="muted pull-right"> {{=it.time_ago}}</span><strong><a style="font-weight: bold !important;" href="{{=it.author_link}}" target="_blank" ><span class="author-title">{{=it.author_name}}</span></a></strong></p><div class="text-wrapper"><p class="social-feed-text">{{=it.text}} <a href="{{=it.link}}" target="_blank" class="read-button">read more</a></p></div></div></div><a href="{{=it.link}}" target="_blank" class="">{{=it.attachment}}</a></div></div>',
<?php	} ?>
<?php if($fbfba_theme_selection == 'template1') { ?>
template_html: '<div class="grid-item"><div class="social-feed-element {{? !it.moderation_passed}}hidden{{?}}" dt-create="{{=it.dt_create}}" social-feed-id = "{{=it.id}}"><div class="content"><div class="text-wrapper"><a href="{{=it.link}}" target="_blank" class="">{{=it.attachment}}</a><p class="social-feed-text">{{=it.text}} <a href="{{=it.link}}" target="_blank" class="read-button">read more</a></p></div><div class="media-body"><a class="pull-left" href="{{=it.author_link}}" target="_blank"><img class="media-object" src="{{=it.author_picture}}"></a><p><strong><a style="font-weight: bold !important;" href="{{=it.author_link}}" target="_blank" ><span class="author-title">{{=it.author_name}}</span></a></strong></p><span class="muted pull-right"> {{=it.time_ago}}</span></div></div></div></div>',
<?php	} ?>
<?php if($fbfba_theme_selection == 'template2' || $fbfba_theme_selection == 'template3') { ?>
template_html: '<div class="grid-item"><div class="social-feed-element {{? !it.moderation_passed}}hidden{{?}}" dt-create="{{=it.dt_create}}" social-feed-id = "{{=it.id}}"><a href="{{=it.link}}" target="_blank" class="">{{=it.attachment}}</a><span class="muted pull-right"> {{=it.time_ago}}</span><div class="text-wrapper"><p class="social-feed-text">{{=it.text}} <a href="{{=it.link}}" target="_blank" class="read-button">read more</a></p></div><div class="content"><a class="pull-left" href="{{=it.author_link}}" target="_blank"><img class="media-object" src="{{=it.author_picture}}"></a><div class="media-body"><p><strong><a style="font-weight: bold !important;" href="{{=it.author_link}}" target="_blank" ><span class="author-title">{{=it.author_name}}</span></a></strong></p></div></div></div></div>',
<?php	} ?>
<?php if($fbfba_theme_selection == 'template4') { ?>
template_html: '<div class="grid-item"><div class="social-feed-element {{? !it.moderation_passed}}hidden{{?}}" dt-create="{{=it.dt_create}}" social-feed-id = "{{=it.id}}"><div class="content"><a class="pull-left" href="{{=it.author_link}}" target="_blank"><img class="media-object" src="{{=it.author_picture}}"></a><div class="media-body"><p><strong><a style="font-weight: bold !important;" href="{{=it.author_link}}" target="_blank" ><span class="author-title">{{=it.author_name}}</span></a></strong></p><span class="muted pull-right"> {{=it.time_ago}}</span></div></div><a href="{{=it.link}}" target="_blank" class="">{{=it.attachment}}</a><div class="text-wrapper"><p class="social-feed-text">{{=it.text}} <a href="{{=it.link}}" target="_blank" class="read-button">read more</a></p></div></div></div>',
<?php	} ?>

date_format: "ll",                             
date_locale: "en",   
length:fbfba_limit_post_characters,                                  
show_media:true

});


});
}, 1000);
moment.locale(fbfba_date_posted_lang);
console.log(moment.locale(fbfba_date_posted_lang));
</script>


<?php
return ob_get_clean();
}