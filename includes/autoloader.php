<?php
spl_autoload_register( function ( $class ) {
    // Define the correct namespace prefix
    $prefix = 'eslin87\\SysReq\\';  // Ensure the namespace prefix is correct

    // Check if the class uses the namespace prefix
    if ( strpos( $class, $prefix ) !== 0 ) {
        return;
    }

    // Remove the namespace prefix
    $relativeClass = str_replace( $prefix, '', $class );

    // Convert namespace separators to directory separators
    // Use plugin root directory without adding 'includes' part again
    $file = plugin_dir_path( __FILE__ ) . str_replace( '\\', '/', $relativeClass ) . '.php';

    // Load the class file if it exists
    if ( file_exists( $file ) ) {
        require_once $file;
    } else {
        die( "Class file not found: $file" );
    }
} );
