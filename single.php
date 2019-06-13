<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
	
?>
<?php while ( have_posts() ) : the_post(); ?>

<?php $bgImage = get_field('background_image'); 
$imageOverlay = get_field('image_overlay'); 
$backgroundEffect = get_field('background_effect');

 if( !empty($bgImage) ):

// vars
$url = $bgImage['url'];
$alt = $bgImage['alt'];

?>

<section id="sub-header"

class="page-header page-header--page bg-effect--<?php echo $backgroundEffect ?> imagebg"
data-overlay="<?php echo $imageOverlay; ?>"
>

  
    <div class="background-image-holder">
      <img data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
    </div>
<?php else: ?>

<section id="sub-header"

class="page-header page-header--page bg--light"
>

  <?php endif; ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 page-header__content text-align-center">

      <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
  </div>
</div>

</section>

<section id="single-wrapper" class="space--lg bg--light">

	<div class="container" id="content" tabindex="-1">

			<main id="main">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <?php the_content(); ?>
            </div>
          </div>

      </main><!-- #main -->

</div><!-- Container end -->

</section><!-- Wrapper end -->

<section class="related-posts  space--lg">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h4>Related articles</h4>
      </div>
    </div>
    <div class="row" style="position:relative;">
    <?php
        // Default arguments
        $args = array(
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

        // Loop through posts
		foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); $backgroundImage = get_field('background_image');?>
    <a href="<?php the_permalink(); ?>" class="col-md-4 ">
          <article class="feature-column blog-column<?php if(empty($backgroundImage)): echo '--both'; endif;  ?>">
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
                <h6><?php $category = get_the_category(); echo $category[0]->name; ?></h6>
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

<?php endwhile; // end of the loop. ?>

<?php 
        get_template_part( 'page-templates/blocks/pre-footer-cta' );
        get_footer(); 
      ?>
