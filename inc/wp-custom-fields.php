<?php
/**
 * Remove the WordPress Core Custom Fields metabox in Page and Post content (superceded by ACF)
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Remove metaboxes for WordPress' basic custom fields.
 * This functionality will be replaced by Advanced Custom Fields.
 */
function uds_wp_remove_metaboxes() {
	remove_meta_box( 'postcustom', 'page', 'normal' ); // Remove custom fields for Pages.
	remove_meta_box( 'postcustom', 'post', 'normal' ); // Remove custom fields for Posts.
}
add_action( 'admin_menu', 'uds_wp_remove_metaboxes' );



add_action( 'load-post.php', 'uds_wp_meta_boxes_setup' );
add_action( 'load-post-new.php', 'uds_wp_meta_boxes_setup' );
if ( ! function_exists( 'uds_wp_meta_boxes_setup' ) ) {
	/**
	 * Metabox setup
	 */
	function uds_wp_meta_boxes_setup() {
		global $typenow;
		if ( 'page' === $typenow ) {
			add_action( 'add_meta_boxes', 'uds_wp_load_page_metaboxes' );
			add_action( 'save_post', 'uds_wp_save_page_metaboxes', 10, 2 );
		}

		if ( 'post' === $typenow ) {
			add_action( 'add_meta_boxes', 'uds_wp_load_post_metaboxes' );
			add_action( 'save_post', 'uds_wp_save_post_metaboxes', 10, 2 );
		}
	}
}

if ( ! function_exists( 'uds_wp_load_page_metaboxes' ) ) {
	/**
	 * Add page metaboxes
	 */
	function uds_wp_load_page_metaboxes() {
		/* Sidebar metabox */
		add_meta_box(
			'uds_wp_sidebar',
			__( 'Sidebars & Templates', 'uds-wordpress-theme' ),
			'uds_wp_sidebar_metabox',
			'page',
			'side',
			'default'
		);
	}
}

if ( ! function_exists( 'uds_wp_load_post_metaboxes' ) ) {
	/**
	 * Add post metaboxes
	 */
	function uds_wp_load_post_metaboxes() {
		/**
	  *  Sidebar metabox
			*/
		add_meta_box(
			'uds_wp_sidebar',
			__( 'Sidebars & Templates', 'uds-wordpress-theme' ),
			'uds_wp_sidebar_metabox',
			'post',
			'side',
			'default'
		);

	}
}

if ( ! function_exists( 'uds_wp_sidebar_metabox' ) ) {
	/**
	 * Create Sidebars Metabox
	 *
	 * @param Object $object The current Post/Page object.
	 *
	 * @param Box    $box for metabox.
	 */
	function uds_wp_sidebar_metabox( $object, $box ) {
		$uds_wp_meta = uds_wp_get_post_meta( $object->ID );
		$sidebars_layout = uds_wp_get_sidebar_layouts( false );
		$sidebars = uds_wp_get_sidebars_list( false );
		?>
		<ul class="img-select-wrap next-hide">
		<?php foreach ( $sidebars_layout as $id => $layout ) : ?>
			<li >
				<?php $selected_class = ( $id == $uds_wp_meta['use_sidebar'] ) ? ' selected' : ''; ?>
				<img src="<?php echo $layout['img']; ?>" title="<?php echo $layout['title']; ?>" class="img-select<?php echo $selected_class; ?>">
				<span><?php echo $layout['title']; ?></span>
				<input type="radio" class="hidden" name="uds_wp[use_sidebar]" value="<?php echo $id; ?>"
			<?php checked( $id, $uds_wp_meta['use_sidebar'] ); ?>/> </label>
			</li>
		<?php endforeach; ?>
	</ul>
		<?php
		$display = '';
		if ( ! empty( $sidebars ) ) {
			if ( 'none' === $uds_wp_meta['use_sidebar'] || 'fixed' === $uds_wp_meta['use_sidebar'] ) {
				$display = ' style="display:none;"';}
			?>
		<p><select name="uds_wp[sidebar]" class="widefat" <?php echo $display; ?>>
			<?php foreach ( $sidebars as $id => $name ) : ?>
			<option value="<?php echo $id; ?>" <?php selected( $id, $uds_wp_meta['sidebar'] ); ?>><?php echo $name; ?></option>
		<?php endforeach; ?>
	</select></p>
			<?php
		}
	}
}

if ( ! function_exists( 'uds_wp_save_page_metaboxes' ) ) {
	/**
	 *  Save Page Meta
	 *
	 * @param post_id $post_id for post ID.
	 * @param post    $post for post arry.
	 */
	function uds_wp_save_page_metaboxes( $post_id, $post ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( isset( $_POST['uds_wp_page_nonce'] ) ) {
			if ( ! wp_verify_nonce( $_POST['uds_wp_page_nonce'], __FILE__ ) ) {
				return;
			}
		}

		if ( 'page' === $post->post_type && isset( $_POST['uds_wp'] ) ) {
			$post_type = get_post_type_object( $post->post_type );
			if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
				return $post_id;
			}

			$uds_wp_meta = array();
			$uds_wp_meta['use_sidebar'] = ( isset( $_POST['uds_wp']['use_sidebar'] ) ) ? $_POST['uds_wp']['use_sidebar'] : 'fixed';
			$uds_wp_meta['sidebar'] = ( isset( $_POST['uds_wp']['sidebar'] ) ) ? $_POST['uds_wp']['sidebar'] : 0;
			update_post_meta( $post_id, '_uds_wp_meta', $uds_wp_meta );
		}
	}
}

if ( ! function_exists( 'uds_wp_save_post_metaboxes' ) ) {
	/**
	 *  Save Post Meta
	 *
	 * @param post_id $post_id for post ID.
	 * @param post    $post for post arry.
	 */
	function uds_wp_save_post_metaboxes( $post_id, $post ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( isset( $_POST['uds_wp_post_nonce'] ) ) {
			if ( ! wp_verify_nonce( $_POST['uds_wp_post_nonce'], __FILE__ ) ) {
				return;
			}
		}

		if ( 'post' === $post->post_type && isset( $_POST['uds_wp'] ) ) {
			$post_type = get_post_type_object( $post->post_type );
			if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
				return $post_id;
			}
			$uds_wp_meta = array();
			$uds_wp_meta['use_sidebar'] = ( isset( $_POST['uds_wp']['use_sidebar'] ) ) ? $_POST['uds_wp']['use_sidebar'] : 'fixed';
			$uds_wp_meta['sidebar'] = ( isset( $_POST['uds_wp']['sidebar'] ) ) ? $_POST['uds_wp']['sidebar'] : 0;
			update_post_meta( $post_id, '_uds_wp_meta', $uds_wp_meta );
		}
	}
}
