<?php 
/*
Plugin Name: The Awesome Feed - Custom Feed
Plugin URI: https://wordpress.org/plugins/wp-facebook-feed
Description: Add Responsive Facebook Feed into your Posts, Pages & Widgets
Author: Arrow Plugins
Author URI: https://www.arrowplugins.com
Version: 2.2.5
License: GplV2
Copyright: 2022 Arrow Plugins
*/


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define( 'FBFBA_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
include_once('includes/fbfba-post-type.php');
include_once('includes/fbfba-custom-columns.php');
include_once('includes/fbfba-post-meta-boxes.php');


include_once('includes/fbfba-save-post.php');
include_once('includes/fbfba-shortcode.php');

include_once('includes/fbfba-enqueue-scripts.php');




add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'fbfba_plugin_action_links' );

function fbfba_plugin_action_links( $links ) {
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'edit.php?post_type=fbfba_facebook_feed') ) .'">Dashboard</a>';
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'edit.php?post_type=fbfba_facebook_feed&page=fbfba_form_support') ) .'">Support</a>';
   return $links;
}