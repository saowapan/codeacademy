<?php /* Template Name: About Page */ ?>
<?php 
	while (have_posts()) : the_post(); 
		if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
			get_template_part('templates/content', 'aboutENG'); 
		}else{
			get_template_part('templates/content', 'about');	
		} 
	endwhile; 
?>