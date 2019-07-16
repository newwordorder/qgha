<?php 
  $prefooterText = get_field('text', 'prefooter-cta');
  $image = get_field('image','prefooter-cta');
  $backgroundImage = get_field('background_image','prefooter-cta');

?>
<section id="pre-footer" class="footer-cta">
  <div class="background-image-holder">
    <img data-src="<?php echo $backgroundImage['url']; ?>" />
  </div>
  <div class="container footer-cta__content">
    <div class="row align-items-center ">
      <div class="col-md-8 col-lg-8">
          <?php echo $prefooterText; ?>
      </div>
    </div>
  </div>
</section>