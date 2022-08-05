<?php

/*
Plugin Name: Fabulous Functionality
Plugin URI: https://webformyself.com
Description: Краткое описание плагина Fabulous Functionality.
Version: 1.0
Author: Andrey Kudlay
Author URI: https://webformyself.com
Text Domain: fabfunc
Domain Path: /languages
*/

defined( "ABSPATH" ) or die;
define( "FABFUNC_PLUGIN_DIR", plugin_dir_path( __FILE__ ) );
define( "FABFUNC_PLUGIN_URL", plugin_dir_url( __FILE__ ) );
define( "FABFUNC_PLUGIN_NAME", dirname( plugin_basename( __FILE__ ) ) );

function fabfunc_activate() {
	require_once FABFUNC_PLUGIN_DIR . 'includes/class-fabfunc-activate.php';
	Fabfunc_Activate::activate();
}

register_activation_hook( __FILE__, 'fabfunc_activate' );

require_once FABFUNC_PLUGIN_DIR . 'includes/class-fabfunc.php';
function run_fabfunc() {
	$plugin = new Fabfunc();
}
run_fabfunc();