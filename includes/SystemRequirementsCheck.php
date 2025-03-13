<?php
/**
 * System Requirements Check Class
 *
 * @package system-requirements-check
 */

declare( strict_types=1 );

namespace eslin87\SysReq;

if ( ! defined( 'ABSPATH' ) ) { exit; }

// require_once __DIR__ . 'includes/Extension.php';
// require_once __DIR__ . 'includes/Singleton.php';
// require_once __DIR__ . 'includes/admin/class-system-requirements-check-settings.php';
use \eslin87\SysReq\Admin\Settings;

/**
 * System Requirements Check
 */
class SystemRequirementsCheck Extends Singleton implements Extension {

	private $settings_page;

    /**
	 * Add admin settings page
	 *
	 * @return void
	 */
    final public function initialize() {
		$this->settings_page = new Settings();

		// actions
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'backend_scripts' ) );
	}

	/**
	 * add a menu
	 */
	public function add_menu() {
		add_options_page( 'System Requirements Check', 'System Requirements Check', 'manage_options', 'system_requirements_check', array( $this->settings_page, 'output' ) );
	}

	/**
	 * Add Admin CSS files
	 */
	public function backend_scripts() {
        wp_register_style(
            'system-requirements-check-settings',
            plugins_url( 'admin/css/system-requirements-check-settings.css', dirname( __FILE__ ) ),
            array(),
            SYS_REQ_VERSION
        );
		wp_enqueue_style( 'system-requirements-check-settings' );
	}

}