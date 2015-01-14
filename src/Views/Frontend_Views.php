<?php namespace Lamosty\Blog_Helper\Views;

/**
 * @ Lamosty.com 2015
 */

use \Lamosty\WP_Plugin_Stack\Views;

class Frontend_Views extends Views {
	protected $id = 'frontend';

	public function hide_cats_from_homepage( $exclude_cat_IDs_string, \WP_Query $query ) {
		if ( $query->is_home() && $query->is_main_query() ) {
			$query->set( 'cat', $exclude_cat_IDs_string );
		}
	}

	public function reverse_cat_posts_order( array $cat_IDs, \WP_Query $query ) {
		if ( $query->is_category( $cat_IDs ) ) {
			$query->set( 'order', 'ASC' );
		}
	}
}