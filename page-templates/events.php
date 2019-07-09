<?php
/**
* Template Name: Events
 *
 * @package understrap
 */

get_header(); 

$id = get_the_id();
$backgroundImage = get_field('background_image', $id);

$image = $backgroundImage['background_image'];
$imageOverlay = $backgroundImage['image_overlay'];
$backgroundEffect = $backgroundImage['background_effect'];
$invertColours = $backgroundImage['invert_colours'];
$headerText = get_field('header_text', 428);
?>
<section id="sub-header" class="page-header page-header--page bg-effect--<?php echo $backgroundEffect ?> imagebg"
data-overlay="0"
>
  <?php if( !empty($image) ):

    // vars
    $url = $image['url'];
    $alt = $image['alt'];
  ?>
    <div class="background-image-holder">
      <img data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
    </div>
  <?php endif; ?>

<div class="container">
  <div class="row">
    <div class="col-md-6" style="padding: 12rem 0 8rem; display:flex; flex-direction:row; align-items:center">
    <?php if($headerText): ?>
      <h1 class="page-title" style="margin-bottom:0;"><?php echo $headerText; ?></h1>
    <? else: ?>
      <h1 class="page-title" style="margin-bottom:0;"><?php the_title(); ?></h1>
    <?php endif; ?>
    <?php if($headerSubText): ?>
      <p class="lead" style="margin-bottom:0;"><?php echo $headerSubText; ?></h1>
    <?php endif; ?>
    </div>
		<div class="col-md-6" style="padding: 12rem 0 8rem; display:flex; flex-direction:row; align-items:center">
		<?php
				$categories = get_categories( array(
						'orderby' => 'name',
						'order'   => 'ASC',
						'post_type' => 'events',
						) );
				echo '<div class="blog-categories">';
				echo '<h6 style="margin-bottom:0;">'
				?><!--<a style="text-decoration:none;  href="<? echo get_site_url(); ?>/news">All</a> -->
				<?php
				/*
				foreach( $categories as $category ) {
						$category_link = sprintf(
								'<a style="text-decoration:none;" class="blog-categories__link" href="%1$s" alt="%2$s">%3$s</a>',
								esc_url( get_category_link( $category->term_id ) ),
								esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
								esc_html( $category->name )
						);
						echo sprintf( esc_html__( '%s', 'textdomain' ), $category_link );

				}
				*/
				echo '</div>';
				?></div>
  </div>
</div>

</section>

<section class="space--sm">

	<div class="container" id="main" tabindex="-1">

	<?php
	$args = array(
		'posts_per_page' => 1,
		'meta_key' => 'meta-checkbox',
		'meta_value' => 'yes',
		'post_type' => 'events',
	);

	$featured = new WP_Query($args);

if ($featured->have_posts()):?>

		<div class="row">
			<?php while ($featured->have_posts() ) : $featured->the_post();
			 $backgroundImage = get_field('background_image');

			?>
			<div class="col-md-8">
			<img class="feature-column__image rounded" style="margin-bottom:0;" data-src="<?php echo $backgroundImage['url']; ?>" alt="<?php echo $alt; ?>"/>

			</div>
			<div class="col-md-4 blog-column--both">
				<h6><?php $category = get_the_category(); echo $category[0]->name; ?></h6>
				<p class="lead"><?php the_title(); ?></p>
				<p><?php the_excerpt(); ?></p>
			</div>
		</div>

<?php endwhile; ?>
<?php endif; ?>

		<?php /* Start the Loop */ ?>
		<div id="posts_row" class="row">
      <?php
            // the query
            $the_query = new WP_Query( array(
								'posts_per_page' => 9,
								'post_type' => 'events',

            ));
          ?>
        <?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
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
                    <img class="feature-column__image rounded" data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
								<?php endif; ?>
								<div class="blog-column__text">
                    <h6><?php the_field('date'); ?></h6>
                    <p class="lead"><?php the_title(); ?></p>
										<?php if(empty($backgroundImage)): ?>
											<p><?php the_excerpt(); ?></p>
										<?php endif; ?>
								</div>
            </article>
                
              </a>

        <?php endwhile;

            // reset post data
            wp_reset_postdata();

        ?>
      <?php endif; ?>
    </div>


			<!-- The pagination component -->
<div class="row justify-content-center" style="margin-top: 2rem;">
			<?php $query = new WP_Query( array('posts_per_page' => 9, 'post_type' => 'events' )); // you can remove this line if everything works for you			// don't display the button if there are not enough posts
			if (  $query->max_num_pages > 1 )
				echo '<div class="btn btn--solid loadmore m-auto">Load More</div>';
			?>

</div>
</div><!-- Container end -->

</section>

<?php 
        get_template_part( 'page-templates/blocks/pre-footer-cta' );

get_footer(); ?>
