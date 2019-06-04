<?php
/**
* Template Name: Page
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
$backgroundEffect = $backgroundImage['background_effect'];
$headerText = get_field('header_text');

$slides = get_field('slides');
?>
<section id="sub-header" class="page-header page-header--page  bg--light bg-effect--<?php echo $backgroundEffect ?>">
  <div class="svg-container">
    <?php get_template_part('page-templates/bgSVG'); ?>
  </div>

  <div class="container homepage-slider">
     <?php if( have_rows('slides') ):
      // loop through the rows of data
        $count = 1;
      while ( have_rows('slides') ) : the_row();
        // display a sub field value
        the_sub_field('sub_field_name');
        $text = get_sub_field('headline_text');
        $slideimage = get_sub_field('image');
        ?>
        <div class="row slide slide--<?php echo $count; ?> <?php if($count == 1): echo 'active'; endif; ?>">
          <div class="col-md-7 page-header__content">
              <h1 class="page-title"><?php echo $text; ?></h1>
          </div>
          <div class="col-md-5">
            <div class="image-container">
              <img class="img" data-src="<?php echo $slideimage['url']; ?>"/>
            </div>
          </div>
        </div>
        <?php
          $count++;
       endwhile;
       ?>
       <div class="slider-controls">
          <div class="left">
            <i class="fal fa-arrow-left"></i>
          </div> 
          <div class="right">
            <i class="fal fa-arrow-right"></i>
          </div> 
        </div>
       <?php endif; ?>
  </div>

</section>
  
<main id="main" >
  <div class="angled" ></div>
  <?php get_template_part( 'page-templates/blocks' );?>
</main>

<?php get_template_part( 'page-templates/blocks/pre-footer-cta' ); ?>
<?php get_footer();
