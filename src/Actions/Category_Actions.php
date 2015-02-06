<?php namespace Lamosty\Blog_Helper\Actions;

/**
 * @ Lamosty.com 2015
 */

use \Lamosty\WP_Plugin_Stack\Actions;

class Category_Actions extends Actions {
	protected $id = 'category';

	const ADD_CAT_VISIBILITY_OPTION = 'acvo';
	const SAVE_CAT_VISIBILITY_OPTION = 'scvo';
	const HIDE_CAT_FROM_HOMEPAGE = 'hcfh';

	public function cat_visibility_option( $tag ) {
		$this->dispatcher->dispatch( array(
			"action_type" => self::ADD_CAT_VISIBILITY_OPTION,
			"tag"         => $tag
		) );
	}

	public function save_cat_visibility_option() {
		$this->dispatcher->dispatch( array(
			"action_type" => self::SAVE_CAT_VISIBILITY_OPTION
		) );
	}

	public function hide_cats_from_homepage( \WP_Query $query ) {
		$this->dispatcher->dispatch( array(
			"action_type" => self::HIDE_CAT_FROM_HOMEPAGE,
			"WP_Query"    => $query
		) );
	}

	public function init_wp_actions() {
		/**
		 * WordPress Dashboard Actions
		 */
		add_action( 'edit_category_form_fields', array( $this, 'cat_visibility_option' ) );
		add_action( 'edit_category', array( $this, 'save_cat_visibility_option' ) );

		/**
		 * WordPress Front-end Actions
		 */
		add_action( 'pre_get_posts', array( $this, 'hide_cats_from_homepage' ) );
	}

}

