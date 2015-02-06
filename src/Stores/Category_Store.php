<?php namespace Lamosty\Blog_Helper\Stores;

/**
 * @ Lamosty.com 2015
 */

use \Lamosty\WP_Plugin_Stack\Store;

class Category_Store extends Store {
	protected $id = 'category';

	public function get_category_meta_from_db() {
		$category_meta = get_option( "category-meta" );

		if ( ! is_array( $category_meta ) ) {
			$category_meta = array();
		}

		$this->add_single_data( "category-meta", $category_meta );
	}

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

	public function get_hidden_cats() {
		$this->get_category_meta_from_db();

		$cat_meta = $this->get_single_data( 'category-meta' );

		$hidden_cats = array();

		foreach ( $cat_meta as $cat_id => $cat_val ) {
			if ( $cat_val["posts-on-homepage"] === 'hidden' ) {
				$hidden_cats[] = $cat_id;
			}
		}

		$this->add_single_data( 'hidden_cats', $hidden_cats );
	}
}