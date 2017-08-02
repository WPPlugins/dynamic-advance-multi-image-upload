<?php
/*
 * Plugin Name: Dynamic Multiple Image Upload
 * Description: DAMIU is a very simple image upload plugin. Any user can upload multiple image from any page or post.
 * Author:Tanmoy Dhara
 * Version: 1.0
 * License: DAMIU
 */
 
 
global $wpdb;
$table_name = $wpdb->prefix . 'postmeta';

define('ws_plugin_url',plugins_url( '/', __FILE__ ));  

add_action('admin_menu', 'dmiu_create_menu');
	
add_action( 'admin_enqueue_scripts', 'dmiu_enqueue' );

include_once dirname( __FILE__ ) . '/script-style-menu.php';

include_once dirname( __FILE__ ) . '/dmiu-main-setting.php';

add_action('admin_init','dmiu_meta_init');

/* 
 * Post,Page Selection Panel
 * */
 
function dmiu_meta_init()     
{
	global $wpdb;
$table_name = $wpdb->prefix . 'postmeta';

	$meta_key='plug_me';
	$meta_field='description_field';
	$pos=sanitize_title($_GET['post']);
	$posidd=intval($_POST['post_ID']);
	$post_id =$pos ? $pos : $posidd ;
	global $wpdb;
	$result= $wpdb->get_results("select * from `$table_name` where `meta_key`='$meta_key'");
	foreach($result as $r)
	{
		$val=($r->post_id)-1000;
		if ($post_id == $val)
		{
			if(get_post_type($val)=='page')
			{
				add_meta_box('dmiu_all_meta', 'Multiple Image Upload', 'dmiu_meta_box', 'page', 'normal', 'high');
			}
			else 
			{
				add_meta_box('dmiu_all_meta', 'Multiple Image Upload', 'dmiu_meta_box', 'post', 'normal', 'high');
			}	
		}
	}
}
    // add meta box
     include_once dirname( __FILE__ ) . '/dmiu-meta-box.php';
	 
	// call ajax function
	 add_action( 'wp_ajax_my_action', 'dmu_callback');
     include_once dirname( __FILE__ ) . '/dmu-callback.php';
	 
	 // call shortcode page
	 include_once dirname( __FILE__ ) . '/shortcode.php';
   
?>