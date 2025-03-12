<?php
/**
 * Support functions
 *
 * @package  system-requirements-check
 */

declare( strict_types=1 );

namespace eslin87\SysReq;

if ( ! defined( 'ABSPATH' ) ) { exit; }

function prep( string $arg ): string {

    if ( empty( $arg ) ) {
        return '0';
    }
    
    $arg = trim( $arg );
    $arg = htmlentities( $arg, ENT_QUOTES );

    return $arg;
}

?>