<?php namespace Lamosty\Blog_Helper\Actions;

/**
 * @ Lamosty.com 2015
 */

use \Lamosty\WP_Plugin_Stack\Actions;

class Frontend_Actions extends Actions {
	protected $id = 'frontend';

	const HIDE_CAT_FROM_HOMEPAGE = 'hcfh';
	const REVERSE_CAT_POSTS_ORDER = 'rcpo';

	public function hide_cats_from_homepage( \WP_Query $query ) {
		$cat_IDs = array( 55, 56 );

		$this->dispatcher->dispatch( array(
			"action_type" => self::HIDE_CAT_FROM_HOMEPAGE,
			"cat_IDs"     => $cat_IDs,
			"WP_Query"    => $query
		) );
	}

	public function reverse_cats_posts_order( \WP_Query $query ) {
		$cat_IDs = array( 54 );

		$this->dispatcher->dispatch( array(
			"action_type" => self::REVERSE_CAT_POSTS_ORDER,
			"cat_IDs"     => $cat_IDs,
			"WP_Query"    => $query
		) );
	}

	public function init_wp_actions() {
		add_action( 'pre_get_posts', array( $this, 'hide_cats_from_homepage' ) );
		add_action( 'pre_get_posts', array( $this, 'reverse_cats_posts_order' ) );
	}

}