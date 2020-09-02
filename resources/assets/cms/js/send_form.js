window.SendForm = {};

SendForm.init = function(el, referrer) {


    var action = $(el).attr('action');
    var method = $(el).attr('method');

    $(el).find('#response-status').html('');

    var data = new FormData(el);

    $.ajax({
        url: action,
        type: method,
        data: data,
        processData: false,
        contentType: false,
        success: function(response) {
            window.location.replace(referrer);
        },
        error: function(response) {
            var response_errors = [];
            if (typeof response.responseJSON.errors !== undefined) {
                $.each(response.responseJSON.errors, function (key, value) {
                    response_errors.push(value[0]);
                });
            }
            // console.log(response_errors);

            var error_html = '<div class="alert alert-warning"><ul>';

            $.each(response_errors, function(index, error_message) {
                error_html += '<li>' + error_message + '</li>';
            });

            error_html += '</ul></div>';
            $(el).find('#response-status').html(error_html);
            //console.log(response);
        }
    });
    return false;
}
