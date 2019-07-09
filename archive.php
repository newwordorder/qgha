<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<section
	class="page-header page-header--blog"
>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 text-center">
		<?php
			the_archive_title( '<h1>', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
    </div>
  </div>
</div>
</section>
<div class="wrapper blog-feed" id="index-wrapper">
	<div class="container" id="content" tabindex="-1">
				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<div id="posts_row" class="row">
					<?php while ( have_posts() ) : the_post(); 
							    $backgroundImage = get_field('background_image');
								?>
					  <a href="<?php the_permalink(); ?>" class="col-md-4 feature-column ">
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
								<div class="feature-column__image image--landscape" style="position: relative;">
									<div class="background-image-holder rounded">
										<img data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>">
									</div>
									</div>											
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
					<?php endwhile;
					?>
					</div>
				<?php else : ?>
					<?php get_template_part( 'loop-templates/content', 'none' ); ?>
				<?php endif; ?>
			<!-- The pagination component -->
			<div class="row justify-content-center" style="margin: 2rem 0rem 2rem 0rem;">
			<?php global $wp_query; // you can remove this line if everything works for you
			// don't display the button if there are not enough posts
			if (  $wp_query->max_num_pages > 1 )
				echo '<div class="btn btn--outline loadmore m-auto">More posts</div>'; 
			?>
			</div>
</div><!-- Container end -->
</div><!-- Wrapper end -->
<?php get_template_part( 'page-templates/blocks/pre-footer-cta' ); get_footer(); ?>

