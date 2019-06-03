<?php // WHITE COLUMNS

if( get_row_layout() == 'white_columns' ):
  $spaceBelow = get_sub_field('white_columns_space_below');
  $columns = get_sub_field('white_columns_columns_per_row');
?>
  <?php if( have_rows('white_columns_column') ): ?>
    <div class="container space-below--<?php echo $spaceBelow ?>">
      <div class="row">
        <?php while( have_rows('white_columns_column') ): the_row(); $text = get_sub_field('text'); ?>
          <div class="col-md-<?php echo $columns; ?> feature-column">
            <div style="background-color:#fff; width:100%; height:100%; padding: 0.5rem 2rem;">
              <?php echo $text ?>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  <?php endif; ?>
<?php endif; ?>
