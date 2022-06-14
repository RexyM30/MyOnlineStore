$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#btn-save").on('click', function () {
        var frmObj = $("#FormRegister");

        frmObj.trigger('submit');
    });

    $("#FormRegister").on('submit', function (e) {

        var password = $('#password').val();
        e.preventDefault();
        var frmData = $(this).serialize();

        $.ajax({
            url: 'Register/insert',
            type: 'post',
            dataType: 'JSON',
            data: frmData,
            beforeSend: function () {
                LoaderJS.show();
            }
        }).then(function (data) {
            if (data.status) {
                swal('Berhasil', data.message, 'success');
               
            } else {
                swal('Gagal', data.message, 'error');
            }
            LoaderJS.hide();
        }).catch(function () {
            swal('Gagal', 'Gagal Menyimpan Data. Cobalah beberapa saat lagi', 'error');

            LoaderJS.hide();
        });
    });

});
