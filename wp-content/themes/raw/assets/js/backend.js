"use strict";

(function ($) {

    var file_frame;

    $('.upload_image_button').live('click', function (event) {

        var formfield = jQuery(this).prev().attr('id');

        event.preventDefault();

        if (file_frame) {
            file_frame.open();
            return;
        }

        file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Portfolio Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        file_frame.on('select', function () {
            var attachment = file_frame.state().get('selection').first().toJSON();
            jQuery('#' + formfield).val(attachment.url);
        });

        file_frame.open();

    });

    $('.wave-setup-button').click(function () {

        var button = $(this);
        var spinner = button.siblings('.wp-spinner');
        var cell = button.parents('td');
        var status = cell.find('.admin-status');
        var icon = cell.find('.admin-status-icon span');
        var fieldset = cell.find('fieldset');
        var action = button.attr('data-action');

        button.attr('disabled', true);
        spinner.removeClass('inactive');

        $.post(ajaxurl, {action: action}, function (response) {
            spinner.addClass('inactive');
            if (response == "ok") {
                fieldset.hide();
                status.attr('data-test', '1');
                icon.removeClass('cross');
                icon.addClass('tick');
            } else {
                alert(response);
            }
        });

    });


    $('#button-demo-import').click(function () {

        var button = $(this);
        var spinner = button.siblings('.wp-spinner');
        var cell = button.parents('td');
        var status = cell.find('.admin-status');
        var icon = cell.find('.admin-status-icon span');
        var fieldset = cell.find('fieldset');

        button.attr('disabled', true);
        spinner.removeClass('inactive');

        $.post(ajaxurl, {action: 'demo_import'}, function (response) {
            spinner.addClass('inactive');
            if (response == "ok") {
                fieldset.hide();
                status.attr('data-test', '1');
                icon.removeClass('cross');
                icon.addClass('tick');
            } else {
                alert(response);
            }
        });

    });

    var current_active_tab = null;

    $.fn.wave_color_picker = function () {
        $(this).spectrum({
            showInput: true,
            showInitial: true,
            showPalette: true,
            clickoutFiresChange: true,
            maxSelectionSize: 10,
            preferredFormat: "hex",
            hide: function (color) {
                jQuery(this).val(color.toHexString());
            },
            palette: PolarAdmin.ColorPicker.palette
        });
    };

    function wave_redux_activate_tab() {

        var tab = $('#redux-opts-main').children('.redux-opts-group-tab').eq(current_active_tab);

        if (tab.hasClass('wave-ui-added')) {
            return;
        }

        tab.addClass('wave-ui-added');

        tab.find(".chosen-select").chosen();

        tab.find('input.icheck').iCheck({
            labelHover: false,
            cursor: true
        });

        tab.find('input.icheck[value="1"]').on('ifChanged', function () {

            var checkbox = $(this);
            var spinner = checkbox.siblings('.wp-spinner');
            var cell = checkbox.parents('td');
            var status = cell.find('.admin-status');
            var icon = cell.find('.admin-status-icon span');
            var fieldset = cell.find('fieldset');

            if (checkbox.prop('checked')) {
                if (status.attr('data-test') == '0') {
                    icon.removeClass('tick');
                    icon.addClass('cross');
                }
                else {
                    icon.removeClass('cross');
                    icon.addClass('tick');
                }
            }
            else {
                icon.removeClass('cross');
                icon.addClass('tick');
            }

        });

        tab.find('.spectrum-palette').wave_color_picker();

    }

    setInterval(function () {
        var active_tab = $('#redux-opts-group-menu').find('li.active').index();

        if (current_active_tab !== active_tab) {
            current_active_tab = active_tab;
            wave_redux_activate_tab();
        }

    }, 500);

    $("#page-sections ul.sections-list").sortable({
        placeholder: "placeholder",
        stop: function () {
            $(this).find("li").each(function (key) {
                $(this).find("input").val(key + 1);
            });
        }
    });

    $("[data-slider]")
        .each(function () {
            var input = $(this);
            $("<span>").addClass("output").insertAfter($(this)).data("input", input);
        })
        .bind("slider:ready slider:changed", function (event, data) {
            var output = $(this).nextAll(".output:first");
            output.html(output.data("input").val());
        })
        .trigger("slider:ready");

    function iconsSelect() {

        var field_name = $(this).attr("name");

        $(this).hide().addClass("icons-select");

        var icon = $('<i></i>').addClass("icon").addClass("icon-" + $(this).val());
        var select = $('<div class="select-icon"></div>').append(icon);

        select.click(function () {
            tb_show('Select an icon', 'admin-ajax.php?action=dialog_select_icon&field_name=' + field_name);
        });

        $(this).after(select);
    }

    $('.rwmb-field.icons-select .rwmb-input input').each(iconsSelect);




    $("#font-tabs").tabs();


    function select_active_fonts(){

        var field = $('input#fonts');

        if(field.length > 0){

            var fonts = field.val().split(',');
            var item, link;

            $.each(fonts, function(index, font){

                item = $('li[data-font="' + font + '"]');
                link = item.find('a.font-toggle');

                item.addClass('active');
                link.html('Deactivate');

            });


            console.log(fonts);

        }


    }

    select_active_fonts();



    $('.google-fonts-list li').click(function(){

        var item = $(this);
        var link = item.find('a.font-toggle');
        var font = item.attr('data-font');
        var field = $('input#fonts');
        var fonts = field.val().split(',');

        if(fonts[0] == ''){
            fonts = [];
        }

        item.toggleClass('active');

        var active = item.hasClass('active');

        if(active){
            fonts.push(font);
            field.val(fonts.join(','));
            link.html('Deactivate');
        }
        else{
            var value = [];

            $.each(fonts, function(){
                if(this != font){
                    value.push(this);
                }
            });

            field.val(value.join(','));
            link.html('Activate');
        }

        console.log(field.val());

        return false;

    });




})(jQuery);

var PolarAdmin = {};

PolarAdmin.call = function (action, data, callback) {
    data.action = action;
    jQuery.post(ajaxurl, data, callback);
};

PolarAdmin.Markers = {

    init: function () {

        var $ = jQuery;

        jQuery("input.add-marker").click(function () {
            PolarAdmin.Markers.addRow("", "", "");
        });

        this.length = $("table.google-maps-locations").find("tr").length - 1;

    },

    getNextIndex: function () {

        var index = 0;

        while (true) {

            if (jQuery("table.google-maps-locations").find('tr[data-marker-id="' + index + '"]').length == 0) {
                return index;
            }

            index++;

        }

    },

    remove: function (event) {
        jQuery(jQuery(event.target).parents("tr").get(0)).remove();
    },

    addRow: function (latitude, longitude, text) {

        var $ = jQuery;
        var table = $("table.google-maps-locations");

        var index = PolarAdmin.Markers.getNextIndex();

        var fields = {};
        fields.latitude = $("<input>").attr("type", "text").attr("name", "wave_raw_theme[contact_map_markers][" + index + "][latitude]").addClass("regular-text").val(latitude);
        fields.longitude = $("<input>").attr("type", "text").attr("name", "wave_raw_theme[contact_map_markers][" + index + "][longitude]").addClass("regular-text").val(longitude);
        fields.text = $("<textarea>").attr("rows", "4").attr("name", "wave_raw_theme[contact_map_markers][" + index + "][text]").addClass("large-text").val(text);

        var row = $("<tr>").attr("data-marker-id", index);

        row.append($("<td>").append(fields.latitude));
        row.append($("<td>").append(fields.longitude));
        row.append($("<td>").append(fields.text));
        row.append($("<td>").html('<a class="button" href="javascript:void(0);" onclick="PolarAdmin.Markers.remove(event);">&#215;</a'));

        table.append(row);

        this.length++;

    }

};

PolarAdmin.ColorPicker = {

    palette: [],

    fields: {},

    rebuildPalette: function () {

        var palette = [];
        var colors = wave_admin_colors;
        var row = [];

        var $ = jQuery;

        $.each(colors, function (color) {
            if (row.length == 4) {
                palette.push(row);
                row = [];
            }
            row.push(color);
        });

        if (row.length > 0) {
            palette.push(row);
        }

        PolarAdmin.ColorPicker.palette = palette;
    }

};

PolarAdmin.ColorPicker.rebuildPalette();
PolarAdmin.Markers.init();





