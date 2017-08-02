<?php

/*
 * form submission through ajax(for ajax only)
 * */
function dmu_callback() {
	   global $wpdb; 
	   $meta_key='plug_me';
	   $pagee=intval($_POST['pg']) ;
	   $title=sanitize_text_field($_POST['titl']);
	   $img=esc_url($_POST['img']);
	   $des=sanitize_text_field($_POST['des']);
	if(strlen($img)>7 && isset($title) && isset($pagee))
	  {  
	   $str=$img.'|'.$title.'|'.$des;
       $data=get_post_meta($pagee, $meta_key,true);
	  if($data==1)
	  {
	     update_post_meta($pagee,$meta_key, $str);
	  }
	  else {
	     if(intval($_POST['ofset'])=='1' ) {
	      	 $str=$data.'~'.$str;
		 }
			 update_post_meta($pagee,$meta_key, $str);    
	  }
	    unset($img);
		unset($pagee);
		unset($title);
	  }
	else	
		{
			if( intval($_POST['mod'])==1)
			{
			  update_post_meta($pagee,$meta_key,1);
			}
		}
wp_die();
}
?>