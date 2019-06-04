<?php // people
if( get_row_layout() == 'people' ):?>

  <?php $posts = get_sub_field('people_relationship'); ?>
    <div class="container space-below--<?php echo $spaceBelow; ?>">
      <div class="row" style="position:relative;">
          <?php if( $posts ): ?>
            <?php foreach( $posts as $post ): // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
            <div class="col-lg-4 people__container">
              <div class="row people">
                <div class="col-4">
                  <?php $image = get_field('image'); ?>
                    <div class="people__image background-image-holder">
                      <?php if($image){ echo "<img data-src='{$image['url']}' />";}?>
                    </div>
                </div>
                <div class="col-8">
                  <p class="people__name"><?php the_title(); ?></p>
                  <p class="people__title"><?php the_field('title'); ?></p>
                  <p class="people__bio"><?php the_field('bio'); ?></p>
                </div>
                </div>
                <div class='corner-closer'>
                  <div class="btn btn--close"><i class="fas fa-times"></i></div>
                  </div>
            </div>
        <?php endforeach; ?>
        </div>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
      <?php endif; ?>
    </div>
<?php endif; ?>
