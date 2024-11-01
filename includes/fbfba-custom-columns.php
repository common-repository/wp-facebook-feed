<?php
add_filter( 'manage_fbfba_facebook_feed_posts_columns', 'fbfba_custom_posts_columns' );

// Hook to custom data in Custom Columns
add_action( 'manage_fbfba_facebook_feed_posts_custom_column' , 'fbfba_custom_form_columns' , 10 , 2 );

function fbfba_custom_posts_columns( $columns ){
	$newColumns = array();
	$newColumns['title'] = 'Feed Title';
	$newColumns['info'] = 'Feed Info';
	$newColumns['shortcode'] = 'Shortcode';
	$newColumns['date'] = 'Date';
	$newColumns['author'] = 'Created by';
	return $newColumns;
}


function fbfba_custom_form_columns( $column , $post_id ){
	switch( $column ){
		case 'shortcode' : 
		$fbfba_cpt_generated_shortcode = get_post_meta($post_id, '_fbfba_shortcode_value', true);
		echo '<span style="font-size:16px;font-weight:;display:inline-block;padding-top:7px;">'.$fbfba_cpt_generated_shortcode.'</span><br/>';
		break;

		case 'info' :
		$_fbfba_feed_style = get_post_meta($post_id, '_fbfba_feed_style', true);
		$_fbfba_theme_selection = get_post_meta($post_id, '_fbfba_theme_selection', true);
		$_fbfba_show_photos_from = get_post_meta($post_id, '_fbfba_show_photos_from', true);
		$_fbfba_hashtag = get_post_meta($post_id, '_fbfba_hashtag', true);
		$_fbfba_user_id = get_post_meta($post_id, '_fbfba_user_id', true);
		$selected_feed_theme ='';
		$selected_feed_style ='';
		$selected_feed_from ='';
		$selected_feed_from_value ='';


		if($_fbfba_theme_selection == 'default'){
			$selected_feed_theme = 'Default Theme';
		}else if($_fbfba_theme_selection == 'template0'){
			$selected_feed_theme = 'Dark';
		}else if($_fbfba_theme_selection == 'template1'){
			$selected_feed_theme = 'Pinterest Like';
		}else if($_fbfba_theme_selection == 'template2'){
			$selected_feed_theme = 'Modern Light';
		}else if($_fbfba_theme_selection == 'template3'){
			$selected_feed_theme = 'Modern Dark';
		}else if($_fbfba_theme_selection == 'template4'){
			$selected_feed_theme = 'Space White';
		}

		if($_fbfba_feed_style == 'vertical'){
			$selected_feed_style = 'Vertical';
		}else if($_fbfba_feed_style == 'thumbnails'){
			$selected_feed_style = 'Thumbnails';
		}else if($_fbfba_feed_style == 'blog_style'){
			$selected_feed_style = 'Blog Style';
		}else if($_fbfba_feed_style == 'masonry'){
			$selected_feed_style = 'Masonry';
		}

		if($_fbfba_show_photos_from == 'hashtag'){
			$selected_feed_from_value = $_fbfba_hashtag;
			$selected_feed_from = 'Hashtag';

		}else if($_fbfba_show_photos_from == 'userid'){
			$selected_feed_from_value = $_fbfba_user_id;
			$selected_feed_from = 'Username';
		}

		echo '<span style="">Feed Style: '.$selected_feed_style.'</span><br/>';
		echo '<span style=";">Feed Theme: '.$selected_feed_theme.'</span><br/>';
		echo '<span style="">'.$selected_feed_from.': </span>';
		echo '<span style="">'.$selected_feed_from_value.'</span><br/>';
		

		break;
	}

}
