
$(document).ready(function () {
    $('.tagsinput').tagsinput({
        tagClass: 'label label-primary'
    });

    $(".select2_demo_1").select2();

    $('#thumbnail').on('change', function () {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('#name_thumbnail').addClass("selected").html(fileName);
    });

    $('#thumbnail_url').bind('input', function () {
        $('#preview').attr('src', $(this).val());
    });

    $('#content').summernote({
        height: 300, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        callbacks: {
            onImageUpload: function (image) {
                uploadImage(image[0]);
            },
            onMediaDelete: function ($target, $editable) {
                deleteImage($target.attr('src'));

            },
            onPaste: function (e) {
                var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                e.preventDefault();
                setTimeout(function () {
                    document.execCommand('insertText', false, bufferText);
                }, 10);
            }
        }
    });

    var token = $('input[name=_token]').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });

    function uploadImage(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: '/admin/image/upload',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "post",
            success: function (data) {
                var image = $('<img>').attr({
                    src: window.location.protocol + '//' + window.location.hostname + '/' + data['url'],
                    width: '100%'
                });
                $('#content').summernote("insertNode", image[0]);
                console.log('Upload hình thành công!');
            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    function deleteImage(url) {
        var data = new FormData();
        data.append("url", url);
        $.ajax({
            url: '/admin/image/delete',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "post",
            success: function (data) {
                console.log('Xóa hình thành công!');
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
});
