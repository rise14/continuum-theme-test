<?php 

function my_theme_custom_header() {
    add_theme_support('custom-header', array(
        'width'         => 1920, // Adjust width
        'height'        => 400,  // Adjust height
        'flex-width'    => true,
        'flex-height'   => true,
        'header-text'   => false, // Set to true if you want text overlay
        'default-image' => get_template_directory_uri() . '/assets/images/default-header.jpg',
    ));
}
add_action('after_setup_theme', 'my_theme_custom_header');

function disable_wp_feeds() {
    wp_die(__('Feeds are disabled on this site.'));
}
add_action('do_feed', 'disable_wp_feeds', 1);
add_action('do_feed_rdf', 'disable_wp_feeds', 1);
add_action('do_feed_rss', 'disable_wp_feeds', 1);
add_action('do_feed_rss2', 'disable_wp_feeds', 1);
add_action('do_feed_atom', 'disable_wp_feeds', 1);

add_filter('body_class','add_category_to_single');
  function add_category_to_single($classes) {
    if (is_single() ) {
      global $post;
      foreach((get_the_category($post->ID)) as $category) {
        // add category slug to the $classes array
        $classes[] = $category->category_nicename;
      }
    }
    // return the $classes array
    return $classes;
  }


//this is the folder that houses the function files to include
define('functions', get_template_directory() . '/functions');

load_theme_textdomain('continuum');
load_textdomain('continuum', get_template_directory().'/lang/continuum.mo' );

//Get the theme options
require_once(functions . '/theme-options.php');

//Get the widgets
require_once(functions . '/widgets.php');

//Get the functions to load all the various templates
require_once(functions . '/load-templates.php');

//Get the custom functions
require_once(functions . '/custom.php');

//Get the shortcodes
require_once(functions . '/shortcodes.php');

//Get the post type functions
require_once(functions . '/post-types.php');

//Get the post & page meta boxes
require_once(functions . '/meta-boxes.php');

//notifies users of updates
require('update-notifier.php');

add_filter('intermediate_image_sizes_advanced', function ($sizes) {
    // Remove specific sizes or all custom sizes
    unset($sizes['thumbnail']);
    unset($sizes['medium']);
    unset($sizes['large']);
    // Add other sizes to unset if needed
    return $sizes;
});

?>