<?php /* Template Name: Home Page */ ?>
<?php 
	while (have_posts()) : the_post(); 
		if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
			get_template_part('templates/content', 'homeENG'); 
		}else{
			get_template_part('templates/content', 'home'); 	
		} 
	endwhile; 
?>