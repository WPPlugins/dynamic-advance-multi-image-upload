<?php

/*
 * add and update image, title and description
 * */
 
function dmiu_main_setting() {
	 $meta_value= 100000;
	 update_post_meta($meta_value,'set_title',1);	
	 if(isset($_POST['subme'])) {
	   $meta_key='plug_me';
	   $meta_field='description_field';
	   $pages = get_pages(); 
	   $j=0;$k=0;
	   foreach ( $pages as $page ) {  // selected page submission and update
	   
	   if(isset($_POST['vehicle'.$j]))
	   {
	  	 $meta_value=sanitize_text_field($_POST['vehicle'.$j]);
		 if(get_post_meta($meta_value+1000, $meta_key,true)=='') {
		 update_post_meta($meta_value+1000, $meta_key,1);
		 }
	   }
	   else {
	        delete_post_meta(($page->ID)+1000, $meta_key);
	   }
	   if(isset($_POST['cc2']) =='chk') // for page description box checked or unchecked
	   {
	  	$meta_value=sanitize_text_field($_POST['description'.$k]);
		 if(get_post_meta($meta_value+1000, $meta_field,true)=='') {
		 update_post_meta($meta_value+1000, $meta_field,1);
		 }
	   }
	   else {
	        delete_post_meta(($page->ID)+1000, $meta_field);
	   }
	$j++;
	$k++;
	}
   $meta_key='plug_me';
   $meta_field='description_field';
   $postlist = get_posts('posts_per_page=50');
   $posts = array();  $j=0;$k=0;
	foreach ( $postlist as $page ) {   // selected post submission and update
	   if(isset($_POST['vehicl'.$j]))
	   {
	  	$meta_value=sanitize_text_field($_POST['vehicl'.$j]);
		 if(get_post_meta($meta_value+1000, $meta_key,true)=='') {
		 update_post_meta($meta_value+1000, $meta_key,1);
		 } 
	   }
	   else {
	        delete_post_meta(($page->ID)+1000, $meta_key);
	   }
	   if(isset($_POST['cc2'])=='chk')   // for post description box checked or unchecked
	   {
	  	$meta_value=sanitize_text_field($_POST['descriptio'.$k]);
		 if(get_post_meta($meta_value+1000, $meta_field,true)=='') {
		 update_post_meta($meta_value+1000, $meta_field,1);
		 }
	   }
	   else {
	        delete_post_meta(($page->ID)+1000, $meta_field);
	   }
	$j++;
	$k++;
	}
    $meta_value= 100000;
   if(esc_attr($_POST['cc1'])=='cc1') 
   {
	 if(get_post_meta($meta_value, 'set_title',true)=='') {
	 update_post_meta($meta_value,'set_title',1);
	 }
   }
   else {
      update_post_meta($meta_value,'set_title',2);
   } 
   }
	?>
	<?php include_once dirname( __FILE__ ) . '/dmiu-html.php'; ?>
    <?php
   }
?>