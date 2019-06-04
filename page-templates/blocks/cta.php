<?php // CTA BLOCK
    if( get_row_layout() == 'cta' ):
        $layout = get_sub_field('layout');
        $text = get_sub_field('text_block');
        $icon = get_sub_field('icon');
        $spaceBelow = get_sub_field('text_image_space_below');
?>
  <div class="container space-below--<?php echo $spaceBelow ?>">
      <div class="row align-items-center justify-content-center">
          <?php if( $layout == 'horizontal' ): ?>
          <?php
                if( !empty($icon) ):
                // vars
                $url = $icon['url'];
                $alt = $icon['alt'];
                ?>
                <div class="col-md-2">
                <img class="cta__icon" data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                </div>
            <div class="col-md-6 cta__text">
                <?php else: ?>
                <div class="col-md-8 cta__text">
            <?php endif; ?>
                <?php echo $text ?>
            </div>
            <div class="col-md-4 cta__buttons">
                <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>
            </div>
          <?php endif; // end horizontal ?>
          <?php if( $layout == 'vertical' ): ?>
            <div class="col-md-6 cta--vertical">
            <?php
                if( !empty($icon) ):
                // vars
                $url = $icon['url'];
                $alt = $icon['alt'];
                ?>
                <img class="cta__icon" data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                <?php endif; ?>
                <?php echo $text ?>
                <?php get_template_part( 'page-templates/blocks/block-partials/buttons' ); ?>
            </div>
          <?php endif; // end vertical ?>
      </div>
    </div>
<?php 
    endif;
?>
