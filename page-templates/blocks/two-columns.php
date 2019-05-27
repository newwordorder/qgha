<?php // TWO COLUMNS

if( get_row_layout() == 'two_columns' ):

  $column_1 = get_sub_field('two_columns_column_1');
  $column_1_width = get_sub_field('two_columns_column_1_width');
  $column_1_offset = get_sub_field('two_columns_column_1_offset');

  $column_2 = get_sub_field('two_columns_column_2');
  $column_2_width = get_sub_field('two_columns_column_2_width');
  $column_2_offset = get_sub_field('two_columns_column_2_offset');

  $spaceBelow = get_sub_field('text_block_space_below');

  ?>

<div class="container space-below--<?php echo $spaceBelow ?>">
  <div class="row">
    <div class="col-md-<?php echo $column_1_width; ?> <?php if($column_1_offset): echo "offset-md-{$column_1_offset}"; endif; ?>">
      <div class="lineboy">
        <?php echo $column_1 ?>
      </div>
    </div>
    <div class="col-md-<?php echo $column_2_width; ?> <?php if($column_2_offset): echo "offset-md-{$column_2_offset}"; endif; ?>">
      <div class="lineboy">
        <?php echo $column_2 ?>
      </div>
    </div>
  </div>
</div>

<?php endif; ?>
