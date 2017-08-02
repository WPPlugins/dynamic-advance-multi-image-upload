<?php
/*
 * plugin shortcode generation
 * */
function form_creation1($dmiu_att){
	global $wpdb;
$table_name = $wpdb->prefix . 'postmeta';
 $dmiu_att=shortcode_atts( 
    array(
      'dmiu_id' => ''), $dmiu_att);

	global $wpdb;
		$dmiu_att['dmiu_id']=intval($dmiu_att['dmiu_id'])+1000;
		$cc=intval($dmiu_att['dmiu_id']);
		$res=$wpdb->get_results("select * from `$table_name` where `meta_key`='plug_me' and `post_id`='$cc'");?>
		<div class="dmiubody"><?php
		foreach($res as $akk)
		$fg= $akk->meta_value;
		$dmiutes=explode('~',$fg);
		foreach($dmiutes as $fi)
		{
			$ki=explode('|',$fi); ?>
            <div class="d-image-float">
                <img class="dmiu_img" src="<?php echo esc_url($ki[0]); ?>" >
                <div class="dmiu_titl"><?php echo esc_attr($ki[1]); ?></div>
                <div class="dmiu_desc"><?php echo esc_attr($ki[2]);?></div>
            </div>
		<?php
        }
		?>
		</div>
		<?php
        }
add_shortcode('dmiu', 'form_creation1');
?>