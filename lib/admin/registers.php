<?php
	function bookcon_register_meta_boxes() {
    add_meta_box( 'register_details', __( 'Register Details', '' ), 'register_detail_callback', 'register', 'normal', 'high' );
	}
	add_action( 'add_meta_boxes', 'bookcon_register_meta_boxes' );
 	
 	function register_detail_callback( $post ) {
		$values = get_post_custom( $post->ID );
		$text_fields = [
			'coures_name'=> isset($values['coures_name']) ? $values['coures_name'] : "",
			'name'		=> isset($values['name']) ? $values['name'] : "",
			'email' 	=> isset($values['email']) ? $values['email'] : "",
			'phone' 	=> isset($values['phone']) ? $values['phone'] : "",
			'time_contact' 		=> isset($values['time_contact']) ? $values['time_contact'] : "",
		];
		?><table><?
 		foreach ($text_fields as $name => $value) { ?>
			<tr>
				<td><label for="<?php echo $name; ?>"><?php echo $name; ?></label></td>
				<td><input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php if (isset($value[0])) echo $value[0]; ?>"></td>
			</tr>
		<?php } ?>
		</table>
 	<?php wp_nonce_field('register_nonce_action', 'register_nonce_name');
}
function register_save_meta_box( $post_id ) {

	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	 
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['register_nonce_name'] ) || !wp_verify_nonce( $_POST['register_nonce_name'], 'register_nonce_action' ) ) return;
	 
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;

	// Make sure your data is set before trying to save it
	if( isset( $_POST['register_details'] ) ) {
		update_post_meta( $post_id, 'register_details', $_POST['register_details'] );
	}
}
add_action( 'save_post', 'register_save_meta_box' );
?>