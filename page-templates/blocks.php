<?php

// check if the repeater field has rows of data
if( have_rows('blocks') ) { $blockCount = 0;

  // loop through the rows of data
  while ( have_rows('blocks') ) { the_row(); $blockCount++;

    // Setup <section> for each content block
    get_template_part( 'page-templates/blocks/block-setup' );

    // check if the flexible content field has rows of data
    if( have_rows('section') ) { $sectionCount = 0;

      // loop through the rows of data
      while ( have_rows('section') ) { the_row(); $sectionCount++;

         get_template_part( 'page-templates/blocks/text-block' );
         get_template_part( 'page-templates/blocks/50-50' );
         get_template_part( 'page-templates/blocks/text-image' );
         get_template_part( 'page-templates/blocks/cta' );
         get_template_part( 'page-templates/blocks/image' );
         get_template_part( 'page-templates/blocks/video' );
         get_template_part( 'page-templates/blocks/feature-columns' );
         get_template_part( 'page-templates/blocks/feature-tiles' );
         get_template_part( 'page-templates/blocks/line-break' );
         get_template_part( 'page-templates/blocks/projects' );
         get_template_part( 'page-templates/blocks/blog' );
         get_template_part( 'page-templates/blocks/text-text' );
         get_template_part( 'page-templates/blocks/team' );
         get_template_part( 'page-templates/blocks/timeline' );
         get_template_part( 'page-templates/blocks/gallery' );
         get_template_part( 'page-templates/blocks/tabs' );
         get_template_part( 'page-templates/blocks/two-columns' );
         get_template_part( 'page-templates/blocks/inline-menu' );
         get_template_part( 'page-templates/blocks/people' );
         get_template_part( 'page-templates/blocks/events' );
         get_template_part( 'page-templates/blocks/white-columns' );

         $GLOBALS['blockCount'] = $blockCount;
         $GLOBALS['sectionCount'] = $sectionCount;

      }

    }

    echo '</section>'; // Opened in block-setup.php

  }
}



?>


