/* Customizer JS Upsale*/
( function( api ) {

	api.sectionConstructor['upsell'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );

jQuery(document).ready(function($) {

    // Initialize select2
  $("#_customize-input-wedev_general_font").selectize();
  
    // Primary Font Wgight Active on font select.
    jQuery('#_customize-input-wedev_general_font').on('change',function(){

        var family = $(this).val();
        var ajaxurl = narrative_lite_customizer.ajax_url;
        var data = {
            'action': 'narrative_lite_fonts_ajax',
            'family': family,
        };
 
        $.post(ajaxurl, data, function( response ) {
            var select = $('#_customize-input-wedev_general_font_weight');
            select.empty().append(response);
             wp.customize( 'wedev_general_font_weight', function ( obj ) {
                obj.set( 'regular' );
            } );

        });

    });

    // Initialize select2
  $("#_customize-input-wedev_heading_font").selectize();
  
    // Primary Font Wgight Active on font select.
    jQuery('#_customize-input-wedev_heading_font').on('change',function(){

        var family = $(this).val();
        var ajaxurl = narrative_lite_customizer.ajax_url;
        var data = {
            'action': 'narrative_lite_fonts_ajax',
            'family': family,
        };
 
        $.post(ajaxurl, data, function( response ) {

            var select;

            select = $('#_customize-input-narrative_lite_h1_font_weight');
            select.empty().append(response);
             wp.customize( 'narrative_lite_h1_font_weight', function ( obj ) {
                obj.set( 'regular' );
            } );

            select = $('#_customize-input-narrative_lite_h2_font_weight');
            select.empty().append(response);
             wp.customize( 'narrative_lite_h2_font_weight', function ( obj ) {
                obj.set( 'regular' );
            } );

            select = $('#_customize-input-narrative_lite_h3_font_weight');
            select.empty().append(response);
             wp.customize( 'narrative_lite_h3_font_weight', function ( obj ) {
                obj.set( 'regular' );
            } );

            select = $('#_customize-input-narrative_lite_h4_font_weight');
            select.empty().append(response);
             wp.customize( 'narrative_lite_h4_font_weight', function ( obj ) {
                obj.set( 'regular' );
            } );

            select = $('#_customize-input-narrative_lite_h5_font_weight');
            select.empty().append(response);
             wp.customize( 'narrative_lite_h5_font_weight', function ( obj ) {
                obj.set( 'regular' );
            } );

            select = $('#_customize-input-narrative_lite_h6_font_weight');
            select.empty().append(response);
             wp.customize( 'narrative_lite_h6_font_weight', function ( obj ) {
                obj.set( 'regular' );
            } );

        });

    });

    // Initialize select2
  $("#_customize-input-wedev_tagline_font").selectize();
  
    // Primary Font Wgight Active on font select.
    jQuery('#_customize-input-wedev_tagline_font').on('change',function(){

        var family = $(this).val();
        var ajaxurl = narrative_lite_customizer.ajax_url;
        var data = {
            'action': 'narrative_lite_fonts_ajax',
            'family': family,
        };
 
        $.post(ajaxurl, data, function( response ) {
            var select = $('#_customize-input-wedev_tagline_font_weight');
            select.empty().append(response);
             wp.customize( 'wedev_tagline_font_weight', function ( obj ) {
                obj.set( 'regular' );
            } );

        });

    });


    // Range Slide
    $('.wedev-range-slide').on('input', function(){
      
      $(this).trigger('change');
      var value = $(this).val();
      
      $(this).closest('.wedevs-range-slider-wrap').find('.current-value-indicator').empty().html(value);

    });

    // Range Slider Set Default

    $('.range-set-default').click(function(){

        var newval = $(this).attr('default-val');
        $(this).closest('.wedevs-range-slider-wrap').find('.wedev-range-slide').val(newval).trigger('change');
        $(this).closest('.wedevs-range-slider-wrap').find('.current-value-indicator').empty().html(newval);
    });

    // Social Icons
    $('.icons-lists li').click(function(){

        var icon = $(this).html();
        $(this).closest('.icon-main-wrap').find('.icon-value').attr('value',icon).trigger('change');
        $(this).closest('.icon-main-wrap').find('.svg-preview').empty();
        $(this).closest('.icon-main-wrap').find('.svg-preview').html(icon);

    });

    $('.wedevs-fa-icons-rep input[type="text"]').each(function(){
        var FAclass = $(this).val();
        $(this).closest('.wedevs-repeater-wrap').find('.title-rep-wrap .wedevs-header-title').text(FAclass);
    });

    // Save Value.
    function narrative_lite_refresh_repeater_values(){

        $(".narrative-lite-repeater-field-control-wrap").each(function(){
            
            var values = []; 
            var current = $(this);
            
            current.find(".wedevs-repeater-wrap").each(function(){
            var valueToPush = {};   

            $(this).find('[data-name]').each(function(){
                var dataName = $(this).attr('data-name');
                var dataValue = $(this).val();
                valueToPush[dataName] = dataValue;
            });

            values.push(valueToPush);
            });

            current.next('.narrative-lite-repeater-collector').val( JSON.stringify( values ) ).trigger('change');
        });

    }

    $("body").on("click",'.narrative-lite-add-control-field', function(){


        var current = $(this).parent();
        if(typeof current != 'undefined') {

            var field = current.find(".wedevs-repeater-wrap:first").clone();
            if(typeof field != 'undefined'){
                
                field.find("input[type='text'][data-name]").each(function(){
                    var defaultValue = $(this).attr('data-default');
                    $(this).val(defaultValue);
                });

                field.find("textarea[data-name]").each(function(){
                    var defaultValue = $(this).attr('data-default');
                    $(this).val(defaultValue);
                });

                field.find(".selector-labels label").each(function(){
                    var defaultValue = $(this).closest('.selector-labels').next('input[data-name]').attr('data-default');
                    var dataVal = $(this).attr('data-val');
                    $(this).closest('.selector-labels').next('input[data-name]').val(defaultValue);

                    if(defaultValue == dataVal){
                        $(this).addClass('selector-selected');
                    }else{
                        $(this).removeClass('selector-selected');
                    }
                });
                
                field.find('.narrative-lite-fields').show();

                current.find('.narrative-lite-repeater-field-control-wrap').append(field);
                $('.accordion-section-content').animate({ scrollTop: current.height() }, 1000);
                narrative_lite_refresh_repeater_values();
            }

            $('.narrative-lite-repeater-field-control-wrap li').removeClass('wedevs-sortable-active');
            $('.narrative-lite-repeater-field-control-wrap li:last-child').addClass('wedevs-sortable-active');
            $('.narrative-lite-repeater-field-control-wrap li:last-child .narrative-lite-repeater-fields').addClass('wedevs-sortable-active extended');
            $('.narrative-lite-repeater-field-control-wrap li:last-child .narrative-lite-repeater-fields').show();

            $('.wedevs-repeater-wrap.wedevs-sortable-active .title-rep-wrap').click(function(){
                $(this).next('.narrative-lite-repeater-fields').slideToggle().toggleClass('extended');
            }); 

            $('.narrative-lite-repeater-field-control-wrap li:last-child .wedevs-header-title').text('Social Profile');

            $('.wedevs-sortable-active .icons-lists li').click(function(){

                var icon = $(this).html();
                $(this).closest('.icon-main-wrap').find('.icon-value').attr('value',icon).trigger('change');;
                $(this).closest('.icon-main-wrap').find('.svg-preview').empty();
                $(this).closest('.icon-main-wrap').find('.svg-preview').html(icon);

            });
            
        }
        return false;
    });
    
    $('.wedevs-repeater-wrap .title-rep-wrap').click(function(){
        $(this).next('.narrative-lite-repeater-fields').slideToggle().toggleClass('extended');
    });

    $("#customize-theme-controls").on("click", ".narrative-lite-repeater-field-remove",function(){
        if( typeof  $(this).parent() != 'undefined'){
            $(this).closest('.wedevs-repeater-wrap').slideUp('normal', function(){
                $(this).remove();
                narrative_lite_refresh_repeater_values();
            });
            
        }
        return false;
    });

    $('#customize-theme-controls').on('click', '.narrative-lite-repeater-field-close', function(){
        $(this).closest('.narrative-lite-repeater-fields').slideUp();
        $(this).closest('.wedevs-repeater-wrap').toggleClass('expanded');
    });

    /*Drag and drop to change order*/
    $(".narrative-lite-repeater-field-control-wrap").sortable({
        axis: 'y',
        orientation: "vertical",
        update: function( event, ui ) {
            narrative_lite_refresh_repeater_values();
        }
    });

    $("#customize-theme-controls").on('keyup change', '[data-name]',function(){
         narrative_lite_refresh_repeater_values();
         return false;
    });

});


wp.customize.controlConstructor['sortable'] = wp.customize.Control.extend({

    ready: function() {

        'use strict';

        var control = this;

        // Set the sortable container.
        control.sortableContainer = control.container.find( 'ul.sortable' ).first();

        // Init sortable.
        control.sortableContainer.sortable({

            // Update value when we stop sorting.
            stop: function() {
                control.updateValue();
            }
        });
    },

    /**
     * Updates the sorting list
     */
    updateValue: function() {

        'use strict';

        var control = this,
            newValue = [];

        this.sortableContainer.find( 'li' ).each( function() {
            newValue.push( jQuery( this ).data( 'value' ) );
        });

        control.setting.set( newValue );
    }
});
