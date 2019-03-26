<?php
/**
Plugin Name: WP-Ckan
description: A plugin which allows users to retrieve data from styles api into wp admin adn display it on front end.
Add Ckan information using shortcode
Plugin URI: http://localhost/akvo-sites-2016-develop/code/
Author URI: http://localhost/akvo-sites-2016-develop/code/
Version: 2.4
Author: Preeti
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpi-2.0.html
Text Domain: Wp-ckan
 */



require 'slugify/vendor/autoload.php';


if( !function_exists('add_action') ){
    die("Hi there! I'm just a plugin, not much I can do when called directly." );
}

// Setup
define( 'CKAN_PLUGIN_URL', __FILE__);

$plugin_url = CKAN_PLUGIN_URL.'/wp-styles';

$options = array();

// Includes
include ('includes/activate.php');
include('includes/admin/menu_settings.php');
include ('includes/admin/init.php');
include('includes/admin/ckan-widgets.php');
include ('includes/front/enqueue.php');
include ('includes/init.php');



// Hooks
register_activation_hook( __FILE__, 'ckan_activate_plugin' );
add_action( 'init','dataset_init' );
add_action( 'admin_init', 'dataset_admin_init' );
add_action('admin_menu', 'ckan_settings_menu');
add_action('register_widget','ckan_data_register_widgets');
//add_action('wp_ajax_ckan_articles_refresh_results', 'ckan_articles_refresh_results');
//add_action('wp_head', 'ckan_articles_enable_front_ajax');
add_action( 'widgets_init', 'ckan_articles_register_widgets' );
add_action('register_widget','ckan_data_register_widgets');




//Shortcode
add_shortcode('ckan_articles', 'ckan_articles_shortcode' );
add_shortcode ('my_ajax_filter_search', 'my_ajax_filter_search_shortcode');








