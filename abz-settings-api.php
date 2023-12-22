<?php
/**
* Plugin Name: Settings API
* Description: A simple settings API for WordPress
* Version: 1.0.0
* Author: Yassine Abouzia
* License: GPL v2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

/* Define Plugin Path */
define('ABZ_SETTINGS_API_PATH', plugin_dir_path(__FILE__));

/** Upon activation */
register_activation_hook( __FILE__, 'my_plugin_activation' );

function my_plugin_activation() {
    // Add options to the database
    abz_settings_api_add_options();
}

/* Include required files */
require_once ABZ_SETTINGS_API_PATH . 'includes/setup-options.php';
require_once ABZ_SETTINGS_API_PATH . 'includes/admin-menu.php';
require_once ABZ_SETTINGS_API_PATH . 'includes/config_settings_api.php';

/** Upon deactivation */
register_deactivation_hook( __FILE__, 'my_plugin_deactivation' );

function my_plugin_deactivation() {
    
}