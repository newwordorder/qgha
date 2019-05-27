<?php if( get_sub_field('include_buttons') == 'yes' ): ?>

  <?php if( have_rows('buttons') ): $buttonCount = 0; ?>
  <div class="buttons">
    <?php while( have_rows('buttons') ): the_row(); $buttonCount++;
      $buttonText = get_sub_field('button_text');
      $linkType = get_sub_field('link_type');
      $url = get_sub_field('url');
      $pageUrl = get_sub_field('page_url');
      $buttonStyle = get_sub_field('button_style');
      $modalContent = get_sub_field('modal_content');
      $modalID = ($GLOBALS['blockCount'] . $GLOBALS['sectionCount'] . $buttonCount);
      ?>

      <a href="<?php if( $linkType == 'url' ): echo $url; endif;?>
        <?php if( $linkType == 'page' ): echo $pageUrl; endif; ?>
        <?php if( $linkType == 'modal' ):?>#<?php endif; ?>" 
        class="btn btn--<?php echo $buttonStyle ?> "
        <?php if( $linkType == 'modal' ):?>data-toggle="modal" 
        data-target="#<?php echo $modalID ?>"<?php endif; ?> >
        <?php echo $buttonText ?> 
      </a>
      <?php if( $linkType == 'modal' ):?>
      <div class="modal-container" data-modal-index="1">
        <div class="modal-content">
          <?php echo $modalContent ?>
        </div>
      </div>
      <div class="modal fade" id="<?php echo $modalID ?>" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body p-5">
              <?php echo $modalContent ?>
						</div>
					</div>
				</div>
			</div>
      <?php endif; ?>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>
<?php endif; ?>
