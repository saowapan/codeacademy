jQuery(document).ready(function(){
	if (jQuery('#courses .tab-content.loadajax').length) {
		courses_show('all');
		display_btn('all');
	}

	// TABS 
	jQuery(".btn-all>a").click(function(){
		jQuery(".menumobile>h2").text("All");
	});
	jQuery(".btn-basic>a").click(function(){
		jQuery(".menumobile>h2").text("Basic");
	});
	jQuery(".btn-design>a").click(function(){
		jQuery(".menumobile>h2").text("Web Design");
	});
	jQuery(".btn-development>a").click(function(){
		jQuery(".menumobile>h2").text("web Development");
	});
	jQuery(".btn-wordpress>a").click(function(){
		jQuery(".menumobile>h2").text("Wordpress");
	});

});

function courses_send(category){
	var category_value = category;
	courses_show(category_value);
	display_btn(category_value);
}

var pageNumber = 1;
var ppp = 4;
var number_click = 0;

function courses_show(category) {
	var category_value = category;
	var ajax_url = ajax_courses_params.ajax_url;
	var start_pageNumber = 0
	
	if(number_click > 0) {
		pageNumber = 1
	}
	
	jQuery.ajax({
		type : 'post',
		url: ajax_url,
		data: {
			action: 'courses_show',
			courses_cate: category_value,
			ppp: 4,
			pageNumber: start_pageNumber
		},
		beforeSend: function ()
		{	
		},
		success: function(data)
		{	
			jQuery("#loadPage").show(0).delay(500).hide(0);
			jQuery('#courses .tab-content.loadajax .items-courses').html(data).hide(0).delay(500).show(0);
			number_click++ ;
			if (jQuery('#no_more_courses').length){
				jQuery("#more_courses").hide(); 
			} else {
				jQuery("#more_courses").show();
			}
		},
		error: function()
		{
			jQuery('#courses .tab-content.loadajax').html('<p>There has been an error</p>');
		}
	});		
}

function more_courses(category) {
	pageNumber = pageNumber+1;;
	var category_value = category;
	var ajax_url = ajax_courses_params.ajax_url;
	
	jQuery.ajax({
		type : 'post',
		url: ajax_url,
		data: {
			action: 'more_courses',
			courses_cate: category_value,
			ppp: ppp,
			pageNumber: pageNumber
		},
		beforeSend: function ()
		{
		},
		success: function(data)
		{
			jQuery('#courses .tab-content.loadajax .items-courses').append(data);
			if (jQuery('#no_more_courses').length){
				jQuery("#more_courses").hide(); 
			} else {
				jQuery("#more_courses").show();
			}
		},
		error: function()
		{
			jQuery('#courses .tab-content.loadajax').html('<p>There has been an error</p>');
		}
	});		
}

function display_btn(category){
	var category_value = category;
	var ajax_url = ajax_courses_params.ajax_url;
	jQuery.ajax({
		type : 'post',
		url: ajax_url,
		data: {
			action: 'display_btn',
			courses_cate: category_value,
		},
		success: function(data)
		{
			jQuery('#courses .tab-content.loadajax #courses-moreBtn ').html(data).hide(0).delay(700).show(0);
		}
	});
}
