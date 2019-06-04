<?php // TABS

if( get_row_layout() == 'tabs' ):

?>

  <?php 
  if( have_rows('tabs') ): ?>


  <?php $counter = 0;?>
<div class="container">
  <div class="tabs-container">
          <ul class="tab-buttons">
          <?php	// loop through the rows of data
        while ( have_rows('tabs') ) : the_row();

        $title = get_sub_field('title');

        ?>
            <li class="tab-item">
              <span class="tab-link" onclick="openTab(event, '<?php echo $counter ?>')"
                ><?php  echo $title ?></span
              >
            </li>
            
            <?php $counter++; // add one per row ? ?>
      <?php  endwhile; ?>
          </ul>
        </div>
</div>

<?php else :

  // no rows found

endif;

?>

<?php

// check if the repeater field has rows of data
if( have_rows('tabs') ):


  ?>


<?php $counter = 0;?>

      <?php	// loop through the rows of data
      while ( have_rows('tabs') ) : the_row();

      $title = get_sub_field('title'); ?>

        <div class="tab-content" id="<?php echo $counter ?>">
            <?php get_template_part( 'page-templates/blocks' ); ?>
        </div>


      
      <?php $counter++; // add one per row ? ?>
    <?php  endwhile; ?>

    

<?php else :

// no rows found

endif;

?>

<script>
   var mybtn = document.getElementsByClassName("tab-link")[0];
  mybtn.click();
  </script>


<?php endif; ?>
