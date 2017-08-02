<?php
/*
 * admin menu settings
 * */
function dmiu_create_menu() {
	$dmu_menu= add_menu_page('dmiu Settings', 'DAMIU Settings', 'administrator', __FILE__, 'dmiu_main_setting' , 'dashicons-admin-site');	
	function dmuistyles() {
        wp_enqueue_style( 'dmuistyles', plugins_url( '/css/dmuistyle.css', __FILE__  ),array() );

    }
    add_action( 'admin_print_styles-' . $dmu_menu, 'dmuistyles' );
}

/*
 * setting and register style and script file for post and page
 * */
function dmiu_enqueue($hook) {
    if ( 'post.php' != $hook ) {
        return;
    }
	wp_register_script( 'dmiu_script', plugin_dir_url( __FILE__ ) . 'js/DAMIU_script.js', array( 'jquery' ));
	wp_enqueue_style ( 'dmiu_style', plugins_url( '/css/plugin-style.css', __FILE__ ), array());
	wp_localize_script(
		'dmiu_script',
		'WP_SPECIFIC',
		array(
			'upload_url' => '',
			'metabox_title' => '',
			'mediaSelector_title' =>'select your image',
			'mediaSelector_buttonText' =>'upload'
		)
	);
    wp_enqueue_script('dmiu_script' );
}

?>