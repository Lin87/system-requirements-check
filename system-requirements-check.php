<?php
/**
 * Plugin Name: System Requirements Check
 * Plugin URI: https://github.com/lin87/system-requirements-check
 * Description: A system requirements plugin that checks for the specified version of the operating systems, web browsers, screen resolution, IP addresses, Adobe Flash Player, Java Runtime Environment (JRE), Cookie, and Javascript on the client's system. The result can be displayed on a post or page with the use of a shortcode to let the end-users be aware that their system may not be optimal for specific tasks or operations.
 * Version: 2.0.0
 * Author: Ethan Lin
 * Author URI: https://profiles.wordpress.org/eslin87/
 * License: GPLv3
 */

 if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! function_exists( '\get_plugin_data' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

define( 'SYS_REQ_VERSION', \get_plugin_data( __FILE__, false, false )['Version'] );
define( 'SYS_REQ_URL', untrailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ) ) ) );

require_once 'includes/autoloader.php';

use \eslin87\SysReq\SystemRequirementsCheck;
use \eslin87\SysReq\Shortcode;

/**
 * Initialize the plugin.
 *
 * @return void
 */
function sys_req_init() {
	SystemRequirementsCheck::instance()->activate( __FILE__ )->initialize();
	Shortcode::instance()->activate( __FILE__ )->initialize();
}

add_action( 'init', 'sys_req_init', 5 );