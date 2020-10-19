<style>
ul.img-select-wrap {
    width: 100%;
    display: flex;
    margin: 15px 0;
}

ul.img-select-wrap li {
    float: left;
    margin-right: 1px;
}
img.img-select {
    border: 2px solid #eee;
    cursor: pointer;
    border-radius: 4px;
    background: #fff;
}
.img-select-wrap li span {
    font-size: 11px;
    display: block;
    text-align: center;
    max-width: 60px;
    line-height: 13px;
}
input.hidden {
    display: none!important;
}
img.img-select.selected {
    border: 2px solid #ffc627;
}
</style>
<?php
/**
 * Remove the WordPress Core Custom Fields metabox in Page and Post content (superceded by ACF)
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
define( 'THEME_SLUG', 'asu_wp2020' );
define( 'THEME_URI', trailingslashit( get_template_directory_uri() ) );
define( 'IMG_URI', THEME_URI . 'images' );

/**
 * Remove metaboxes for WordPress' basic custom fields.
 * This functionality will be replaced by Advanced Custom Fields.
 */
function uds_wp_remove_metaboxes() {
	remove_meta_box( 'postcustom', 'page', 'normal' ); // Remove custom fields for Pages.
	remove_meta_box( 'postcustom', 'post', 'normal' ); // Remove custom fields for Posts.
}
add_action( 'admin_menu', 'uds_wp_remove_metaboxes' );


/*	--- Add Metaboxes --- */

add_action( 'load-post.php', 'uds_wp_meta_boxes_setup' );
add_action( 'load-post-new.php', 'uds_wp_meta_boxes_setup' );


if ( !function_exists( 'uds_wp_meta_boxes_setup' ) ) :
	function uds_wp_meta_boxes_setup() {
		global $typenow;
		if ( $typenow == 'page' ) {
			add_action( 'add_meta_boxes', 'uds_wp_load_page_metaboxes' );
			add_action( 'save_post', 'uds_wp_save_page_metaboxes', 10, 2 );
		}

		if ( $typenow == 'post' ) {
			add_action( 'add_meta_boxes', 'uds_wp_load_post_metaboxes' );
			add_action( 'save_post', 'uds_wp_save_post_metaboxes', 10, 2 );
		}
	}
endif;

/* Add page metaboxes */
if ( !function_exists( 'uds_wp_load_page_metaboxes' ) ) :
	function uds_wp_load_page_metaboxes() {

		/* Sidebar metabox */
		add_meta_box(
			'uds_wp_sidebar',
			__( 'Sidebars & Templates', THEME_SLUG ),
			'uds_wp_sidebar_metabox',
			'page',
			'side',
			'default'
		);

	}
endif;

/* Add post metaboxes */
if ( !function_exists( 'uds_wp_load_post_metaboxes' ) ) :
	function uds_wp_load_post_metaboxes() {

		/* Sidebar metabox */
		add_meta_box(
			'uds_wp_sidebar',
			__( 'Sidebars & Templates', THEME_SLUG ),
			'uds_wp_sidebar_metabox',
			'post',
			'side',
			'default'
		);

	}
endif;


/* Create Sidebars Metabox */
if ( !function_exists( 'uds_wp_sidebar_metabox' ) ) :
	function uds_wp_sidebar_metabox( $object, $box ) {
		$uds_wp_meta = uds_wp_get_post_meta( $object->ID );
		$sidebars_lay = uds_wp_get_sidebar_layouts( false );
		$sidebars = uds_wp_get_sidebars_list( false );
?>
<?php
//echo '<pre>'; print_r($uds_wp_meta); echo '</pre>';
?>
	  	<ul class="img-select-wrap next-hide">
	  	<?php foreach ( $sidebars_lay as $id => $layout ): ?>
	  		<li >
	  			<?php $selected_class = $id == $uds_wp_meta['use_sidebar'] ? ' selected': ''; ?>
	  			<img src="<?php echo $layout['img']; ?>" title="<?php echo $layout['title']; ?>" class="img-select<?php echo $selected_class; ?>">
	  			<span><?php echo $layout['title']; ?></span>
	  			<input type="radio" class="hidden" name="uds_wp[use_sidebar]" value="<?php echo $id; ?>"
          <?php checked( $id, $uds_wp_meta['use_sidebar'] );?>/> </label>
	  		</li>
	  	<?php endforeach; ?>
	   </ul>



	  <?php
    if ( !empty( $sidebars ) ): ?>
<?php  if($uds_wp_meta['use_sidebar']=='none' || $uds_wp_meta['use_sidebar']=='fixed' )  $display=' style="display:none;"';?>
	  	<p><select name="uds_wp[sidebar]" class="widefat" <?php echo $display;?>>
	  	<?php foreach ( $sidebars as $id => $name ): ?>
	  		<option value="<?php echo $id; ?>" <?php selected( $id, $uds_wp_meta['sidebar'] );?>><?php echo $name; ?></option>
	  	<?php endforeach; ?>
	  </select></p>


	  <?php endif; ?>
	  <?php
	}
endif;







/* Save Page Meta */
if ( !function_exists( 'uds_wp_save_page_metaboxes' ) ) :
	function uds_wp_save_page_metaboxes( $post_id, $post ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return;

		if ( isset( $_POST['asu_wp2020_page_nonce'] ) ) {
			if ( !wp_verify_nonce( $_POST['asu_wp2020_page_nonce'], __FILE__  ) )
				return;
		}

		if ( $post->post_type == 'page' && isset( $_POST['asu_wp2020'] ) ) {
			$post_type = get_post_type_object( $post->post_type );
			if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
				return $post_id;

			$uds_wp_meta = array();

			$uds_wp_meta['use_sidebar'] = isset( $_POST['asu_wp2020']['use_sidebar'] ) ? $_POST['asu_wp2020']['use_sidebar'] : 'fixed';
			$uds_wp_meta['sidebar'] = isset( $_POST['asu_wp2020']['sidebar'] ) ? $_POST['asu_wp2020']['sidebar'] : 0;


			update_post_meta( $post_id, '_asu_wp2020_meta', $uds_wp_meta );

		}
	}
endif;

/* Save Post Meta */
if ( !function_exists( 'uds_wp_save_post_metaboxes' ) ) :
	function uds_wp_save_post_metaboxes( $post_id, $post ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return;

		if ( isset( $_POST['asu_wp2020_post_nonce'] ) ) {
			if ( !wp_verify_nonce( $_POST['asu_wp2020_post_nonce'], __FILE__  ) )
				return;
		}


		if ( $post->post_type == 'post' && isset( $_POST['asu_wp2020'] ) ) {
			$post_type = get_post_type_object( $post->post_type );
			if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
				return $post_id;

			$uds_wp_meta = array();

			$uds_wp_meta['use_sidebar'] = isset( $_POST['asu_wp2020']['use_sidebar'] ) ? $_POST['asu_wp2020']['use_sidebar'] : 'fixed';
			$uds_wp_meta['sidebar'] = isset( $_POST['asu_wp2020']['sidebar'] ) ? $_POST['asu_wp2020']['sidebar'] : 0;

			update_post_meta( $post_id, '_asu_wp2020_meta', $uds_wp_meta );

		}
	}
endif;









?>



<?php
