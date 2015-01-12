<?php

/**
 * @ Lamosty.com 2015
 */
class LBH_Actions_Frontend extends Lamosty_Actions {
	protected $id = 'frontend';

	private function hide_cat_from_homepage( $cat_IDs ) {
		$this->dispatcher->dispatch( array(
			"action_type" => "hide_cat_from_homepage",
			"cat_IDs"     => $cat_IDs
		) );
	}

	private function reverse_cat_posts_order( $cat_IDs ) {
		$this->dispatcher->dispatch( array(
			"action_type" => "reverse_cat_posts_order",
			"cat_IDs"     => $cat_IDs
		) );
	}

	public function init_actions() {
		$this->hide_cat_from_homepage( array( 55, 56 ) );
		$this->reverse_cat_posts_order( array( 54 ) );
	}

}