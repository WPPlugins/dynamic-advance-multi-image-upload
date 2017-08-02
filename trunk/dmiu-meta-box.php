<?php

/*
 * add meta box in page and post
 * */
function dmiu_meta_box()
{
    global $post;
	$meta_field='description_field';
	$meta_key='plug_me';
    $values = esc_attr(get_post_custom( $post->ID ));
	$data=esc_attr(get_post_meta(($post->ID)+1000, $meta_key,true));
	$data1=explode('~',$data);
    $field=esc_attr(get_post_meta(($post->ID)+1000,$meta_field,true));
    $title_image=esc_attr(get_post_meta(100000, 'set_title',true));
	?>
	<div class="frm_i imgupload-contain">
        <h3 class="shotcode-title"><?php _e('Shortcode: <strong>[dmiu dmiu_id=');echo esc_attr($post->ID); ?><?php _e(']</strong>');?></h3>
		<input type="hidden" class="modi" value="0" />
		<input type="hidden" class="chk_fld" value="<?php echo esc_attr($field); ?>" />
		<input type="hidden" class="title_i" value="<?php echo esc_attr($title_image); ?>" />
		<div class="img-up-row">
			<?php
			$i_set=1;
			foreach($data1 as $d)
			{
				$dat2=explode('|',$d);
		    ?>
		        <div id="delk" class="frm_field img-upload-box ">
		            <div class="close1 dashicons dashicons-minus"></div>
		            <div class="moree dashicons dashicons-plus"></div>
		    		<div class="img-box fImgs">
		        		<img class="fImg" src="<?php if(esc_attr($dat2[0]) !=1) echo esc_attr($dat2[0]); ?>" />
		        	</div>
		            <input type="hidden" id="i1" class="img1"  name="i1" value="<?php echo esc_attr($dat2[0]); ?>" size="50" />  
		            <p><input type="text"  name="t1" class=" tt txt<?php echo $i_set++; ?>" value="<?php echo esc_attr($dat2[1]); ?>" placeholder="<?php _e('Image Title');?>" /></p>
		            <?php if($field==1) { ?>
		                <p>
		                    <textarea placeholder="<?php _e('Description');?>" name="area1" class="area1" value="<?php echo esc_attr($dat2[2]); ?>"/><?php if(!empty($dat2[2])) echo esc_attr($dat2[2]); ?></textarea>
		                </p>
		            <?php } ?>
		            <div class="clearfix"></div>
		        </div>
	        <?php } ?> 
        </div>
        <input class="page_id" type="hidden" name="page_id" value="<?php echo ($post->ID)+1000; ?>" id="page_id"/>
	    <input type="hidden" name="total" value="<?php echo $i_set-1; ?>" class="field11"/>  
    </div>
<?php 
}
