<?php // Events

if( get_row_layout() == 'events' ):

  $includePosts = get_sub_field('include_posts');
  $posts = get_sub_field('select_posts');

?>

<?php if( $includePosts == 'latest' ): ?>
  <div class="container">
    
        
    <div class="row">
      <?php
            // the query
            $the_query = new WP_Query( array(
                'post_type' => 'events',
                'posts_per_page' => 3,
            ));
          ?>
        <?php if ( $the_query->have_posts() ) : ?>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post();  $backgroundImage = get_field('background_image');?>
          <a href="<?php the_permalink(); ?>" class="col-md-4 feature-column ">
          <article class=" feature-column blog-column<?php if(empty($backgroundImage)): echo '--both'; endif;  ?>">
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
        <?php endwhile;
            // reset post data
            wp_reset_postdata();
        ?>
      <?php endif; ?>
    </div>
  </div> 
  
<?php else: ?>

  <div class="container">
    <div class="row">
      <div class="col-md-12" style="    display: flex;
      justify-content: flex-end;
      flex-direction: row;
      align-items: center;
      justify-content:space-between;
      margin-bottom:1rem;">
            <h3>Latest Events</h3>

        <a class="btn btn--solid" href="<?php echo get_home_url(); ?>/events">All Events</a>
      </div>
    </div>
  <div class="row" style="position:relative;">
    <?php
            // the query
            $the_query = new WP_Query( array(
                'posts_per_page' => 1,
            ));
          ?>
        <?php if ( $the_query->have_posts() ) : ?>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <article class="col-sm-6 col-md-4 blog-tile">

            <a href="<?php the_permalink(); ?>" class="">
              <div class="blog-tile__thumb ">
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
                  <div class="background-image-holder ">
                    <img class="" data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                  </div>
                <?php endif; ?>
                <div class="text">
                  <h6><?php $category = get_the_category(); echo $category[0]->name; ?></h6>
                  <p class="lead"><?php the_title(); ?></p>
                </div>
              </div>

            </a>
          </article>

        <?php endwhile;

            // reset post data
            wp_reset_postdata();

        ?>
      <?php endif; ?>
        
  <div class="col-md-6 offset-md-6 mob-nopad">
    <div class="row">
      <?php
            // the query
            $the_query = new WP_Query( array(
                'posts_per_page' => 3,
            ));
          ?>
        <?php if ( $the_query->have_posts() ) : ?>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="row blog-tile--small">
          <article class="col-md-6 img">
              <div class="blog-tile__thumb ">
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
                  <div class="background-image-holder ">
                    <img class="" data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                  </div>
                <?php endif; ?>
              </div>
                
                </article>
                <div class="col-md-6">
                  <div class="text">
                    <h6><?php $category = get_the_category(); echo $category[0]->name; ?></h6>
                    <p class="lead"><?php the_title(); ?></p>
                  </div>
                </div>
              </a>

        <?php endwhile;

            // reset post data
            wp_reset_postdata();

        ?>
      <?php endif; ?>
    </div>
  </div>
      </div>
  </div> 

 <?php endif; ?>


<?php endif; // end blog posts block ?>