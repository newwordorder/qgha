<?php // VIDEO BLOCK

if( get_row_layout() == 'video' ):

  $type = get_sub_field('video_type');
  $videoCoverImage = get_sub_field('video_cover_image');
  $videoEmbedCode = get_sub_field('video_embed_code');
  $text = get_sub_field('text');
  $width = get_sub_field('width');
  $spaceBelow = get_sub_field('space_below');

  ?>


    <?php if( $width == 'full' ): ?>

    <div class="embed-container">
          <?php echo $videoEmbedCode; ?>
        </div>


    <?php else: // end full ?>


      <div class="container space-below--<?php echo $spaceBelow ?>">
        <div class="row justify-content-center">
          <div class="col-md-12">


          <div class="embed-container rounded">
                <?php echo $videoEmbedCode; ?>
              </div>

          </div>
        </div>
      </div>
    <?php endif; // end $width ?>
 
<?php endif; // end video ?>
