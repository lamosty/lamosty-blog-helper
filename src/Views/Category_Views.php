<?php namespace Lamosty\Blog_Helper\Views;

/**
 * @ Lamosty.com 2015
 */

use Lamosty\Blog_Helper\Blog_Helper;
use \Lamosty\WP_Plugin_Stack\Views;

class Category_Views extends Views {
	protected $id = 'category';

	public function render_cat_visibility_fields( $category_meta, $tag ) {
		$posts_on_homepage = 'visible';

		if ( isset( $category_meta[ $tag->term_id ] ) ) {
			$posts_on_homepage = esc_attr( $category_meta[ $tag->term_id ]['posts-on-homepage'] );
		}

		?>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="category-posts-on-homepage">
					<?php _ex( 'Posts on Homepage', 'category edit screen', Blog_Helper::TEXT_DOMAIN ); ?>
				</label></th>
			<td>
				<select name="category-meta[<?php echo $tag->term_id; ?>][posts-on-homepage]"
				        id="category-posts-on-homepage" class="postform">
					<option value="visible" <?php selected( $posts_on_homepage, 'visible' ); ?>>Visible</option>
					<option value="hidden" <?php selected( $posts_on_homepage, 'hidden' ); ?>>Hidden</option>
				</select>

				<p class="description">
					<?php _e( 'Show posts from this category on the homepage?', Blog_Helper::TEXT_DOMAIN ); ?>
				</p>
			</td>
		</tr>
	<?php

	}

	public function save_cat_visibility_option() {
		if ( isset( $_POST['category-meta'] ) && ! update_option( 'category-meta', $_POST['category-meta'] ) ) {
			add_option( 'category-meta', $_POST['category-meta'] );
		}
	}
}