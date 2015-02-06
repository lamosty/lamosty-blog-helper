<?php namespace Lamosty\Blog_Helper\Callbacks_Managers;

/**
 * @ Lamosty.com 2015
 */

use \Lamosty\WP_Plugin_Stack\Callbacks_Manager;

use Lamosty\Blog_Helper\Actions;

class Backend_Callbacks_Manager extends Callbacks_Manager {
	public function register_callbacks() {
		$this->register_callback( 'category', array( $this, 'handle_category_dispatcher' ) );
	}

	public function handle_category_dispatcher( $action ) {

		$action_type = $action["action_type"];

		$category_store = $this->get_store( 'category' );
		$category_views = $this->get_view( 'category' );

		switch ( $action_type ) {
			case Actions\Category_Actions::ADD_CAT_VISIBILITY_OPTION:
				$tag = $action["tag"];

				$category_store->get_category_meta_from_db();

				$category_views->render_cat_visibility_fields(
					$category_store->get_single_data( 'category-meta' ),
					$tag
				);

				break;

			case Actions\Category_Actions::SAVE_CAT_VISIBILITY_OPTION:
				$category_views->save_cat_visibility_option();

				break;
		}

	}
}
