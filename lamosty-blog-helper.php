<?php
/**
 * Plugin Name:       Lamosty Blog Helper
 * Plugin URI:        https://lamosty.com/plugins/blog-helper-wordpress-plugin/
 * Description:       A few helper utilities (more added when needed) that I use on my personal blog and other few sites.
 * Version:           1.0
 * Author:            Rastislav Lamos
 * Author URI:        https://lamosty.com
 * License: GPL2+
 *
 * Text Domain: lamosty-blog-helper
 * Domain Path: /languages/
 *
 * Requires at least: 4.1
 * Tested up to:      4.1
 */

$lamosty_plugin_stack_dir = dirname( __FILE__ ) . '/lib/lamosty-plugin-stack';

require_once( $lamosty_plugin_stack_dir . '/init.php');

class Lamosty_Blog_Helper extends Lamosty_Plugin {

	function __construct( Lamosty_Dispatcher $dispatcher, $file) {
		parent::__construct($file);

	}

	public static function init( Lamosty_Dispatcher $dispacher, $file ) {
		static $instance = null;

		if ( ! $instance )
			$instance = new Lamosty_Blog_Helper( $dispacher, $file );

		return $instance;

	}
}

Lamosty_Blog_Helper::init(new Lamosty_Dispatcher(), __FILE__);
