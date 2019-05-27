<?php // SETUP UP FOR EACH BLOCK REPEATER FIELD

$blockSetup = get_sub_field('block_setup');

  $space = $blockSetup['space'];
  $id = $blockSetup['block_id'];
  $background = $blockSetup['block_background'];
  $flipLayout = $blockSetup['flip_layout'];

$backgroundImage = $blockSetup['background_image'];

  $image = $backgroundImage['background_image'];
  $imageOverlay = $backgroundImage['image_overlay'];
  $backgroundEffect = $backgroundImage['background_effect'];
  $invertColours = $backgroundImage['invert_colours'];

$colorboy = $blockSetup['colorboy'];
  if($colorboy){
    $colorboyColor = $blockSetup['colorboy_color'];
  }

?>


<section id="<?php echo $id ?>"

  class="bg--<?php echo $background ?> space--<?php echo $space ?> bg-effect--<?php echo $backgroundEffect ?> <?php if( $background == 'image' ): echo 'imagebg'; endif; ?> <?php if( $invertColours == 'yes' ): echo 'image--light'; endif; ?><?php if( $colorboy == 'yes'): echo ' colorboy '; endif; ?>" <?php if( $colorboy == 'yes'): echo 'data-colorboy="' . $colorboyColor . '"' ; endif; ?>
  <?php if( $background == 'image' && $imageOverlay != 0 ): ?>
    data-overlay="<?php echo $imageOverlay ?>"
  <?php endif; ?>
>
<?php if( $background == 'image' ):?>

  <?php

  if( !empty($image) ):

  	// vars
  	$url = $image['url'];
  	$alt = $image['alt'];

   ?>
  <div class="background-image-holder">
  		<img data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
  </div>
  <?php endif; ?>




<?php endif; ?>
