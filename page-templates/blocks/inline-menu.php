<?php // INLINE MENU

if( get_row_layout() == 'inline_menu' ):
    $inline_menu = get_sub_field('inline_menu_menu')
  ?>
    <div class="container">
        <div class="row">
            <ul class="inline-menu">
                <?php while( have_rows('inline_menu_menu') ): the_row(); ?>
                    <?php $menuText = get_sub_field('text'); $link = get_sub_field('id'); ?>
                    <li><a href="<?php echo "#{$link}"; ?>"><?php echo $menuText; ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>

<?php endif; ?>
