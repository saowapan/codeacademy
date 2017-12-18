<?php

function course_register_meta_boxes() {
    add_meta_box( 'course_details', __( 'Course Details', '' ), 'content_detail_callback', 'course', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'course_register_meta_boxes' );


function content_detail_callback( $post ) { ?>
    <link type="text/css" rel="stylesheet" href="<? build_url('/assets/styles/jquery-ui.css'); ?>"/>
    <script type="text/javascript"  src="<? build_url ('/assets/scripts/jquery-1.10.2.js'); ?>"></script>
    <script type="text/javascript"  src="<? build_url ('/assets/scripts/jquery-ui.js'); ?>"></script>
    <script>$(function() {$( "#date_start,#date_end" ).datepicker();}); </script>
    <?php
        $values = get_post_custom( $post->ID );
        $course_details = isset($values['course_details']) ? unserialize($values['course_details'][0]): '';
    ?>
    <table>
        <tr>
            <td>เริ่มเรียนวันที่ : </td>
            <td><input type="text" name="course_details[date_start]" id="date_start" value="<?php if (isset($course_details['date_start'])) echo $course_details['date_start']; ?>" /></td>
        </tr>
        <tr>
            <td>จบหลักสูตร์วันที่ : </td>
            <td><input type="text" name="course_details[date_end]" id="date_end" value="<?php if (isset($course_details['date_end'])) echo $course_details['date_end']; ?>" /></td>
        </tr>
        <tr>
            <td>ระบุเวลาเรียน : </td>
            <td><input type="text" name="course_details[hours_start]" id="hours_start" value="<?php if (isset($course_details['hours_start'])) echo $course_details['hours_start']; ?>" />  ถึง</td>
            <td><input type="text" name="course_details[hours_end]" id="hours_end" value="<?php if (isset($course_details['hours_end'])) echo $course_details['hours_end']; ?>" /></td>
        </tr>
        <tr>
            <td>รวมจำนวนชั่วโมงต่อคอร์ส :</td>
            <td><input type="text" name="course_details[hours]" id="hours" value="<?php if (isset($course_details['hours'])) echo $course_details['hours']; ?>" /> ชั่วโมง</td>
        </tr>
        <tr>
            <td>รวมจำนวนครั้งที่เรียนต่อคอร์ส :</td>
            <td><input type="text" name="course_details[numbers]" id="numbers" value="<?php if (isset($course_details['numbers'])) echo $course_details['numbers']; ?>" /> ครั้ง</td>
        </tr>
        <tr>
            <td>ผู้สอน</td>
            <td><input type="text" name="course_details[lecturer]" id="lecturer" value="<?php if (isset($course_details['lecturer'])) echo $course_details['lecturer']; ?>" /></td>
        </tr>
        <tr> 
            <td>ราคาปกติ</td>
            <td><input type="number" name="course_details[pricing]" id="pricing" value="<?php if (isset($course_details['pricing'])) echo $course_details['pricing']; ?>" /> ฿</td>
        </tr>
        <tr> 
            <td>ราคาเรียนแบบกลุ่ม</td>
            <td><input type="number" name="course_details[pricing_group]" id="pricing_group" value="<?php if (isset($course_details['pricing_group'])) echo $course_details['pricing_group']; ?>" /> ฿</td>
        </tr>
        <tr> 
            <td>ราคาเรียนแบบส่วนตัว</td>
            <td><input type="number" name="course_details[pricing_private]" id="pricing_private" value="<?php if (isset($course_details['pricing_private'])) echo $course_details['pricing_private']; ?>" /> ฿</td>
        </tr>
        <tr> 
            <td>URL VDO</td>
            <td><input type="text" name="course_details[vdo]" id="vdo" value="<?php if (isset($course_details['vdo'])) echo $course_details['vdo']; ?>" /></td>
        </tr>
    </table>
    <h4 style="color:#000;">User ที่ต้องการให้เห็น VDO</h4>
    <div style="display: inline-block;width: 100%;">
    <?php 
        $users = get_users();
        $count_users = count($users);
        for ($i=0; $i < $count_users ; $i++) { 

            if (isset($course_details[$i]['checkbox']) == '') {
                $checked = '';
            }else{ // value = yes 
                $checked    = 'checked=checked'; 
            } 

            if( $users[$i]->display_name != 'new' ) {?>
                <p style="width: 25%;float: left;">
                    <input class="btn" type="checkbox"  name="course_details[<?php echo $i; ?>][checkbox]"   value="<?php if (isset($course_details[$i]['checkbox'])) {echo $course_details[$i]['checkbox'];}?>" <?php echo $checked;?> /><?php echo $users[$i]->display_name; ?>
                    <input type="hidden"  name="course_details[<?php echo $i; ?>][name]"  value="<?php echo $users[$i]->display_name; ?>" />
                </p>
            <?php }
        } ?>
    </div>
    <script>
        jQuery(document).ready(function(){
            jQuery(".btn").click(function() {
                if(jQuery(this).is(":checked")) { 
                    jQuery(this).attr("value","yes");
                } else{
                    jQuery(this).attr("value","");
                }
            });
        });
    </script>
    <?php
        wp_nonce_field('course_nonce_action', 'course_nonce_name'); 
}


function save_data_detail( $post_id ){
 
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['course_nonce_name'] ) || !wp_verify_nonce( $_POST['course_nonce_name'], 'course_nonce_action' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    // Make sure your data is set before trying to save it
    if( isset( $_POST['course_details'] ) ) {
        update_post_meta( $post_id, 'course_details', $_POST['course_details'] );
    }
}
add_action( 'save_post', 'save_data_detail' );




?>
