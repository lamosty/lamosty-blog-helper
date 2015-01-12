<?php

/**
 * @ Lamosty.com 2015
 */
class LBH_Store_Frontend extends Lamosty_Store {
	protected $id = 'frontend';

	public function hide_cat_from_homepage( $cat_ID ) {
		$this->add_single_data( 'cat_ID', $cat_ID );

		add_action( 'pre_get_posts', array( $this, 'action_hide_cat_from_homepage' ) );
	}

	public function action_hide_cat_from_homepage( WP_Query $query ) {
		if ( $query->is_home() && $query->is_main_query() ) {
			$query->set( 'cat', '-' . $this->get_single_data( 'cat_ID' ) );
		}
	}
}