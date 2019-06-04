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


<div class="wrapper blog-feed" id="index-wrapper">


	<div class="container" id="content" tabindex="-1">




				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<div id="posts_row" class="row">

					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-sm-4">
						

							<article class="blog-tile">
							<a href="<?php the_permalink(); ?>" class="blog-tile__link"></a>
								<div class="blog-tile__thumb">
									<?php
									$workImage = get_field('tile_image');

									if( !empty($workImage) ):

										// vars
										$url = $workImage['url'];
										$alt = $workImage['alt'];

										$size = '600x400';
										$thumb = $workImage['sizes'][ $size ];
										$width = $workImage['sizes'][ $size . '-width' ];
										$height = $workImage['sizes'][ $size . '-height' ];

										?>
										<div class="background-image-holder ">
											<img class="rounded" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/>
										</div>
									<?php endif; ?>
								</div>
								<div class="blog-tile__content">
                  
                  <h5><?php the_title(); ?></h5>
                    <?php if (get_field('client')) : ?>
                      <span class="blog-tile__category">
                    <?php the_field('client'); ?>
                    </span>	
                  <?php endif; ?>
									
									
									
								</div>
							</article>


										</div>

					<?php endwhile; ?>

					</div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>




			<!-- The pagination component -->
			<div class="row justify-content-center mt-4 p-4">
			<?php global $wp_query; // you can remove this line if everything works for you
			
			// don't display the button if there are not enough posts
			if (  $wp_query->max_num_pages > 1 )
				echo '<div class="btn btn--outline loadmore m-auto">More posts</div>'; 
			?>
		
</div>
</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

