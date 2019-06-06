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
      <div class="col-md-4 col-lg-4">
          <?php echo $prefooterText; ?>
      </div>
      <div class="col-md-7 offset-md-1">
      <div class="pre-footer-image">
        <img data-src="<?php echo $image['url']; ?>" />
      </div>
      </div>
    </div>
  </div>
</section>