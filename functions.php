<?php
// Check PHP version
if (version_compare('7.4', phpversion(), '>')) {
  
  die('You must be using PHP 7.4 or greater.');

}

// Check WP Version
if (version_compare($GLOBALS['wp_version'], '5.4.2', '<=')) {

  die('WP theme only works in WordPress 5.4.2 or lower. Please upgrade your WP site.');

}

function include_styles() {
  
  // example of including an external link
   wp_enqueue_style(
     'google-fonts', // unique name
     'https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap'); // url to unqiue style 


  // example of including a style local to your theme root
  wp_enqueue_style(
    'idm250-css', // unique name 
    get_template_directory_uri() . '/dist/styles/main.css' // link to path of css
  );
}

function include_js_files() {

// includes js to footer
wp_enqueue_script(
  'idm250-js', 
  get_template_directory_uri() . '/dist/scripts/main.js',
  [], // dependencies
  false, // version number
  true // in footer
);

}

// when WP performs this action, call our function
add_action('wp_enqueue_scripts', 'include_styles', 'include_js_files');

// register the menus on my site
function register_theme_navigation() {
  register_nav_menus(
    [
      'primary_menu' => 'Primary Menu',
      'footer_menu' => 'Footer Menu',
      // 'mobile_menu' => 'Mobile Menu'
    ]
  );
}

add_action('after_setup_theme', 'register_theme_navigation');

?>