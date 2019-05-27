<?php 
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('footer-social',__( 'Footer Social' ));

}

add_action( 'init', 'register_my_menu' );

?>