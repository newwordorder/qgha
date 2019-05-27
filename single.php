<?php
/**
 * The template for displaying all single posts.
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
	<div class="row justify-content-center">
		<div class="col-md-8 text-center page-header__content">
		<h1><?php the_title(); ?></h1>
		</div>
	</div>
	</div>

<?php get_template_part( 'page-templates/blocks/overlap' ); ?>

</section>

<section id="single-wrapper" class="space--md bg--light">

	<div class="container" id="content" tabindex="-1">

			<main id="main">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <?php the_content(); ?>
            </div>
          </div>

          <?php  // check if the flexible content field has rows of data
          if( have_rows('posts_blocks') ):

            // loop through the rows of data
            while ( have_rows('posts_blocks') ) : the_row();

            if( get_row_layout() == 'text_block' ): ?>
<!-- text -->
            <div class="row justify-content-center my-5">
              <div class="col-md-8">

                <?php the_sub_field('text_block'); ?>

              </div>
            </div>

          <?php  endif;

          if( get_row_layout() == 'image_block' ): ?>
<!-- image -->
          <div class="row justify-content-center my-5"> 
            <div class="col-md-10">
            <?php
							$image = get_sub_field('image');
            if( !empty($image) ):

            // vars
            $url = $image['url'];
            $alt = $image['alt'];

            ?>
              <img class="rounded" data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
            <?php endif; ?>

            </div>
          </div>

          <?php endif; 
          if( get_row_layout() == 'video_block' ): ?>
<!-- video -->
          <div class="row justify-content-center my-5"> 
            <div class="col-md-10">
            <?php $video = get_sub_field('video_embed_code'); ?>
            <div class="embed-container rounded">
              <?php echo $video ?>
              </div>
            </div>
          </div>
          <?php endif; 
          if( get_row_layout() == 'gallery_block' ): ?>
          <!-- video -->
            <div class="row justify-content-center my-5"> 
            <div class="col-md-10">
					  <?php 
				endif;
			endwhile;

          endif;

          ?>
      </main><!-- #main -->

</div><!-- Container end -->

</section><!-- Wrapper end -->

<section class="related-posts  pb-5">
  <div class="container">
    <div class="row pt-5 pb-2">
      <div class="col text-center">
        <h2>Related articles</h2>
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
		foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>
			<a href="<?php the_permalink(); ?>" class="col-md-4 feature-column">
				<article class="">
						<?php
						$backgroundImage = get_field('background_image');

						if( !empty($backgroundImage) ):
						// vars
						$url = $backgroundImage['url'];
						$alt = $backgroundImage['alt'];
						$size = '600x400';
						$thumb = $backgroundImage['sizes'][ $size ];
						$width = $backgroundImage['sizes'][ $size . '-width' ];
						$height = $backgroundImage['sizes'][ $size . '-height' ];

						?>
							<img class="feature-column__image" data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
						<?php endif; ?>
							<h6><?php $category = get_the_category(); echo $category[0]->name; ?></h6>
							<p class="lead"><?php the_title(); ?></p>
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
