jQuery(document).ready(function($) { 

daimu();
function daimu()
{
	
if($('.chk_fld').val()==1)
    		{
    			
    			$('.img-upload-box').addClass('mod-up-box');
    		}
 if($('.title_i').val()!=1)
    		{
    			
    			$('.tt').attr('type','hidden');
    		}
}

//receive file from wordpress media
  $(document).on('click', '.fImgs', function() {
        current = $(this);        
        if( null !== current) { 
            var dfi_uploader = wp.media({

                title: WP_SPECIFIC.mediaSelector_title,
                button: {
                    text: WP_SPECIFIC.mediaSelector_buttonText
                },
                multiple: false,
            }).on('select', function() {
                var attachment = dfi_uploader.state().get('selection').first().toJSON(),
                    fullSize = attachment.url,
                    imgUrl = (typeof attachment.sizes.thumbnail === "undefined") ? fullSize : attachment.sizes.thumbnail.url,
                    imgUrlTrimmed, fullUrlTrimmed;
                imgUrlTrimmed = imgUrl.replace(WP_SPECIFIC.upload_url, "");
                fullUrlTrimmed = fullSize.replace(WP_SPECIFIC.upload_url, "");
                var featuredBox = current.parents('.frm_field');
                 featuredBox.find('.img1').val(fullSize);
                featuredBox.find('.fImg').attr({
                    'src': fullSize,
                    'data-src': fullSize
                });    
            }).open();  
        }

        return false;

    });  
    
    function iiu() {
    	var inputnum = parseInt($(".field11").val()) + 1;
    			var fld1='';
    		if($('.chk_fld').val()==1)
    		{
    			
    			$('.img-upload-box').addClass('mod-up-box');
    			
    			fld1='<p><textarea name="area1" class="area1" value="" placeholder="Description" /></textarea></p>';
    		}
    		
    	$('.frm_i').append('<div class="frm_field img-upload-box"><div class="close1 dashicons dashicons-minus"></div><div class="moree dashicons dashicons-plus"></div><div class="img-box fImgs"><img class="fImg" src="" /></div><input  class="img1" type="hidden" name="i'+inputnum+'" value="" size="50" /><p><input class="tt txt'+inputnum+'" type="text" name="t'+inputnum+'" placeholder="Image Title" /></p>'+fld1+'</div>');	
    		$('.field11').val(inputnum);
    		
    			daimu();
    }
    // add image title,description 
    $(document).on('click', '.moree', function() {
    	iiu();
    			
    	});
    	// form submit
    	 $('body').on('click', '#publish', function() {
    	    	var xt=$('.field11').val();
    	    	var q1=0;
    	    	for(var i=1; i<=xt;i++)
    	    	{
    	    		
    	    	curr=$('.txt'+i);
    	 	var x=$('.txt'+i).parents('.frm_field').find('.img1').val();
    	 	
    	 if($('.chk_fld').val()==1)
    	 {
    	 	var s=$('.txt'+i).parents('.frm_field').find('.area1').val();
    	 }
    	 	var y=$('.txt'+i).val();
    	 	var z=$('.page_id').val();
    		var l=$('.modi').val();
     
    	var data= { action: 'my_action', 'img': x ,'pg': z , 'titl': y ,'ofset':q1 ,'des': s ,'mod' : l};
    	 jQuery.post(ajaxurl, data, function(response) {
			
		
		});	
		q1=1;$e=0
		while($e<50000000)
		{
			$e++;
		}
		}
    	 });  
    	 // delete images	  
    $(document).on('click', '.close1', function() {
    	$(this).parents('.frm_field').remove();

    	 		var inputnum = parseInt($(".field11").val())-1;
    	 		$('.field11').val(inputnum);
    	 			for(var i=0; i<inputnum;i++)
    	 			{
    	 				var u=i+1;
    	 	$('.frm_field').eq(i).find('input[type=text],select').removeClass();
    	 	$('.frm_field').eq(i).find('input[type=text],select').addClass('txt'+u);
    	 }
    	 
    	if ($('.frm_i').find( ".frm_field:first" ).length ) {
    	  	
    	  
    	  }
    	  else
    	  {
    	  	iiu();
    	  	$('.modi').val(1);
    	  }
    	  
    	
    });
});