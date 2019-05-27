<?php
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page( array(
		'page_title' 	=> 'Pre-footer call to action',
		'menu_title'	=> 'Pre-footer CTA',
		'menu_slug'  	=> 'prefooter-cta',
		'post_id'    	=> 'prefooter-cta',
		'capability' 	=> 'edit_posts',
		'redirect' 		=> false
	) );
	}
?>