<?php 
/* FAQ */
    function accordian_shortcode( $atts , $content = null ) {
        extract ( shortcode_atts(
            array(
                'class'   => '',
                'type'    => '',
                'title' => '',
                'id'      => '' 
            ),
            $atts )
        );
            $inner = do_shortcode($content);
            $out = "<div>
                        <div class='accordian'>
                            <div class='accordian-heading'>
                            <p class='accordian-title'>
                            <i class='far fa-plus '></i>
                            {$title}
                                </p>
                            </div>
                            <div class='toggle collapse '>
                                <div class='accordian-body'>
                                    {$inner}
                                </div>
                            </div>
                        </div>
                    </div>";
         return $out;
    }

    add_shortcode( 'accordian', 'accordian_shortcode' );