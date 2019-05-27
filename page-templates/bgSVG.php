<svg id="Layer_1" class="scene" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1016.06 798.29" height="100%" preserveAspectRatio="xMaxYMax slice">
    <defs> 
        <mask id="mask" x="-423.94" y="0.17" width="1440" height="797.29" maskUnits="userSpaceOnUse">
            <g transform="translate(0.06 0.45)">
                <g id="mask-2">
                    <rect id="path-1" class="cls-1" x="-424" y="0.45" width="1440" height="796"/>
                </g>
            </g>
        </mask>

                <linearGradient id="gradient" x1="108.36" y1="698.9" x2="108.54" y2="698.47" gradientTransform="matrix(1152.2, -419.37, -337.12, -926.22, 111095.76, 693012.7)" gradientUnits="userSpaceOnUse">
                    <stop id="stop-1" offset="0"  <?php 
                    if( have_rows('slides') ): 
                        $count = 1; 
                        while ( have_rows('slides') ) : the_row();
                         $color1 = get_sub_field('svg_color_1'); 
                         $color2 = get_sub_field('svg_color_2'); 
                            if($count == 1){
                                echo "stop-color={$color1} ";
                            }
                            echo "data-color-{$count}={$color1} ";
                            $count++;
                        endwhile; 
                    endif;
                    ?>
                    />
                    <stop id="stop-2" offset="1"  <?php 
                    if( have_rows('slides') ): 
                        $count = 1; 
                        while ( have_rows('slides') ) : the_row();
                         $color2 = get_sub_field('svg_color_2'); 
                            if($count == 1){
                                echo "stop-color={$color2} ";
                            }
                            echo "data-color-{$count}={$color2} ";
                            $count++;
                        endwhile; 
                    endif;
                    ?>
                    />
                </linearGradient>      
        <mask id="mask-2-2" x="-423.94" y="0" width="1440" height="797.2" maskUnits="userSpaceOnUse">
            <g transform="translate(0.06 0.45)">
                <g id="mask-2-3" data-name="mask-2">
                    <rect id="path-1-2" data-name="path-1" class="cls-1" x="-424" y="0.45" width="1440" height="796"/>
                </g>
            </g>
        </mask>
        <mask id="mask-3" x="-423.94" y="0.15" width="1440" height="798.13" maskUnits="userSpaceOnUse">
            <g transform="translate(0.06 0.45)">
                <g id="mask-2-4" data-name="mask-2">
                    <rect id="path-1-3" data-name="path-1" class="cls-1" x="-424" y="0.45" width="1440" height="796"/>
                </g>
            </g>
        </mask>
    </defs>
    <title>Group</title>
    <g id="Page-1">
        <g id="Group">
            <g class="cls-2">
                <path id="Fill-1-Copy-3" class="use-grad-1" d="M0,797c28.44-23.92,303-186,389-396C422,323,442,140,324.61.2Q590.11,0,1015.06.9l1,796.55Q218.48,797.45,0,797Z" pathdata:id="M0,797c28.44-23.92,382-204,430-396C479,248,442,140,324.61.2Q590.11,0,1015.06.9l1,796.55Q218.48,797.45,0,797Z" transform="translate(0.06 0.45)"/>
            </g>
            <g class="cls-4">
                <path id="Fill-1-Copy-2" class="cls-5" d="M1015.06.9V797q-719,.45-862.1-.1C236,754,585,524,635,417,713,272,683,67,598,0,704.59,0,899,.3,1015.06.9Z" pathdata:id="M1015.06.9V797q-719,.45-862.1-.1C236,754,585,524,655,437,743,292,683,67,598,0,704.59,0,899,.3,1015.06.9Z" transform="translate(0.06 0.45)"/>
            </g>
            <g class="cls-6">
                <path id="Fill-1-Copy" class="cls-5" d="M564.06,798.29C552.06,798.36,811,688,888,499,951,347,924,66,755,1,783.7.55,921,0,1015.06.9v796C737.29,795.51,788.76,796.9,564.06,798.29Z" pathdata:id="M564.06,798.29C552.06,798.36,812,717,882,477,923,314,919,142,755,1,783.7.55,921,0,1015.06.9v796C737.29,795.51,788.76,796.9,564.06,798.29Z" transform="translate(0.06 0.45)"/>
            </g>
        </g>
    </g>
</svg>