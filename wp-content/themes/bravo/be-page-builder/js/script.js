;(function($){
	var current_browse_button;
    var doc = {
        ready: function(){
       		be_pb_media.init();
        }
    },
    be_pb_media = {

        media_send_attachment: null,
        media_close_window: null,
        init: function(){
            $(document).on('click','.btn_browse_files',be_pb_media.browse_clicked);
        },
        browse_clicked: function(event) {
            current_browse_button = jQuery(this);
            event.preventDefault();
	
        	wp.media.editor.send.attachment = be_pb_media.media_accept;    
           
            be_pb_media.media_send_attachment = wp.media.editor.send.attachment;
            be_pb_media.media_close_window = wp.media.editor.remove;

           
            wp.media.editor.send.attachment = be_pb_media.media_accept;
            wp.media.editor.remove = be_pb_media.media_close;

			jQuery( ".browsed-images-container" ).sortable({ revert: true });
			jQuery( ".browsed-images-container" ).disableSelection();
           	wp.media.editor.open();
        },
		media_accept: function(props, attachment){
			if(current_browse_button.hasClass('single'))
				current_browse_button.closest('.right-section').find('.browsed-images-container').empty();
			console.log(props);
			console.log(attachment);
			var images_container = current_browse_button.closest('.right-section').find('.browsed-images-container');
			var input_name = images_container.attr('data-name');
			images_container.append('<div class="seleced-images-wrap"><input type="hidden" name="'+input_name+'[]" value="'+attachment.id+'" /><img src="'+attachment.url+'" /><span class="remove"></span></div>');
       },
        media_close: function(id){

            wp.media.editor.send.attachment = be_pb_media.media_send_attachment;
            wp.media.editor.remove = be_pb_media.media_close_window;

            be_pb_media.media_send_attachment= null;
            be_pb_media.media_close_window= null;

            wp.media.editor.remove(id);
        }
    };
    $(document).ready(doc.ready);
})(jQuery);

jQuery(function() {

	var shortcode_dialog = jQuery("#shortcodes"),
		shortcode_form = jQuery("#shortcode-form"),
		main = jQuery("#be-pb-main"),
		edit_shortcode = jQuery('#edit-shortcode'),
		ajax_url = jQuery('#ajax_url').val(),
		$delete_item,
		$current_add_shortcode_block = jQuery('.be-pb-column'),
		$current_shortcode_element;
		
		jQuery( ".be-pb-sortable" ).sortable();
		
		doSort();

		jQuery( ".portlet" ).addClass( "ui-helper-clearfix" );


		jQuery('.be-pb-color-field').wpColorPicker();	
	
		jQuery( "#dialog-confirm" ).dialog({
			resizable: false,
			modal: true,
			autoOpen: false,
			buttons: {
				"Ok": {
					"class" : 'bluefoose-button-light',
					"text"	: 'Delete',
					"click" : function() {
						$delete_item.fadeOut(function(){
							jQuery(this).remove();
						});
						jQuery( this ).dialog( "close" );
					}
				},
				"Cancel": {
					"class" : 'bluefoose-button-light',
					"text"	: 'Cancel',
					"click" : function() {
						jQuery( this ).dialog( "close" );
					}
				}
			}
		});
		jQuery( "#dialog-notification" ).dialog({
			resizable: false,
			modal: true,
			autoOpen: false,
			buttons: {
				"Ok": {
					"class" : 'bluefoose-button-light',
					"text"	: 'Ok',
					"click" : function() {
						jQuery( this ).dialog( "close" );
					}
				}
			}
		});
		jQuery(".ui-dialog-titlebar").remove();

		main.on('click','.icon-delete',function(){
			$delete_item = jQuery(this).closest('.portlet');
			jQuery( "#dialog-confirm" ).dialog('open');
		});

		main.on('click','.choose-shortcode',function(e){
			//$current_add_shortcode_block = jQuery(this).closest('.be-pb-controls').prev('.be-pb-column');
		    e.preventDefault();
			shortcode_dialog.dialog( "open" );
		});


		edit_shortcode.dialog({
			width: 960,
	      	height: jQuery(window).height()-100,
	      	maxHeight: '1000',
	     	modal: true,
			autoOpen: false			
		});

		shortcode_dialog.dialog({
			width: 960,
	      	height: jQuery(window).height()-100,
	      	maxHeight: '1000',
	     	modal: true,
			autoOpen: false
	    });

		shortcode_dialog.on('dialogclose',function(e){

			removeEditorControls(shortcode_form);
			shortcode_form.html('');
		});

		edit_shortcode.on('dialogclose',function(e){
			removeEditorControls(edit_shortcode);
			edit_shortcode.html('');
		});

		main.on('click','.edit-shortcode',function(e){
			e.preventDefault();
			shortcode = jQuery(this).parent().next();
			$current_shortcode_element = jQuery(this).closest('.be-pb-element');
		
			edit_shortcode.dialog('open');
			shortcode_html=encodeURIComponent(shortcode.html());
			jQuery.ajax({
				type: "POST",
				url: ajax_url,
				data: "action=edit_shortcode_form&shortcode="+shortcode_html+"&test=swami",
				success	: function(msg) {
					removeEditorControls(edit_shortcode);
					edit_shortcode.empty();
					edit_shortcode.html(msg);
					edit_shortcode.find(".be-pb-select, .be-pb-checkbox, .be-pb-radio, .be-pb-file").uniform();
					edit_shortcode.find(".be-pb-sortable").sortable();
					addEditorControls(edit_shortcode);
					attachColorPicker(edit_shortcode);
				},
				error: function(msg) {
					
				},
				complete: function() {
					
				}				

			});	
		});	
		
		jQuery('.insert-shortcode').on('click',function(e){
			e.preventDefault();
			shortcode_dialog.dialog('open');
			jQuery.ajax({
				type: "POST",
				url: ajax_url,
				data: "action=get_shortcode_form&shortcode="+jQuery(this).data('shortcode'),
				success	: function(msg) {
					removeEditorControls(shortcode_form);
					shortcode_form.empty();
					shortcode_form.html(msg);
					shortcode_form.find(".be-pb-select, .be-pb-checkbox, .be-pb-radio, .be-pb-file").uniform();
					addEditorControls(shortcode_form);
					attachColorPicker(shortcode_form);
				},
				error: function(msg) {
					
				},
				complete: function() {
					
				}
			});
		});

		jQuery(document).on('click','.seleced-images-wrap .remove', function(e){
			jQuery(this).closest('.seleced-images-wrap').fadeOut(function(){
				jQuery(this).remove();
			});
		});		

		jQuery(document).on('click','.add-shortcode',function(e){
			e.preventDefault();
			tinyMCE.triggerSave();

			var	shortcode_action = jQuery(this).data('action'),
				form;  
			if(shortcode_action == 'edit'){
				 form = edit_shortcode.find('form');
			}
			else{
				 form = shortcode_form.find('form');
			}
			$ajax_data = "action=get_shortcode_block&shortcode_name="+form.data('shortcode-name')+"&"+form.serialize()+"&shortcode_action="+shortcode_action;
		
			jQuery.ajax({
				type: "POST",
				url: ajax_url,
				dataType: "json",
				data: $ajax_data, //"action=get_shortcode_block&shortcode_name="+form.data('shortcode-name')+"&"+form.serialize()+"&shortcode_action="+shortcode_action,
				success	: function(msg) {
					//alert(msg);
					if(shortcode_action == 'edit'){

						removeEditorControls(edit_shortcode);
						edit_shortcode.html('');
						edit_shortcode.dialog( "close" );
						$current_shortcode_element.hide();						
						$current_shortcode_element.find('.shortcode').html('').append(msg.shortcode);
						if($current_shortcode_element.find('.edit-shortcode').data('shortcode') == 'page_module'){
							$current_shortcode_element.find('.be-pb-element-name').html('Page'+msg.page);
						}
						$current_shortcode_element.fadeIn();

					}
					else {
						removeEditorControls(shortcode_form);
						shortcode_form.html('');
						shortcode_dialog.dialog( "close" );
						$current_add_shortcode_block.append(msg);
					}
					
					
					},
				error: function(msg) {
					
				},
				complete: function() {
					
				}
			});
		});


	jQuery(document).on('click','.remove-tab',function(e){
		e.preventDefault();
		jQuery(this).closest('.be-pb-tab').remove();
	});	


	function doSort(){
		jQuery(".be-pb-column").sortable({
			connectWith: ".be-pb-column"
		}).disableSelection();
	}

	function attachColorPicker($form){
		$form.find('.be-pb-color-field').wpColorPicker();
	}

	function removeEditorControls($form){

		var editors = $form.find('.be-pb-editor');
		editors.each(function(){
			$id = jQuery(this).attr('id');
			window.tinyMCE.execCommand( "mceRemoveControl", true, $id );

		}); 
	}

	function addEditorControls($form){
		var editors = $form.find('.be-pb-editor');
		editors.each(function(){
			$id = jQuery(this).attr('id');
			// quicktags({id:$id});
			window.tinyMCE.execCommand( "mceAddControl", true, $id );

		}); 
	}

		jQuery('#be-pb-save').on('click', function(e){
			e.preventDefault();
			var rows = main.children('.be-pb-row-wrap'),
				output = '',
				html ='';
			html = main.find('.be-pb-column').html();
			html = encodeURIComponent(html);	
			rows.each(function(){
				// output +='[row]';
				columns = jQuery(this).find('.be-pb-col-wrap');
				columns.each(function(){
					//output +='['+jQuery(this).data('col-name')+']';
					elements = jQuery(this).find('.be-pb-element');
					elements.each(function(){
						output += jQuery(this).children('.shortcode').html();
					});
					//output +='[/'+jQuery(this).data('col-name')+']';
				});
				//output +='[/row]';
			});

			//console.log(output);
			output = encodeURIComponent(output);	
			jQuery('#be-pb-loader').show();
			jQuery.ajax({
				
				type: "POST",
				url: ajax_url,
				data: "action=save_be_pb_builder&post_id="+jQuery('#post_ID').val()+"&content="+output+"&html="+html,
				success	: function(msg) {
					jQuery('#be-pb-loader').hide();
					if(msg =='success') {
						jQuery('<div class="notification green">Successfully Saved<span class="close"></span></div>').hide().appendTo('#be-pb-save-wrap').fadeIn();
						
					}
					else if(msg == 'no_changes') {
						jQuery('<div class="notification red">No Changes have been made<span class="close"></span></div>').hide().appendTo('#be-pb-save-wrap').fadeIn();
					}
					setTimeout( "jQuery('#be-pb-save-wrap .notification').fadeOut(500, function() { jQuery(this).remove(); });",2000 );
				},
				error: function(msg) {
					
				},
				complete: function() {
					
				}
			});
		});

	});
