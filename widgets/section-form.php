<?php   
	if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
	    $t_name 	= 'Name *';
	    $t_email 	= 'Email *';
	    $t_phone 	= 'Phone / Mobile *';
	    $t_time 	= 'Best time to contact';
	    $t_message 	= 'More information';
	}else{
	   $t_name 		= 'ชื่อ *';
	    $t_email 	= 'Email *';
	    $t_phone 	= 'เบอร์โทรศัพท์ *';
	    $t_time 	= 'เวลาที่สะดวกให้ติดต่อกลับ';
	    $t_message 	= 'รายละเอียดเพิ่มเติม';
	} 
?>
<div class="form-group">
	<label><?=$t_name?></label>
	<input type="text" name='name' class="form-control" required/>
</div>
<div class="form-group">
	<label><?=$t_email?></label>
	<input type="email" name='email' class="form-control" required/>
</div>
<div class="form-group">
	<label><?=$t_phone?></label>
	<input type="text" name='phone' class="form-control" required/>
</div>
<div class="form-group">
	<label><?=$t_time?></label>
	<input type="text" name='time_contact' class="form-control" />
</div>
<div class="form-group">
	<label><?=$t_message?></label>
	<textarea name='message' class="form-control" ></textarea>
</div>


					