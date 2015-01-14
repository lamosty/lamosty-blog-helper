<?php namespace Lamosty\Blog_Helper\Callbacks_Managers;

/**
 * @ Lamosty.com 2015
 */

use \Lamosty\WP_Plugin_Stack\Callbacks_Manager;
use \Lamosty\Blog_Helper\Stores;
use \Lamosty\Blog_Helper\Views;

class Frontend_Callbacks_Manager extends Callbacks_Manager {
	public function register_callbacks() {
		$this->register_callback( 'frontend', array( $this, 'handle_frontend_dispatcher' ) );
	}

	public function handle_frontend_dispatcher( $action ) {
		$action_type = $action["action_type"];

		/* @var $store_frontend Stores\Frontend_Store */
		$store_frontend = $this->get_store( 'frontend' );

		/* @var $views_frontend Views\Frontend_Views */
		$views_frontend = $this->get_view( 'frontend' );

		switch ( $action_type ) {
			case "hide_cat_from_homepage":
				$store_frontend->cat_IDs_to_string( $action["cat_IDs"], true );

				$views_frontend->hide_cats_from_homepage(
					$store_frontend->get_single_data( 'excluded_cat_IDs_string' ),
					$action["WP_Query"]
				);

				break;
		}

		switch ( $action_type ) {
			case "reverse_cat_posts_order":
				$views_frontend->reverse_cat_posts_order(
					$action["cat_IDs"],
					$action["WP_Query"]
				);

				break;
		}
	}
}