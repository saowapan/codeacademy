<?php

function promotion_register_meta_boxes() {
    add_meta_box( 'promotion_details', __( 'Promotion Details', '' ), 'promotion_detail_callback', 'promotion', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'promotion_register_meta_boxes' );

function promotion_detail_callback( $post ) { 
	$values = get_post_custom( $post->ID );
    $promotion_details = isset($values['promotion_details']) ? unserialize($values['promotion_details'][0]): '';
    ?>
    <link type="text/css" rel="stylesheet" href="<? build_url('/assets/styles/jquery-ui.css'); ?>"/>
    <script type="text/javascript"  src="<? build_url ('/assets/scripts/jquery-1.10.2.js'); ?>"></script>
    <script type="text/javascript"  src="<? build_url ('/assets/scripts/jquery-ui.js'); ?>"></script>
    <script>$(function() {$( "#date_start,#date_end" ).datepicker();}); </script>
    <table>
        <tr>
        	<td>เริ่ม promotion</td>
        	<td><input type="text" name="promotion_details[date_start]" id="date_start" value="<?php if (isset($promotion_details['date_start'])) echo $promotion_details['date_start']; ?>" /></td>
        </tr>
        <tr>
        	<td>สิ้นสุด promotion</td>
        	<td><input type="text" name="promotion_details[date_end]" id="date_end" value="<?php if (isset($promotion_details['date_end'])) echo $promotion_details['date_end']; ?>" /></td>
        </tr>
        <tr>
        	<td>ราคา</td>
        	<td><input type="number" name="promotion_details[pricing]" id="pricing" value="<?php if (isset($promotion_details['pricing'])) echo $promotion_details['pricing']; ?>" /> ฿</td>
        </tr>
    </table>
    <?
    wp_nonce_field('promotion_nonce_action', 'promotion_nonce_name'); 

}    

function promotion_save_data_detail( $post_id ){
 
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['promotion_nonce_name'] ) || !wp_verify_nonce( $_POST['promotion_nonce_name'], 'promotion_nonce_action' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    // Make sure your data is set before trying to save it
    if( isset( $_POST['promotion_details'] ) ) {
        update_post_meta( $post_id, 'promotion_details', $_POST['promotion_details'] );
    }
}
add_action( 'save_post', 'promotion_save_data_detail' );
?>