window.App = {};

App.imagePreview = function() {
    $('.select_image').on('change', function(){
        var src = $(this);
        var target = $(this).parent().find('.target');
        var fr = new FileReader();

        fr.onload = function(){
            target.attr('src', fr.result);
        }
        fr.readAsDataURL(src[0].files[0]);
    });
}


App.textEditor = function() {
    CKEDITOR.replace('editor', {
        height:400
    });
}

App.multiSelect = function() {
    $('.multiselect').multiSelect();
}

App.sortable = function() {
    if ($('#sortable').length > 0) {
        var url = $('#sortable').data('action');
        $('#sortable').sortable({
            revert: true,
            handle: ".sortable",
            stop: function (event, ui) {
                var data = $(this).sortable('serialize');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    data: data,
                    url: url,
                    success: function (msg) {
                        // console.log(msg);
                        if (msg) {
                            alertify.success("İşlem Başarılı");
                        } else {
                            alertify.error("İşlem Başarısız");
                        }
                    }
                });

            }
        });
    }
    // $('#sortable').disableSelection();
}

// App.select2 = function() {
//     $('.select2').select2({
//             tags: true,
//         });
// }
