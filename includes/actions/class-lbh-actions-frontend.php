<?php

/**
 * @ Lamosty.com 2015
 */
class LBH_Actions_Frontend extends Lamosty_Actions {
	protected $id = 'frontend';

	private function hide_cat_from_homepage( $cat_IDs ) {
		$this->dispatcher->dispatch( array(
			"action_type" => "hide_cat_from_homepage",
			"cat_IDs"      => $cat_IDs
		) );

	}

	public function init_actions() {
		$this->hide_cat_from_homepage(array(55, 56));
	}

}