<?php /* Template Name: Register Courses Page */ ?>
<?php while (have_posts()) : the_post(); ?>
<?php 
	if (isset($_POST['submit'])){
		$title = $_POST['title'];
	}
?>	
<section class="container-fluid section-header-pricing header-info">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 main-text">
				<?php   
				if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
				    echo  '<h1>Register Coures</h1>';
				}else{
				 	echo  '<h1>ลงทะเบียนเรียน</h1>';
				} ?>
				<h1 class="course-name"><?=$title?></h1>
			</div>
		</div>
	</div>
</section>
<section class="container-fluid">
	<div class="container">
		<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST" >
			<div class="form-group">
				<?php   
				if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
				    echo  '<label>Coures Name</label>';
				}else{
				 	echo  '<label>ชื่อคอร์สที่ลงเรียน*</label>';
				} ?>

				<select name="coures_name" class="form-control">
					<? if($title){ ?>
						<option><?=$title?></option>
					<? }?>

					<? $args = array(
						'post_type' => array( 'course','promotion' ),
						'posts_per_page'  => -1 ,
						'order'           => 'ASC',
						'post_status'     => 'publish',
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 
					?>

						<option><?=get_the_title()?></option>

					<?endwhile; ?>
			</select>
			</div>
			<?php get_template_part('widgets/section', 'form'); ?> 	
			<div class="form-group flex">
				<input type="hidden" name="post_id" value="<?if(isset($_GET['pid'])){echo $_GET['pid'];}?>" />
				<input type="hidden" name="cate" value="Register">
				<input type="hidden" name="action" value="book_register">
				<?php   
				if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
				    $submit_value =  'Register Coures';
				}else{
				 	$submit_value =  'ลงทะเบียนเรียน';
				} ?>
				<input type='submit' name='submit' value="<?=$submit_value?>" class="col-lg-3 col-md-4 col-sm-5 col-xs-9 button-large text-uppercase"/>
			</div>
		</form>
	</div>	
</section>
<?php get_template_part('widgets/section', 'web-course'); ?> 
<?php endwhile; ?>