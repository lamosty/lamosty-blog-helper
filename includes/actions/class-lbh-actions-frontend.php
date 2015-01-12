<?php

/**
 * @ Lamosty.com 2015
 */
class LBH_Actions_Frontend extends Lamosty_Actions {
	protected $id = 'frontend';

	private function hide_cat_from_homepage( $cat_ID ) {
		$this->dispatcher->dispatch( array(
			"action_type" => "hide_cat_from_homepage",
			"cat_ID"      => $cat_ID
		) );

	}

	public function init_actions() {
		$this->hide_cat_from_homepage(56);
	}

}