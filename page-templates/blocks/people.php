<?php // people
if( get_row_layout() == 'people' ):

  $modalID = ($GLOBALS['blockCount'] . $GLOBALS['sectionCount'] . $buttonCount);
  $peopleCount = 0;

?>

  <?php $posts = get_sub_field('people_relationship'); ?>
    <div class="container space-below--<?php echo $spaceBelow; ?>">
      <div class="row" style="position:relative;">
          <?php if( $posts ): ?>
            <?php foreach( $posts as $post ):  $peopleCount++ // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
              <div class="people__container  col-lg-4 ">
              <div class="people__row people" data-micromodal-trigger="modal-<?php echo $modalID ?>-<?php echo $peopleCount ?>">
                <div class="col-4">
                  <?php $image = get_field('image'); ?>
                    <div class="people__image background-image-holder">
                      <?php if($image){ echo "<img data-src='{$image['url']}' />";}?>
                    </div>
                </div>
                <div class="col-8">
                  <p class="people__name"><?php the_title(); ?></p>
                  <p class="people__title small"><?php the_field('title'); ?></p>
                </div>
                </div>
                
            </div>


  <div class="modal micromodal-slide" id="modal-<?php echo $modalID ?>-<?php echo $peopleCount ?>" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container bg--white" role="dialog" aria-modal="true" aria-labelledby="modal-<?php echo $modalID ?>-<?php echo $peopleCount ?>-title">
          
          <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
        <main class="modal__content" id="modal-<?php echo $modalID ?>-<?php echo $peopleCount ?>-content">
        <div class="row">
                <div class="col-sm-3">
                  <?php $image = get_field('image'); ?>
                  <div class="people__image">
                    <div class=" background-image-holder">
                      <?php if($image){ echo "<img data-src='{$image['url']}' />";}?>
                    </div>
                  </div>
                </div>
                <div class="col-sm-9">
                  <h4><?php the_title(); ?></h4>
                  <p class="people__title"><?php the_field('title'); ?></p>
                  <p class="people__bio"><?php the_field('bio'); ?></p>
                </div>
                </div>
        </main>
        
      </div>
    </div>
  </div>
        <?php endforeach; ?>
        </div>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
      <?php endif; ?>
    </div>
<?php endif; ?>
