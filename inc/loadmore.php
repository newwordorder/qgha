<?php 
function misha_my_load_more_scripts() {
 
	global $wp_query; 
	
	$published_posts = wp_count_posts()->publish;
	$posts_per_page = get_option('posts_per_page');
	$page_number_max = ceil($published_posts / $posts_per_page);

	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');
 
	// register our main script but do not enqueue it yet
	//wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $page_number_max
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );

function misha_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	//$args = json_decode( stripslashes( $_POST['query'] ), true );
	//print_r($args);
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	$query = query_posts( $args ); 
	?>
 
	<?php if ( have_posts() ) : ?>
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); 
			$backgroundImage = get_field('background_image'); ?>
			<a href="<?php the_permalink(); ?>" class="col-md-4 feature-column">
			 	<article class="blog-column<?php if(empty($backgroundImage)): echo '--both'; endif;  ?>">
				   <?php

				   if( !empty($backgroundImage) ):
					 // vars
					 $url = $backgroundImage['url'];
					 $alt = $backgroundImage['alt'];
					 $size = '600x400';
					 $thumb = $backgroundImage['sizes'][ $size ];
					 $width = $backgroundImage['sizes'][ $size . '-width' ];
					 $height = $backgroundImage['sizes'][ $size . '-height' ];
					 ?>
					   <img class="feature-column__image rounded" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
				   <?php endif; ?>
				   <div class="blog-column__text">
                    <h6><?php $category = get_the_category(); echo $category[0]->name; ?></h6>
                    <p class="lead"><?php the_title(); ?></p>
										<?php if(empty($backgroundImage)): ?>
											<p><?php the_excerpt(); ?></p>
										<?php endif; ?>
								</div>
			   </article>
			 </a>
		<?php endwhile; ?>
	<?php else : ?>

	<?php endif; ?>
<?php	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}