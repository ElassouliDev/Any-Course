var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

$('[data-action="change-password"]').click(function () {
    $('#change-password').modal('show');
});


$('[data-action="edit-profile"]').click(function () {
    $('#edit-profile').modal('show');
});
$('[data-action="logout"]').click(function () {
    $('#logout').submit();
});


$("#edit-profile form").submit(function (event) {
    event.preventDefault();
    var $this = $(this);

    notifications.loading.show();

    var posted_data = new FormData(this),
    url = $this.attr('action'),
    request = $.ajax({
        url: url,
        method: "post",
        data: posted_data,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false
    });
    request.done(function (response) {

      $('.image_admin').attr('src',BASE_URL+'/'+response.user.image);
        $('.name_admin').html(response.user.name);
        $('#edit-profile').modal('hide');
        http.success(response, true);

    });
    request.fail(function (response, exception) {
        http.fail(JSON.parse(response.responseText), true);
    });

});

// $('.name_admin').text(11);
$("#change-password").submit(function (event) {
    event.preventDefault();
    var $this = $(this);
    notifications.loading.show();
    var posted_data = $this.find('form').serialize() /*+ "&_token=" + $("meta[name='csrf-token']").attr("content")*/;
    $.post(BASE_URL + "/admin/change-password", posted_data,
        function (response, status) {
            $this.find('[type="reset"]').click();
            $this.find('select').val('').trigger('change');
            $this.modal('hide');
            http.success(response, true);
        })
        .fail(function (response) {
            http.fail(JSON.parse(response.responseText), true);
        });
});


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

Array.prototype.slice.call(document.querySelectorAll('.js-switch')).forEach(function (element) {
    new Switchery(element, {size: "small"});
});


/*
$(function () {
    $.fn.datepicker.defaults.language = 'ar';

    $('[datepicker]').livequery(function () {
        $('[datepicker]').datepicker({
            format: "yyyy/mm/dd",
            weekStart: 6,
            todayBtn: "linked"
        });
    });

    $('[monthpicker]').livequery(function () {
        $('[monthpicker]').datepicker({
            format: "yyyy/mm",
            viewMode: "months",
            minViewMode: "months",
            weekStart: 6
        });
    });
});
*/


$('[data-action="branch-change"]').change(function () {
    var $this = $(this);

    notifications.loading.show();

    $.get(BASE_URL + '/companies/branches/' + $this.val() + '/switch',
        function (response, status) {
            http.success(response, false, function () {
                location.reload();
            });
        })
        .fail(function (response) {
            http.fail(response.responseJSON);
        });
});

$('[data-action="login-as"]').change(function () {
    var $this = $(this);

    notifications.loading.show();

    $.get(BASE_URL + '/Users/login-as/' + $this.val(),
        function (response, status) {
            http.success(response, false, function () {
                location.reload();
            });
        })
        .fail(function (response) {
            http.fail(response.responseJSON);
        });
});

function numericValidate(evt) {
    var theEvent = evt || window.event;

    if (evt.which !== 13) {
        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }
}

// $('.modal').attr('data-backdrop', "static");