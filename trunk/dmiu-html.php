<?php /*
* 
* DMIU post and page selection and title and description setting
* */
?>
<h3 class="set-title"><?php _e('Settings'); ?></h3>
<form action="" method="post">
    <div class="srting-outer">
        <div class="col-row tbl-btm">
            <table width="80.3%" cellspacing="0" cellpadding="10px">
                <tr>
                    <td width="33.5%"><?php _e('Title Settings');?></td>
                    <td><input type="checkbox" class="title_setting" name="cc1"  value="cc1" /><?php _e('All Pages, Posts');?></td>
                    <td><input type="checkbox" name="" disabled="disabled" /><?php _e('Individual Pages');?> <span class="warning"><?php _e('(In Next Version)');?></span></td>
                </tr>
                <tr>
                    <td width="33.5%"><?php _e('Description Settings');?></td>
                    <td><input type="checkbox" name="cc2" class="des_setting" value="chk" /><?php _e('All Pages, Posts');?></td>
                    <td><input type="checkbox" name="" disabled="disabled" /><?php _e('Individual Pages');?><span class="warning"><?php _e('(In Next Version)');?></span></td>
                </tr>
            </table>
        </div>
        <div class="col-row">
            <div class="type-cell typcel-head"><?php _e('Page List');?></div>
            <div class="type-cell typcel-head"><?php _e('Post List');?></div>
        </div>
        <div class="col-row">
            <div class="type-cell">
                <?php 
                    $meta_key='plug_me';
                    $meta_field='description_field';
                    $pages=get_pages(); 
                    $j=0;$k=0;
                    foreach ( $pages as $page ) {
                        if(get_post_meta(($page->ID)+1000, $meta_field,true)!='') { ?> 
                            <script> jQuery(document).ready(function($) { 
                                $('.des_setting').attr('checked',true); }); 
                            </script> 
                        <?php }
                        if(get_post_meta(100000, 'set_title',true)==1) { ?> 
                            <script> jQuery(document).ready(function($) { 
                                $('.title_setting').attr('checked',true); }); 
                            </script> 
                        <?php }else { ?>
                        <script> jQuery(document).ready(function($) { $('.title_setting').attr('checked',false); }); </script>
                        <?php } ?>
                <div class="plisting">
                    <input type="hidden" class="descrip"  name="description<?php echo  $j; ?>" value="<?php echo $page->ID;?>" />
                    <input  type="checkbox" name="vehicle<?php echo $j++; ?>" value="<?php echo $pid=$page->ID; ?>" 
                    <?php if(get_post_meta($pid+1000, $meta_key,true)!='') {?> checked="checked" <?php } ?> ><?php echo $page->post_title; ?>
                </div>
                <?php } ?>
            </div>
            <div class="type-cell">
                <?php
                    $j=0;$k=0;
                    $postlist = get_posts('posts_per_page=50');
                    $posts = array();
                    foreach ( $postlist as $post ) {
                         if(get_post_meta(($post->ID)+1000, $meta_field,true)!='') {?> <script> jQuery(document).ready(function($) { 
                         $('.des_setting').attr('checked',true); }); </script> <?php } 
                    ?>
                    <div class="plisting">
                        <input type="hidden" class="descrip" name="descriptio<?php echo  $j; ?>" value="<?php echo $pid=$post->ID;?>" />
                        <input type="checkbox" name="vehicl<?php echo $j++; ?>" value="<?php echo $pid=$post->ID;?>" 
                        <?php if(get_post_meta($pid+1000, $meta_key,true)!='') {?> checked="checked" <?php } ?> ><?php echo $post->post_title; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-row">

        </div>
    </div>
<input type="submit" value="<?php _e('Submit')?>" name="subme" class="button button-primary button-large" />
<input type="hidden" class="title_image" name="title_image" value="1" />
</form>
