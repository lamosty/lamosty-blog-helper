<?php

/**
 * @ Lamosty.com 2015
 */
class LBH_Store_Frontend extends Lamosty_Store {
	protected $id = 'frontend';

	public function hide_cat_from_homepage( $cat_IDs ) {
		$this->add_single_data( 'cat_IDs', $cat_IDs );

		add_action( 'pre_get_posts', array( $this, 'action_hide_cat_from_homepage' ) );
	}

	public function action_hide_cat_from_homepage( WP_Query $query ) {
		$cat_IDs                 = $this->get_single_data( 'cat_IDs' );
		$cat_IDs_excluded_string = '';

		for ( $i = 0; $i < count( $cat_IDs ); $i ++ ) {
			$cat_IDs_excluded_string .= "-{$cat_IDs[$i]}";

			if ( $i + 1 < count( $cat_IDs ) ) {
				$cat_IDs_excluded_string .= ",";
			}
		}

		if ( $query->is_home() && $query->is_main_query() ) {
			$query->set( 'cat', $cat_IDs_excluded_string );
		}
	}
}