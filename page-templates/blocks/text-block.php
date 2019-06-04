<?php // TEXT BLOCK

if( get_row_layout() == 'text_block' ):

  $textBlock = get_sub_field('text_block_text_block');
  $spaceBelow = get_sub_field('text_block_space_below');

  ?>

<div class="container space-below--<?php echo $spaceBelow ?>">
  <div class="row">
    <div class="col-md-8">
      <div class="lineboy">
        <?php echo $textBlock ?>
      </div>
    </div>
  </div>
</div>

<?php endif; ?>
