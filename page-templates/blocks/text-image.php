<?php // TEXT & IMAGE BLOCK

  if( get_row_layout() == 'text_image' ):
    $media = get_sub_field('media');
    $text = get_sub_field('text_block');
    $image = get_sub_field('image');
    $imageFormat = get_sub_field('image_format');
    $videoEmbedCode = get_sub_field('video_embed_code');
    $videoCoverImage = get_sub_field('video_cover_image');
    $layout = get_sub_field('layout');
    $flipLayout = get_sub_field('flip_layout');
    $spaceBelow = get_sub_field('space_below');
?>
  <div class="container space-below--<?php echo $spaceBelow ?>">
      <div class="row justify-content-between flippable <?php if( $flipLayout == 'yes' ): echo 'flippable--flip'; endif; ?>">
          <div class=" flippable__text v-center <?php if( $layout == '1/3' ): echo 'col-md-7'; endif; ?> <?php if( $layout == '1/2' ): echo 'col-md-5'; endif; ?> <?php if( $layout == '2/3' ): echo 'col-md-3'; endif; ?> <?php if( $flipLayout == TRUE ): echo 'offset-md-1'; endif; ?>">
            <div class="lineboy">    
              <?php echo $text ?>
              <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>
            </div>
          </div>
          <div class="flippable__image  <?php if( $layout == '1/3' ): echo 'col-md-4'; endif; ?> <?php if( $layout == '1/2' ): echo 'col-md-6'; endif; ?> <?php if( $layout == '2/3' ): echo 'col-md-8'; endif; ?> <?php if( $flipLayout == FALSE ): echo 'offset-md-1'; endif; ?>">
            <?php if( $media == 'image' ): ?>
              <?php if( !empty($image) ):
                // vars
                $url = $image['url'];
                $alt = $image['alt'];
               ?>
                <?php if( $imageFormat == 'square' ): ?>
                <div class="image image--square rounded zoom__container">
                  <div class="background-image-holder zoom__img">
                      <img data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                  </div> 
                </div>
               <?php endif; //end square ?>
               <?php if( $imageFormat == 'landscape' ): ?>
                <div class="image image--landscape rounded zoom__container">
                  <div class="background-image-holder zoom__img">
                      <img data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                  </div> 
                </div>
               <?php endif; //end landscape ?>
               <?php if( $imageFormat == 'portrait' ): ?>
                <div class="image image--portrait rounded">
                  <div class="background-image-holder">
                      <img data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                  </div> 
                </div>
               <?php endif; //end portrait ?>
               <?php if( $imageFormat == 'none' ): ?>
                <img class="rounded" data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
               <?php endif; //end none ?> 
              <?php endif; //end $image ?>
            <?php endif; //end $media ?>
            <?php if( $media == 'gallery' ): ?>
            <?php 
              $images = get_sub_field('gallery');
              $size = 'full';
              if( $images ): ?>
                <!-- Slider main container -->
                <div class="swiper-container gallery">
                  <!-- Additional required wrapper -->
                  
                  <div class="swiper-wrapper align-items-center">

                    <?php foreach( $images as $image ): ?>
                    
                      <img class="swiper-slide mb-0" data-src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <?php endforeach; ?>
            
                  </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="prev"><i class="fal fa-arrow-left"></i></div>
	                  <div class="next"><i class="fal fa-arrow-right"></i></div>
                </div>
   
            <?php endif; ?>

            <?php endif; //end $media ?>

            <?php if( $media == 'video' ): ?>

                <div class="embed-container rounded">
              	   <?php echo $videoEmbedCode; ?>
                </div>

            <?php endif; //end $media ?>
          </div>
      </div>
    </div>

<?php endif; //end text_image row

?>
