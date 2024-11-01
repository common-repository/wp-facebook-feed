<?php
add_action( 'wp_enqueue_scripts', 'fbfba_enqueue_styles', 10);
add_action( 'admin_enqueue_scripts', 'fbfba_admin_enqueue_styles', 10);

function fbfba_enqueue_styles() {
	
		wp_enqueue_script('jquery');
		
		wp_register_script( 'fbfba_jquery', plugin_dir_url( __FILE__ ) . '../bower_components/jquery/dist/jquery.min.js', array( 'jquery' ) );
		wp_register_script( 'fbfba_codebird', plugin_dir_url( __FILE__ ) . '../bower_components/codebird-js/codebird.js', array( 'jquery' ) );
		wp_register_script( 'fbfba_doT', plugin_dir_url( __FILE__ ) . '../bower_components/doT/doT.min.js', array( 'jquery' ) );
		wp_register_script( 'fbfba_moment', plugin_dir_url( __FILE__ ) . '../bower_components/moment/min/moment.min.js', array( 'jquery' ) );
		wp_register_script( 'fbfba_socialfeed', plugin_dir_url( __FILE__ ) . '../js/jquery.socialfeed.js', array( 'jquery' ) );
		wp_register_style( 'fbfba_socialfeed_style', plugin_dir_url( __FILE__ )  . '../css/jquery.socialfeed.css', false, '1.0.0' );

		wp_enqueue_style( 'fbfba_jquery');
		wp_enqueue_style( 'fbfba_socialfeed_style');
		wp_enqueue_style( 'fbfba_fontawesome_style');
   		wp_enqueue_script( 'fbfba_codebird');
   		wp_enqueue_script( 'fbfba_doT');
   		wp_enqueue_script( 'fbfba_moment');
   		wp_enqueue_script( 'fbfba_socialfeed');

}


function fbfba_admin_enqueue_styles() {
	
		wp_enqueue_script('jquery');
		wp_register_script( 'fbfba_script', plugin_dir_url( __FILE__ ) . '../js/fbfba-script.js', array( 'jquery' ) );
		wp_enqueue_script( 'fbfba_script');
				 wp_enqueue_style( 'wp-color-picker' );
    	wp_enqueue_script( 'wp-color-picker-script',  plugin_dir_url(__FILE__) .'../js/colorpicker.js', array( 'wp-color-picker' ), false, true );
		
}