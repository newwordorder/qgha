<?php // GALLERY

if( get_row_layout() == 'gallery' ):

  $arrows = get_sub_field('navigation_arrows');
  $paging = get_sub_field('navigation_dots');
  $width = get_sub_field('width');
  $spaceBelow = get_sub_field('space_below');


?>

<?php if( $width == 'contained' ): ?>

<div class="container space-below--<?php echo $spaceBelow ?>">
  <div class="row justify-content-center">
    <div class="col-md-12">
    <?php endif; ?>
    <?php 

      $images = get_sub_field('gallery');
      $size = 'large'; // (thumbnail, medium, large, full or custom size)

      if( $images ): ?>
        <!-- Slider main container -->
        <div class="swiper-container gallery">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper align-items-center">

            <?php foreach( $images as $image ): ?>
              <div class="swiper-slide image image--landscape rounded">
                  <div class="background-image-holder">
                      <img data-src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                  </div> 
                </div>
            <?php endforeach; ?>
    
          </div>
            
            <!-- If we need navigation buttons -->
            <div class="prev"><i class="fal fa-arrow-left"></i></div>
	          <div class="next"><i class="fal fa-arrow-right"></i></div>
        </div>

      <?php endif; ?>
      <?php if($width == 'full'): ?>
    </div>
  </div>
</div>

<?php endif; ?>

<?php endif; // end carousel block ?>
