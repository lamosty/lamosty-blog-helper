<?php

/**
 * @ Lamosty.com 2015
 */
class LBH_Actions_Frontend extends Lamosty_Actions {
	protected $id = 'frontend';

	public function hide_cats_from_homepage( WP_Query $query ) {
		$cat_IDs = array( 55, 56 );

		$this->dispatcher->dispatch( array(
			"action_type" => "hide_cat_from_homepage",
			"cat_IDs"     => $cat_IDs,
			"WP_Query"    => $query
		) );
	}

	public function reverse_cats_posts_order( WP_Query $query ) {
		$cat_IDs = array( 54 );

		$this->dispatcher->dispatch( array(
			"action_type" => "reverse_cat_posts_order",
			"cat_IDs"     => $cat_IDs,
			"WP_Query"    => $query
		) );
	}

	public function init_wp_actions() {
		add_action( 'pre_get_posts', array( $this, 'hide_cats_from_homepage' ) );
		add_action( 'pre_get_posts', array( $this, 'reverse_cats_posts_order' ) );
	}

}