<?php

/*
*  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
*  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
*  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
*/

if( get_row_layout() == 'team' ):

    $post_objects = get_sub_field('team');
    ?>
    <?php

    if( $post_objects ): ?>
        <div class="container">
            <div class="row">
    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <a href="<?php the_permalink(); ?>" class="col-md-3">
        <div >
            <div class="team__portrait">
                <div class="background-image-holder">
                    <img data-src="<?php $image = get_field('portrait_photo'); echo $image['url'] ?>" />
                </div>
            </div>
            <div class="team__blurb">
           <h5><?php the_title(); ?></h5>
            <h6 class="team__position"><?php the_field('position'); ?></h6>
            </div>
        </div>
    </a>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
    </div>
</div>
<?php endif;
endif; ?>