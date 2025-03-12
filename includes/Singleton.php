<?php
/**
 * Singleton
 *
 * @package system-requirements-check
 */

declare( strict_types=1 );

namespace eslin87\SysReq;

if ( ! defined( 'ABSPATH' ) ) { exit; }

require_once __DIR__ . 'includes/Extension.php';

/**
 * Singleton
 */
abstract class Singleton implements Extension {
    /**
	 * Instances
	 *
	 * @var array<string,Extension>
	 */
	private static $instances = array();

    /**
	 * Singleton
     * 
	 * @see Extension::instance
	 */
	final public static function instance(): Extension {
		$class = get_called_class();
		if ( ! isset( self::$instances[ $class ] ) ) {
			self::$instances[ $class ] = new $class();
		}
		return self::$instances[ $class ];
	}

    /**
	 * Activate
	 *
	 * @see Extension::activate
	 */
	public function activate( string $file = '', array $plugin = array() ): Extension {
		return $this;
	}

    /**
	 * Initialize
	 *
	 * @since 4.0.0
	 * @see Extension::initialize
	 */
	abstract public function initialize();

}
