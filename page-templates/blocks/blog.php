<?php // BLOG POSTS

if( get_row_layout() == 'blog_posts' ):

  $includePosts = get_sub_field('include_posts');
  $posts = get_sub_field('select_posts');

?>

<?php if( $includePosts == 'latest' ): ?>
  <div class="container">

    <div class="row">
      <?php
          $postCategory = get_sub_field('category');
          if($postCategory){
            $the_query = new WP_Query( array(
              'posts_per_page' => 3,
              'category_name' => $postCategory
          ));

          }else{
            // the query
            $the_query = new WP_Query( array(
                'posts_per_page' => 3,
            ));
          }
          ?>
        <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
					    $backgroundImage = get_field('background_image');
					?>
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
                    <div class="feature-column__image image--landscape" style="position: relative;">
                      <div class="background-image-holder rounded">
                        <img data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>">
                      </div>
                    </div>
								<?php endif; ?>
								<div class="blog-column__text">
                    <h6><?php $category = get_the_category();  if($category[0]->name != 'Uncategorized'): echo $category[0]->name; endif;?></h6>
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
    
  <div class="row" style="position:relative;">
    <?php
            // the query
            $the_query = new WP_Query( array(
                'posts_per_page' => 1,
            ));
          ?>
        <?php if ( $the_query->have_posts() ) : ?>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <article class="col-sm-6 col-md-4 text-center blog-tile">

            <a href="<?php the_permalink(); ?>" class="">
              <div class="blog-tile__thumb image--landscape" data-scrim="0">
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
                <h6><?php $category = get_the_category(); if($category[0]->name != 'Uncategorized'): echo $category[0]->name; endif;?></h6>
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
        
  <div class="col-md-6 offset-md-6">
    <div class="row">
      <?php
            // the query
            $the_query = new WP_Query( array(
                'posts_per_page' => 2,
            ));
          ?>
        <?php if ( $the_query->have_posts() ) : ?>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="blog-tile--small">
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
                  <h6><?php $category = get_the_category(); if($category[0]->name != 'Uncategorized'): echo $category[0]->name; endif;?></h6>
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