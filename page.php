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

<?php if( !empty($image) ):

// vars
$url = $image['url'];
$alt = $image['alt'];

?>

<section id="sub-header"

class="page-header page-header--page bg-effect--<?php echo $backgroundEffect ?> imagebg"
data-overlay="<?php echo $imageOverlay; ?>"
>

  
    <div class="background-image-holder">
      <img data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
    </div>
<?php else: ?>

<section id="sub-header"

class="page-header page-header--page bg--light"
>

  <?php endif; ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 page-header__content text-align-center">
    <?php if($headerText): ?>
      <?php echo $headerText; ?>
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
