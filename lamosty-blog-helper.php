<?php namespace Lamosty\Blog_Helper;
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

require __DIR__ . '/vendor/autoload.php';

use \Lamosty\WP_Plugin_Stack;

class Blog_Helper extends WP_Plugin_Stack\Plugin {
	protected $namespace = __NAMESPACE__;

	function __construct( WP_Plugin_Stack\Dispatcher $dispatcher ) {

		parent::__construct( $dispatcher );

		add_action( 'init', array( $this, 'action_init' ) );

	}

	public function action_init() {
		$callbacks_manager_frontend = new Callbacks_Managers\Frontend_Callbacks_Manager( $this->dispatcher, $this );
		$callbacks_manager_frontend->register_callbacks();

		$actions_frontend = new Actions\Frontend_Actions( $this->dispatcher );
		$actions_frontend->init_wp_actions();
	}

	public static function init( WP_Plugin_Stack\Dispatcher $dispatcher ) {
		static $instance = null;

		if ( ! $instance ) {
			$instance = new Blog_Helper( $dispatcher );
		}

		return $instance;

	}
}

Blog_Helper::init( new WP_Plugin_Stack\Dispatcher() );
