<?php // FEATURE TILES

if( get_row_layout() == 'feature_tiles' ):

  $spaceBelow = get_sub_field('feature_tiles_space_below');
  $type = get_sub_field('feature_tiles_type');
  $columns = get_sub_field('feature_tiles_columns_per_row');

?>


  <?php if( have_rows('feature_tiles_column') ): ?>
    <div class="container space-below--<?php echo $spaceBelow ?>">
      <div class="row justify-content-center">
        <?php while( have_rows('feature_tiles_column') ): the_row();

          $text = get_sub_field('text_block');
          $image = get_sub_field('background_image');
          $link = get_sub_field('link');

        ?>

        <div class="col-md-<?php echo $columns; ?> ">
          <a href="<?php echo $link ?>">
            <div class="feature-tile rounded feature-tile--<?php echo $type ?> hover-element" data-overlay="3">
                <div class="hover-element__initial">
                  <?php
                  $image = get_sub_field('background_image');

                  if( !empty($image) ):

                    // vars
                    $url = $image['url'];
                    $alt = $image['alt'];

                    ?>
                    <div class="background-image-holder" >
                      <img data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                    </div>
                  <?php endif; ?>
                </div>
                
                  <div class="hover-element__reveal" data-overlay="8"></div>
                  <div class="feature-tile__content">
                    <div class="chevron-container">
                      <?php echo $text ?>
                      <i class="far fa-chevron-right"></i>
                    </div>
                  </div>
              </div>
            </a>






            </div>
        <?php endwhile; ?>
      </div>
    </div>
  <?php endif; ?>

<?php endif; ?>
