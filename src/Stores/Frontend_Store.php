<?php namespace Lamosty\Blog_Helper\Stores;

/**
 * @ Lamosty.com 2015
 */

use \Lamosty\WP_Plugin_Stack\Store;

class Frontend_Store extends Store {
	protected $id = 'frontend';

	public function cat_IDs_to_string( $cat_IDs, $exclude_cats = false ) {
		if ( $exclude_cats ) {
			$cat_IDs_excluded_string = '';

			for ( $i = 0; $i < count( $cat_IDs ); $i ++ ) {
				$cat_IDs_excluded_string .= "-{$cat_IDs[$i]}";

				if ( $i + 1 < count( $cat_IDs ) ) {
					$cat_IDs_excluded_string .= ",";
				}
			}

			$this->add_single_data( 'excluded_cat_IDs_string', $cat_IDs_excluded_string );
		} else {
			$this->add_single_data( 'cat_IDs_string', implode( ',', $cat_IDs ) );
		}
	}
}