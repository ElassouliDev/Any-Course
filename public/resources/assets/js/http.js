var http = {
    fail: function (response, sweetAlert = false, callback = function () {
    }) {
        $('#growls').remove();

        var message = response.message;

        if (response.errors !== undefined) {
            for (var error in response.errors) {
                for (var line in response.errors[error]) {
                    // message += "\n" + error + ": " + response.errors[error][line];
                    message += "\n"+ response.errors[error][line];
                }
            }
        }

        if (sweetAlert) {
            swal({
                title: "فشلت العملية!",
                text: message,
                icon: "error",
                button: "موافق",
            })
                .then(() => {
                    callback();
                });
            return;
        }

        notifications.danger.show(response);
        callback();
    },
    success: function (response, sweetAlert = false, callback = function () {
    }) {
        $('#growls').remove();

        if (sweetAlert) {
            swal({
                title: "تمت العملية بنجاح!",
                text: response.message,
                icon: "success",
                button: "موافق",
            })
                .then(() => {
                    callback();
                });
            return;
        }

        notifications.success.show(response);
        callback();
    },warning: function (sweetAlert = false, callback = function () {
    }) {
        $('#growls').remove();

        if (sweetAlert) {
            swal({
                title: "هل أنت متأكد من أنك تريد حذف البيانات؟",
                text: '',
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                closeOnConfirm: false,
                confirmButtonText: "إلغاء العملية",
            },function(){
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
            return;
        }

       /* notifications.danger.show(response);
        callback();
    */
    }
}