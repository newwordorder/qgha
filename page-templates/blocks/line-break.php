<?php // TEXT BLOCK

if( get_row_layout() == 'line_break' ):

  $spaceBelow = get_sub_field('space_below');

  ?>



<div class="container space-below--<?php echo $spaceBelow ?>">
  <div class="row justify-content-center">
    <div class="col-12">
      <hr>
    </div>
  </div>
</div>


<?php endif;

?>
