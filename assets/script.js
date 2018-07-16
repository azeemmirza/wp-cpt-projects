jQuery(document).ready(function () {
    var $ = jQuery;
    var
        imgForm = '<div class="image-block"> <img src="/" class="preview-img"><input id="upload_image" type="text" size="36" name="upload_image" value="" /><input id="upload_image_button" type="button" value="Upload Image" class="button"/></div>',
    textForm = '<div class="text-block"><textarea name=""></textarea></div>',
    formWrap = $('#form-wrap');

    $('#add-image-meta').click( function () {
        formWrap.append(imgForm);
    });

    $('#add-text-meta').click(function () {
        formWrap.append(textForm);
    });


    jQuery('#upload_image_button').click(function() {

        console.log('1');
        var formfield = $('#upload_image').attr('name');
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
        window.send_to_editor = function(html) {
            var imgurl = $(html).attr('src');
            $('#upload_image').val(imgurl);
            $('#preview-img').attr('src',imgurl);
            console.log('02');
            tb_remove();
        }

        return false;
    });


});


