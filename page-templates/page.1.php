<?php
/**
* Template Name: Page -- old
*
*
* @package understrap
*/

get_header();

$headerType = get_field('image_or_video');
$image = get_field('background_image');
$imageOverlay = get_field('image_overlay');
$backgroundImage = get_field('background_image');
$image = $backgroundImage['background_image'];
$imageOverlay = $backgroundImage['image_overlay'];
$imageOverlay = $backgroundImage['image_overlay'];
$backgroundEffect = $backgroundImage['background_effect'];
$headerText = get_field('header_text');


$slides = get_field('slides');

?>

<section id="sub-header" class="page-header page-header--page  bg--light bg-effect--<?php echo $backgroundEffect ?>">
  <div class="svg-container">
    <?php get_template_part('page-templates/bgSVG'); ?>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-7 page-header__content">
        <div class="lineboy">
          <?php if($headerText): ?>
            <?php echo $headerText; ?>
          <? else: ?>
          <h1 class="page-title"><?php the_title(); ?></h1>
        <?php endif; ?>
      </div>
      </div>
      <div class="col-md-5">
        <div class="image-container">
      <?php if($image): ?>
            <img class="img" data-src="<?php echo $image['url']; ?>"/>
            <?php endif; ?>
    </div>
    </div>
    </div>
  </div>

</section>
  
<main id="main">
  <?php get_template_part( 'page-templates/blocks' );?>

</main>
<?php get_footer();
