<?php namespace Lamosty\Blog_Helper\Callbacks_Managers;

/**
 * @ Lamosty.com 2015
 */

use \Lamosty\WP_Plugin_Stack\Callbacks_Manager;

use Lamosty\Blog_Helper\Actions\Category_Actions;

class Category_Callbacks_Manager extends Callbacks_Manager {
	public function register_callbacks() {
		$this->register_callback( 'category', array( $this, 'handle_category_dispatcher' ) );
	}

	public function handle_category_dispatcher( $action ) {
		$category_store = $this->get_store( 'category' );
		$category_views = $this->get_view( 'category' );

		switch ( $action["action_type"] ) {

			case Category_Actions::ADD_CAT_VISIBILITY_OPTION:
				$tag = $action["tag"];

				$category_store->get_category_meta_from_db();

				$category_views->render_cat_visibility_fields(
					$category_store->get_single_data( 'category-meta' ),
					$tag
				);

				break;

			case Category_Actions::SAVE_CAT_VISIBILITY_OPTION:
				$category_store->get_category_meta_from_db();

				$category_views->save_cat_visibility_option(
					$category_store->get_single_data( 'category-meta' )
				);

				break;

			case Category_Actions::HIDE_CAT_FROM_HOMEPAGE:
				$category_store->get_hidden_cats();
				$category_store->cat_IDs_to_string( $category_store->get_single_data( 'hidden_cats' ), true );

				$category_views->hide_cats_from_homepage(
					$category_store->get_single_data( 'excluded_cat_IDs_string' ),
					$action["WP_Query"]
				);

				break;
		}


	}
}
