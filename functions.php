<?php
// Check PHP version
if (version_compare('7.0', phpversion(), '>')) {
  
    die('You must be using PHP 7.0 or greater.');
  
  }
  
  // Check WP Version
  if (version_compare($GLOBALS['wp_version'], '5.4.2', '<=')) {
  
    die('WP theme only works in WordPress 5.4.2 or lower. Please upgrade your WP site.');
  }

function include_styles()
{

    // style local to theme root
    wp_enqueue_style(
        'idm250-css', // unique name 
        get_template_directory_uri() . '/dist/styles/main.css', // link to path of css
        []
    );


    wp_enqueue_style(
        'idm250-normalize', // unique name 
        get_template_directory_uri() . '/dist/styles/normalize.css', // link to path of css
        []
    );


    wp_enqueue_style(
      'idm250-fonts', // unique name 
      get_template_directory_uri() . '/dist/styles/fonts.css', // link to path of css
      []
    );
}

// When WP performs this action, call our function
add_action('wp_enqueue_scripts', 'include_styles');

// includes js to footer
function include_js_files()
{
    wp_enqueue_script(
        'idm250-js',
        get_template_directory_uri() . '/dist/scripts/main.js',
        [], // dependencies
        false, // version number
        true // in footer
    );
}
// When WP performs this action, call our function
add_action('wp_enqueue_scripts', 'include_js_files');


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
  

/*
 * Enable support for Post Thumbnails on posts and pages.
 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
function add_post_thumbnails_support()
{
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'add_post_thumbnails_support');

function idm_register_sidebars()
{
    register_sidebar(
        [
            'name' => 'Primary Sidebar',
            'id' => 'sidebar-primary',
        ]
    );
    register_sidebar([
        'name' => 'Secondary Sidebar',
        'id' => 'sidebar-secondary',
    ]);
}
add_action('widgets_init', 'idm_register_sidebars');

/**
 * register taxonomies
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 * @return void
 */
function proj_register_taxonomies()
{
    $labels = [
        'name' => _x('Categories', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Categories'),
    ];

    register_taxonomy(
        'project-categories',
        ['projects'],
        [
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'works'],
        ]
    );
}

add_action('init', 'proj_register_taxonomies', 0);

// custom post type
function proj_register_custom_post_type()
{
    $args = [
        'label' => 'Project',
        'labels' => [
            'name' => 'Projects',
            'singular_name' => 'Project'
        ],
        'supports' => [
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'page-attributes',
            'post-formats'
        ],
        'taxonomies' => ['category', 'post_tag'],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'show_in_rest' => true,
        'rewrite' => [
            'slug' => 'projects' // change slug from idm-projects to /projects
        ],
        // Dash Icons https://developer.wordpress.org/resource/dashicons/#media-audio
        'menu_icon' => 'dashicons-clipboard'
        // 'menu_icon'             => get_stylesheet_directory_uri() . '/static/images/icons/industries.png'
    ];

    register_post_type('projects', $args);
}
add_action('init', 'proj_register_custom_post_type');

//get attachment meta
function project_by_id($attachment_id) {
    // If no image, return false
    if (!wp_get_attachment_image_url($attachment_id, '')) {
        return false;
    }
    $attachment = get_post($attachment_id);

    return [
        'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink($attachment->ID),
        'src' => wp_get_attachment_image_url($attachment_id, ''),
        'title' => $attachment->post_title
    ];
}



