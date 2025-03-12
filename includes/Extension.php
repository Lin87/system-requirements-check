<?php
/**
 * Extension interface
 *
 * @package system-requirements-check
 */

declare( strict_types=1 );

namespace eslin87\SysReq;

if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Extension interface
 */
interface Extension {
	/**
	 * Singleton
	 *
	 * @return Extension extension object.
	 */
	public static function instance(): Extension;

	/**
	 * Activate
	 *
	 * @param string              $file   the plugin file.
	 * @param array<string,mixed> $plugin the plugin details.
	 * @return Extension extension object.
	 */
	public function activate( string $file = '', array $plugin = array() ): Extension;

	/**
	 * Initialize
     * 
	 * @return void
	 */
	public function initialize();
}
