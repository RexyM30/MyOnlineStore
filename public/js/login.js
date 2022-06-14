var Login_Js = {
    Init: function () {
        $("#FormLogin").on('submit', function (e) {
            e.preventDefault();
            var _data = $(this).serialize();

            try {
                let _submit = function () {
                    return $.ajax({
                        url: 'Login/login_proccess',
                        dataType: 'JSON',
                        type: 'POST',
                        data: _data,
                        beforeSend: function () {
                            LoaderJS.show();
                        }
                    }).then(function (data) {
                        if (data.status) {
                            swal('Berhasil', data.message, 'success');
                            if (data.dashboard_url) {
                                window.location = data.dashboard_url;
                            }
                        } else {
                            // alert(data.message);
                            swal('Gagal', data.message, 'error');
                            if (data.reload_page) {
                                window.location = window.location.href;
                            }
                        }

                        LoaderJS.hide();
                    });
                }

                _submit();
            } catch (error) {
                console.log(error);
                alert("Terjadi kesalahan saat request data");
                LoaderJS.hide();
            }
        });
    }
};

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    Login_Js.Init();
});
