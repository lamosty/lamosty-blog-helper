<?php namespace Lamosty\Blog_Helper\Stores;

/**
 * @ Lamosty.com 2015
 */

use \Lamosty\WP_Plugin_Stack\Store;

class Category_Store extends Store {
	protected $id = 'category';

	public function get_category_meta_from_db() {
		$category_meta = get_option( "category-meta" );
		$this->add_single_data( "category-meta", $category_meta );
	}
}