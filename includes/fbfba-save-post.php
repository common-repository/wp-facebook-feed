<?php
add_action( 'save_post', 'fbfba_save_form' );

function fbfba_save_form( $post_id ) {

	$post_type = get_post_type($post_id);
// If this isn't a 'sfba_subscribe_form' post, don't update it.
	if ( "fbfba_facebook_feed" != $post_type ) {
		return;
	}

// Stop WP from clearing custom fields on autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}

// Prevent quick edit from clearing custom fields
	if (defined('DOING_AJAX') && DOING_AJAX){
		return;
	}
// - Update the post's metadata.
	if ( isset( $_POST['fbfba_private_access_token'] ) ) {
		update_post_meta( $post_id, '_fbfba_private_access_token', sanitize_text_field( $_POST['fbfba_private_access_token'] ) );
	}
	if ( isset( $_POST['fbfba_shortcode_value'] ) ) {
		update_post_meta( $post_id, '_fbfba_shortcode_value', sanitize_text_field( $_POST['fbfba_shortcode_value'] ) );
	}
	if ( isset( $_POST['fbfba_theme_selection'] ) ) {
		update_post_meta( $post_id, '_fbfba_theme_selection', sanitize_text_field( $_POST['fbfba_theme_selection'] ) );
	}
	if ( isset( $_POST['fbfba_feed_post_size'] ) ) {
		update_post_meta( $post_id, '_fbfba_feed_post_size', sanitize_text_field( $_POST['fbfba_feed_post_size'] ) );
	}
	if ( isset( $_POST['fbfba_limit_post_characters'] ) ) {
		update_post_meta( $post_id, '_fbfba_limit_post_characters', sanitize_text_field( $_POST['fbfba_limit_post_characters'] ) );
	}
	if ( isset( $_POST['fbfba_column_count'] ) ) {
		update_post_meta( $post_id, '_fbfba_column_count', sanitize_text_field( $_POST['fbfba_column_count'] ) );
	}
	if ( isset( $_POST['fbfba_thumbnail_size'] ) ) {
		update_post_meta( $post_id, '_fbfba_thumbnail_size', sanitize_text_field( $_POST['fbfba_thumbnail_size'] ) );
	}
	if ( isset( $_POST['fbfba_feed_style'] ) ) {
		update_post_meta( $post_id, '_fbfba_feed_style', sanitize_text_field( $_POST['fbfba_feed_style'] ) );
	}
	if ( isset( $_POST['fbfba_show_photos_from'] ) ) {
		update_post_meta( $post_id, '_fbfba_show_photos_from', sanitize_text_field( $_POST['fbfba_show_photos_from'] ) );
	}
	if ( isset( $_POST['fbfba_user_id'] ) ) {
		update_post_meta( $post_id, '_fbfba_user_id', sanitize_text_field( $_POST['fbfba_user_id'] ) );
	}
		if ( isset( $_POST['fbfba_facebook_access_token'] ) ) {
		update_post_meta( $post_id, '_fbfba_facebook_access_token', sanitize_text_field( $_POST['fbfba_facebook_access_token'] ) );
	}
	if ( isset( $_POST['fbfba_hashtag'] ) ) {
		update_post_meta( $post_id, '_fbfba_hashtag', sanitize_text_field( $_POST['fbfba_hashtag'] ) );
	}
	if ( isset( $_POST['fbfba_location'] ) ) {
		update_post_meta( $post_id, '_fbfba_location', sanitize_text_field( $_POST['fbfba_location'] ) );
	}
	if ( isset( $_POST['fbfba_container_width'] ) ) {
		update_post_meta( $post_id, '_fbfba_container_width', sanitize_text_field( $_POST['fbfba_container_width'] ) );
	}
	if ( isset( $_POST['fbfba_number_of_photos'] ) ) {
		update_post_meta( $post_id, '_fbfba_number_of_photos', sanitize_text_field( $_POST['fbfba_number_of_photos'] ) );
	}
	if ( isset( $_REQUEST['fbfba_show_photos_only'] ) ) {
		update_post_meta($post_id, '_fbfba_show_photos_only', TRUE);
	} else {
		update_post_meta($post_id, '_fbfba_show_photos_only', FALSE);
	}
	if ( isset( $_REQUEST['fbfba_date_posted'] ) ) {
		update_post_meta($post_id, '_fbfba_date_posted', TRUE);
	} else {
		update_post_meta($post_id, '_fbfba_date_posted', FALSE);
	}
	if ( isset( $_REQUEST['fbfba_read_more'] ) ) {
		update_post_meta($post_id, '_fbfba_read_more', TRUE);
	} else {
		update_post_meta($post_id, '_fbfba_read_more', FALSE);
	}
	if ( isset( $_REQUEST['fbfba_profile_picture'] ) ) {
		update_post_meta($post_id, '_fbfba_profile_picture', TRUE);
	} else {
		update_post_meta($post_id, '_fbfba_profile_picture', FALSE);
	}
	if ( isset( $_REQUEST['fbfba_caption_text'] ) ) {
		update_post_meta($post_id, '_fbfba_caption_text', TRUE);
	} else {
		update_post_meta($post_id, '_fbfba_caption_text', FALSE);
	}
	if ( isset( $_REQUEST['fbfba_link_photos_to_instagram'] ) ) {
		update_post_meta($post_id, '_fbfba_link_photos_to_instagram', TRUE);
	} else {
		update_post_meta($post_id, '_fbfba_link_photos_to_instagram', FALSE);
	}



	

if ( isset( $_POST['fbfba_social_card_width'] ) ) {
		update_post_meta( $post_id, '_fbfba_social_card_width', sanitize_text_field( $_POST['fbfba_social_card_width'] ) );
	}

	if ( isset( $_POST['fbfba_social_card_background_color'] ) ) {
		update_post_meta( $post_id, '_fbfba_social_card_background_color', sanitize_text_field( $_POST['fbfba_social_card_background_color'] ) );
	}

	if ( isset( $_POST['fbfba_heading_font_size'] ) ) {
		update_post_meta( $post_id, '_fbfba_heading_font_size', sanitize_text_field( $_POST['fbfba_heading_font_size'] ) );
	}

	if ( isset( $_POST['fbfba_caption_font_size'] ) ) {
		update_post_meta( $post_id, '_fbfba_caption_font_size', sanitize_text_field( $_POST['fbfba_caption_font_size'] ) );
	}

	if ( isset( $_POST['fbfba_social_card_heading_color'] ) ) {
		update_post_meta( $post_id, '_fbfba_social_card_heading_color', sanitize_text_field( $_POST['fbfba_social_card_heading_color'] ) );
	}

	if ( isset( $_POST['fbfba_social_card_content_color'] ) ) {
		update_post_meta( $post_id, '_fbfba_social_card_content_color', sanitize_text_field( $_POST['fbfba_social_card_content_color'] ) );
	}

	if ( isset( $_POST['fbfba_social_card_date_color'] ) ) {
		update_post_meta( $post_id, '_fbfba_social_card_date_color', sanitize_text_field( $_POST['fbfba_social_card_date_color'] ) );
	}
if ( isset( $_POST['fbfba_feed_profile_style'] ) ) {
		update_post_meta( $post_id, '_fbfba_feed_profile_style', sanitize_text_field( $_POST['fbfba_feed_profile_style'] ) );
	}
	if ( isset( $_REQUEST['fbfba_hide_media'] ) ) {
		update_post_meta($post_id, '_fbfba_hide_media', TRUE);
	} else {
		update_post_meta($post_id, '_fbfba_hide_media', FALSE);
	}
}