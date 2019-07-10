<?php
/**
 * The template for displaying all single events.
 *
 * @package understrap
 */

get_header();
	$bgImage = get_field('background_image');
?>
<?php while ( have_posts() ) : the_post(); ?>
<section id="sub-header" class="page-header page-header--page bg-effect--<?php echo $backgroundEffect ?> imagebg <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?>" data-overlay="7" >

<?php

	if( !empty($bgImage) ):

	// vars
	$url = $bgImage['url'];
	$alt = $bgImage['alt'];

  ?>
  <div class="background-image-holder">
    <img data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
  </div>
<?php endif; ?>

	<div class="container">
	<div class="row  page-header__content">
		<div class="col-md-12">
      <h6><?php echo get_field('date'); ?></h6>
		  <h1 class="page-title" style="display:block;"><?php the_title(); ?></h1>
      <?php $rsvp = get_field('rsvp'); if($rsvp): ?><a href="<?php echo get_field('rsvp_link'); ?>" target="_blank" class="btn btn--outline">RSVP</a><?php endif; ?>
		</div>

	</div>
	</div>

<?php get_template_part( 'page-templates/blocks/overlap' ); ?>

</section>

<section id="single-wrapper" class="space--lg bg--light">

	<div class="container" id="content" tabindex="-1">

			<main id="main">
          <div class="row">
            <div class="col-md-8">
              <?php the_content(); ?>
              <?php $rsvp = get_field('rsvp'); if($rsvp): ?><a href="<?php echo get_field('rsvp_link'); ?>" target="_blank" class="btn btn--outline">RSVP</a><?php endif; ?>
            </div>
            <div class="col-md-4">
              <div class="event-details">
                <h6>Date</h6>
                <p class="lead m-small"><?php echo get_field('date'); ?></p>
                <h6>Time</h6>
                <p class="lead m-small"><?php echo get_field('time'); ?></p>
                <h6>Location</h6>
                <p class="lead m-small"><?php echo get_field('location'); ?></p>
              </div>
            </div>
          </div>
      </main><!-- #main -->

</div><!-- Container end -->

</section><!-- Wrapper end -->
<?php 

// Default arguments
$args = array(
  'post_type' => 'events',
  'posts_per_page' => 3, // How many items to display
  'post__not_in'   => array( get_the_ID() ), // Exclude current post
  'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
);

// Check for current post category and add tax_query to the query arguments
$cats = wp_get_post_terms( get_the_ID(), 'category' );
$cats_ids = array();
foreach( $cats as $wpex_related_cat ) {
  $cats_ids[] = $wpex_related_cat->term_id;
}
if ( ! empty( $cats_ids ) ) {
  $args['category__in'] = $cats_ids;
}

// Query posts
$wpex_query = new wp_query( $args );

if($wpex_query->posts): ?>

<section class="related-posts space--lg">
  <div class="container">
    
    <div class="row">
  <?php 

        // Loop through posts
    foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); $backgroundImage = get_field('background_image');?>
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
                <h6><?php echo get_field('date'); ?></h6>
                    <p class="lead"><?php the_title(); ?></p>
										<?php if(empty($backgroundImage)): ?>
											<p><?php the_excerpt(); ?></p>
										<?php endif; ?>
								</div>
            </article>
                
              </a>
		

        <?php
        // End loop
        endforeach;
        // Reset post data
        wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php endwhile; // end of the loop. ?>
<?php 
        get_template_part( 'page-templates/blocks/pre-footer-cta' );
        get_footer(); 
      ?>
