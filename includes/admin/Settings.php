<?php
/**
 * Settings Class
 *
 * @package system-requirements-check
 */

 declare( strict_types=1 );

 namespace eslin87\SysReq\Admin;
 
 if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Setting class
 */
class Settings {

	private $settings_group;
	private $settings;
	
	/**
	 * __construct function
	 *
	 * @access public
	 * @return void
	 */
	 public function __construct() {
		 
		 $this->settings_group = 'system_requirements_check';
		 add_action( 'admin_init', array( $this, 'register_settings' ) );
		 
	 }
	 
	 /**
	 * init_settings function
	 *
	 * @access protected
	 * @return void
	 */
	protected function init_settings() {
	
		$this->settings = apply_filters( 'system_requirements_check_settings',
			array(
				'system_requirements' => array(
					__( 'System Requirements', 'system_requirements_check' ),
					array(
    					array(
							'name'		=> 'disable_os_check',
							'std'		=> '0'
						),
					    array(
							'name'		=> 'windows_xp',
							'std'		=> '0'
						),
						array(
							'name'		=> 'windows_vista',
							'std'		=> '0'
						),
						array(
							'name'		=> 'windows_7',
							'std'		=> '0'
						),
						array(
							'name'		=> 'windows_8',
							'std'		=> '0'
						),
						array(
							'name'		=> 'windows_81',
							'std'		=> '1'
						),
						array(
							'name'		=> 'windows_10',
							'std'		=> '1'
						),
						array(
							'name'		=> 'mac',
							'std'		=> '1'
						),
						array(
							'name'		=> 'linux',
							'std'		=> '0'
						),
						array(
							'name'		=> 'disable_browser_check',
							'std'		=> '0'
						),
						array(
							'name'		=> 'ie',
							'std'		=> '9'
						),
						array(
							'name'		=> 'edge',
							'std'		=> '108'
						),
						array(
							'name'		=> 'firefox',
							'std'		=> '108'
						),
						array(
							'name'		=> 'chrome',
							'std'		=> '108'
						),
						array(
							'name'		=> 'safari',
							'std'		=> '16'
						),
						array(
							'name'		=> 'opera',
							'std'		=> '96'
						),
						array(
							'name'		=> 'jre',
							'std'		=> '1.6.0'
						),
						array(
							'name'		=> 'cookies',
							'std'		=> '1'
						),
						array(
							'name'		=> 'enable_js_check',
							'std'		=> '1'
						),
						array(
							'name'		=> 'flash',
							'std'		=> '11'
						),
						array(
							'name'		=> 'ip',
							'std'		=> '0'
						),
						array(
							'name'		=> 'host_ip',
							'std'		=> '0'
						),
						array(
							'name'		=> 'enable_screen_check',
							'std'		=> '1'
						),
						array(
							'name'		=> 'screen_w',
							'std'		=> '1920'
						),
						array(
							'name'		=> 'screen_h',
							'std'		=> '1080'
						)
					),
				)
			)
		);
	}
	
	/**
	 * register_settings function
	 *
	 * @access public
	 * @return void
	 */
	public function register_settings() {
	
		$this->init_settings();

		foreach ( $this->settings as $section ) {
		
			foreach ( $section[1] as $option ) {

				if ( isset( $option['std'] ) ) {
					add_option( $option['name'], $option['std'] );
				}
					
				register_setting( $this->settings_group, $option['name'] );

			}
		}
		
	}
	
	/**
	 * output function
	 *
	 * @access public
	 * @return void
	 */
        public function output() {
                $this->init_settings();
                ?>

                <div class="wrap">
                        <h1><?php esc_html_e( 'System Requirements Check', 'system_requirements_check' ); ?></h1>
                        <?php settings_errors(); ?>
                        <?php include_once __DIR__ . '/settings-form.php'; ?>
                </div>
                <?php
        }

}