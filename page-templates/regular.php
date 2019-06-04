<?php
/**
* Template Name: regular
 *
 * @package understrap
 */

get_header();
$backgroundImage = get_field('background_image');

$image = $backgroundImage['background_image'];
$imageOverlay = $backgroundImage['image_overlay'];
$backgroundEffect = $backgroundImage['background_effect'];
$invertColours = $backgroundImage['invert_colours'];
$headerText = get_field('header_text');
?>
<?php while ( have_posts() ) : the_post(); ?>
<section id="sub-header"

class="page-header page-header--page bg--light bg-effect--<?php echo $backgroundEffect ?> imagebg"
data-overlay="<?php echo $imageOverlay; ?>"
>

  <?php if( !empty($image) ):

    // vars
    $url = $image['url'];
    $alt = $image['alt'];

  ?>
    <div class="background-image-holder">
      <img data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
    </div>
  <?php endif; ?>

<div class="container">
  <div class="row">
    <div class="col-md-6 page-header__content">
    <?php if($headerText): ?>
      <h1 class="page-title"><?php echo $headerText; ?></h1>
    <? else: ?>
      <h1 class="page-title"><?php the_title(); ?></h1>
    <?php endif; ?>
    <?php if($headerSubText): ?>
      <p class="lead"><?php echo $headerSubText; ?></h1>
    <?php endif; ?>
    </div>
  </div>
</div>

</section>


<?php get_template_part( 'page-templates/blocks' );?>


<?php endwhile; // end of the loop. ?>
<?php get_template_part( 'page-templates/blocks/pre-footer-cta' ); ?>

<?php 
        get_footer(); 
      ?>
