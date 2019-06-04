<?php // IMAGE BLOCK

if( get_row_layout() == 'image' ):

  $image = get_sub_field('image');
  $width = get_sub_field('width');
  $spaceBelow = get_sub_field('space_below');

  ?>

<?php if( $width == 'full' ): ?>

  <?php

  if( !empty($image) ):

    // vars
    $url = $image['url'];
    $alt = $image['alt'];

   ?>
  <div class="zoom__container">
    <img class="zoom__img" data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
  </div>
  <?php endif; ?>

<?php else: ?>


<div class="container space-below--<?php echo $spaceBelow ?>">
  <div class="row justify-content-center">
    <div class="col-md-<?php echo $width; ?>">

      <?php

      if( !empty($image) ):

        // vars
        $url = $image['url'];
        $alt = $image['alt'];

       ?>
        <div class="zoom__container">
        <img class="zoom__img rounded" data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
        </div>
      <?php endif; ?>

    </div>
  </div>
</div>

<?php endif; // type ?>

<?php endif;

?>
