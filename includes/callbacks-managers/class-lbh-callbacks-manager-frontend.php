<?php

/**
 * @ Lamosty.com 2015
 */
class LBH_Callbacks_Manager_Frontend extends Lamosty_Callbacks_Manager {
	public function register_callbacks() {
		$this->register_callback( 'frontend', array( $this, 'handle_frontend_dispatcher' ) );

	}

	public function handle_frontend_dispatcher( $action ) {
		$action_type = $action["action_type"];

		switch ( $action_type ) {
			case "hide_cat_from_homepage":
				$this->get_store( 'frontend' )->hide_cat_from_homepage( $action["cat_ID"] );
				break;
		}
	}
}