(function ($) {

  var ajaxurl = narrative_lite_admin.ajax_url;
  var ajaxNonce = narrative_lite_admin.ajax_nonce;

  $('.wedevs-dismiss-notice').click(function(){
    
    var currentElement = $(this);
    var data = {
          'action': 'narrative_lite_about_notice_dismiss',
          '_wpnonce': ajaxNonce,
      };

      $.post(ajaxurl, data, function( response ) {

          $(currentElement).closest('#wedevs-greeting-panel').remove();
          
      });

  });


  // Image Upload
    jQuery(document).on('click', '.wedevs-img-upload-button', function( event ){

    event.preventDefault(); 
    var imgContainer = $(this).closest('.wedevs-img-fields-wrap').find( '.wedevs-thumbnail-image .wedevs-img-container'),
    removeimg = $(this).closest('.wedevs-img-fields-wrap').find( '.wedevs-img-delete-button'),
    imgIdInput = $(this).siblings('.upload-id');
    var frame;

    // Create a new media frame
    frame = wp.media({
        title: narrative_lite_admin.title,
        button: {
        text: narrative_lite_admin.label
        },
        multiple: false  // Set to true to allow multiple files to be selected
    });

    // When an image is selected in the media frame...
    frame.on( 'select', function() {

        // Get media attachment details from the frame state
        var attachment = frame.state().get('selection').first().toJSON();
        // Send the attachment URL to our custom image input field.
        imgContainer.html( '<img src="'+attachment.url+'" style="width:200px;height:auto;" />' );
        removeimg.addClass('wedevs-img-show');

        // Send the attachment id to our hidden input
        imgIdInput.val( attachment.id ).trigger('change');

    });

    // Finally, open the modal on click
    frame.open();

  });

  // DELETE IMAGE LINK
  $('.wedevs-img-delete-button').click( function(){

      event.preventDefault();
      var imgContainer = $(this).closest('.wedevs-img-fields-wrap').find( '.wedevs-thumbnail-image .wedevs-img-container');
      var removeimg = $(this).closest('.wedevs-img-fields-wrap').find( '.wedevs-img-delete-button');
      var imgIdInput = $(this).closest('.wedevs-img-fields-wrap').find( '.upload-id');

      // Clear out the preview image
      imgContainer.find('img').remove();
      removeimg.removeClass('wedevs-img-show');

      // Delete the image id from the hidden input
      imgIdInput.val( '' ).trigger('change');

  });

  // Remove IMAGE AFTER CATEGORY CREATED LINK
  $(document).ajaxSuccess(function(e, request, settings){

      var object = settings.data;
      if( typeof object == 'string' ){

          var object = object.split("&");

          if( object.includes( 'action=add-tag' ) && object.includes( 'screen=edit-category' ) && object.includes( 'taxonomy=category' ) ){
              
              $('.wedevs-img-delete-button').removeClass('wedevs-img-show');
              $('.upload-id').attr('value','');
              $('.wedevs-img-container').empty();

          }

      }

  });
  
  // Installing Plugins
  $('.theme-recommended-plugin .recommended-plugin-status').click(function(){
        
        var id = $(this).closest('.about-items-wrap').attr('id');

        $(this).addClass('wedev-activating-plugin')
        var PluginName = $(this).closest('.theme-recommended-plugin').find('h2').text();
        var PluginStatus = $(this).attr('plugin-status');
        var PluginFile = $(this).attr('plugin-file');
        var PluginFolder = $(this).attr('plugin-folder');
        var PluginSlug = $(this).attr('plugin-slug');
        var pluginClass = $(this).attr('plugin-class');

        var data = {
            'single': true,
            'PluginStatus': PluginStatus,
            'PluginFile': PluginFile,
            'PluginFolder': PluginFolder,
            'PluginSlug': PluginSlug,
            'PluginName': PluginName,
            'pluginClass': pluginClass,
            'action': 'narrative_lite_install_plugins',
            '_wpnonce': ajaxNonce,
        };
 
        $.post(ajaxurl, data, function( response ) {
            
            var active = narrative_lite_admin.active
            var deactivate = narrative_lite_admin.deactivate
            $('#'+id+' .recommended-plugin-status').empty();

            if( response == 'Deactivated' ){
                
                $('#'+id+' .theme-recommended-plugin').removeClass('recommended-plugin-active');
                $('#'+id+' .recommended-plugin-status').removeClass('wedev-plugin-active');
                $('#'+id+' .recommended-plugin-status').addClass('wedev-plugin-deactivate');
                $('#'+id+' .recommended-plugin-status').html(active);
                $('#'+id+' .recommended-plugin-status').attr('plugin-status','deactivate');

            }else if( response == 'Activated' ){
                
                $('#'+id+' .theme-recommended-plugin').addClass('recommended-plugin-active');
                $('#'+id+' .recommended-plugin-status').removeClass('wedev-plugin-deactivate');
                $('#'+id+' .recommended-plugin-status').addClass('wedev-plugin-active');
                $('#'+id+' .recommended-plugin-status').html(deactivate);
                $('#'+id+' .recommended-plugin-status').attr('plugin-status','active');

            }else{
                
                $('#'+id+' .theme-recommended-plugin').removeClass('recommended-plugin-active');
                $('#'+id+' .recommended-plugin-status').removeClass('wedev-plugin-not-install');
                $('#'+id+' .recommended-plugin-status').addClass('wedev-plugin-active');
                $('#'+id+' .recommended-plugin-status').html(active);
                $('#'+id+' .recommended-plugin-status').attr('plugin-status','deactivate');

            }

            $('.recommended-plugin-status').removeClass('wedev-activating-plugin');
            
        });
    });
    
}(jQuery));