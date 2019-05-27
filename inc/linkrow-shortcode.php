<?php 
/* FAQ */
    function linkrow_shortcode( $atts , $content = null ) {
        extract ( shortcode_atts(
            array(
                'class'   => '',
                'type'    => '',
                'link' => '',
                'id'      => '' 
            ),
            $atts )
        );
            $title = do_shortcode($content);
            $out = "
                        <a class='linkrow' href='{$link}'>
                            <p class='linkrow-title'>
                            {$title}
                            </p>
                            <i class='far fa-chevron-right'></i>
                        </a>
                    ";
         return $out;
    }

    add_shortcode( 'linkrow', 'linkrow_shortcode' );