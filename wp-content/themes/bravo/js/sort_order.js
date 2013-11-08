jQuery(document).ready(function(){
	jQuery('.bravo-sort-order').sortable();
	
	jQuery('#bravo-sort-save').on('click',function(){
		$posts = jQuery('.bravo-sort-order').find('li');	
		$ids = [];
		ajax_url = jQuery('#ajax_url').val();
		$posts.each(function(){
			$ids.push(jQuery(this).data('post-id'));
		});
		
		$ajax_data = { 'action':'bravo_save_sort_order', 'post_id' : $ids };
		console.log($ajax_data);
		jQuery.ajax({
				type: "POST",
				url: ajax_url,
				data: $ajax_data, //{ 'action':'save_sort_order', 'post_id' : $ids }, //"action=save_sort_order&post_id[]="+$ids,
				success	: function(msg) {
					alert('Saved Successfully');	
					
				},
				error: function(msg) {
					
				},
				complete: function() {
					
				}
		});
	});

});