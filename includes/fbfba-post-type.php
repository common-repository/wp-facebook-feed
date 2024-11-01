<?php

add_action( 'init', 'fbfba_subscribe_form_function' );
add_action('admin_menu', 'fbfba_custom_menu_pages');
add_action('admin_menu', 'fbfba_custom_plugins_pages');
add_action('admin_menu', 'fbfba_rate_us_pages');
function fbfba_subscribe_form_function() {
    $labels = array(
        'name'               => _x( 'Facebook Feeds', 'post type general name' ),
        'singular_name'      => _x( 'Facebook Feed', 'post type singular name' ),
        'menu_name'          => _x( 'Facebook Feed', 'admin menu' ),
        'name_admin_bar'     => _x( 'Facebook Feed', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Form' ),
        'add_new_item'       => __( 'Add New Facebook Feed' ),
        'new_item'           => __( 'New Facebook Feed' ),
        'edit_item'          => __( 'Edit Facebook Feed' ),
        'view_item'          => __( 'View Facebook Feed' ),
        'all_items'          => __( 'All Facebook Feeds' ),
        'search_items'       => __( 'Search Facebook Feeds' ),
        'parent_item_colon'  => __( 'Parent Facebook Feeds:' ),
        'not_found'          => __( 'No Feed Forms found.' ),
        'not_found_in_trash' => __( 'No Feed Forms found in Trash.' )
        );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Add responsive facebook feed into your post, page & widgets' ),
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'rewrite'            => array( 'slug' => 'arrow_facebook_feed' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 25,
        'menu_icon'		 => 'dashicons-facebook',
        'supports'           => array( 'title' , 'custom_fields')
        );

    register_post_type( 'fbfba_facebook_feed', $args );
}


function fbfba_rate_us_pages() {

add_submenu_page(
    'edit.php?post_type=fbfba_facebook_feed',
    'Rate us',
    'Rate us',
    'manage_options',
    'fbfba_rate_us_plugins',
    'fbfba_rate_us_page' );

}


function fbfba_rate_us_page(){
    include_once( 'fbfba-rate-us.php' );
}


function fbfba_custom_plugins_pages() {

add_submenu_page(
    'edit.php?post_type=fbfba_facebook_feed',
    'Our Plugins',
    'Our Plugins',
    'manage_options',
    'fbfba_our_plugins',
    'fbfba_plugins_page' );

}


function fbfba_plugins_page(){
    include_once( 'fbfba-our-plugins.php' );
}



function fbfba_custom_menu_pages() {

add_submenu_page(
    'edit.php?post_type=fbfba_facebook_feed',
    'Support',
    'Support',
    'manage_options',
    'fbfba_form_support',
    'fbfba_support_page' );

}


function fbfba_support_page(){
    include_once( 'fbfba-support-page.php' );
}

function fbfba_settings_page() {

    $scr = get_current_screen();
    
    if( $scr-> post_type !== 'fbfba_facebook_feed' )
        return;

    include_once( 'fbfba-settings-page.php' );
}

add_action( 'edit_form_after_title', 'fbfba_settings_page' );
/*function admin_redirects() {
    global $pagenow;

    if($pagenow == 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] == 'fbfba_facebook_feed' ){
        if (isset($_GET['access_token'])) {
            
        wp_redirect(admin_url('/edit.php?post_type=fbfba_facebook_feed&page=fbfba_settings&access_token='.$_GET["access_token"], 'http'));
        exit;
    }
}
}

add_action('admin_init', 'admin_redirects');
*/
/*    if (isset($_GET['access_token'])) {
$url = urlencode(admin_url('edit.php?post_type=fbfba_facebook_feed&page=fbfba_settings&access_token').$_GET["access_token"]) ;
wp_redirect( $url ); exit;
}
*/

add_action('load-post-new.php', 'fbfba_limit_cpt' );

function fbfba_limit_cpt()
{
global $typenow;

if( 'fbfba_facebook_feed' !== $typenow )
return;

$total = get_posts( array( 
'post_type' => 'fbfba_facebook_feed', 
'numberposts' => -1, 
'post_status' => 'publish,future,draft' 
));

if( $total && count( $total ) >= 3 )
wp_die(
'<p style="text-align:center;font-weight:bold;">Sorry, Creation of maximum number of Facebook Feeds reached, Please <a href="https://www.arrowplugins.com/facebook-feed">Buy Premium Version</a> to create more amazing Facebook Feeds With Awesome Features</p>', 
'Maximum reached',  
array( 
'response' => 500, 
'back_link' => true 
)
);  
}