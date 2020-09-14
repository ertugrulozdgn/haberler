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

// App.select2 = function() {
//     $('.select2').select2({
//             tags: true,
//         });
// }
