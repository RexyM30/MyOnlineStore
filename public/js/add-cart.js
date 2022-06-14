$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#btn-InsertCart").on('click', function () {
        var frmObj = $("#FormCart");

        frmObj.trigger('submit');
    });

    $("#FormCart").on('submit', function (e) {


        e.preventDefault();
        var frmData = $(this).serialize();

        $.ajax({
            url: 'Cart/insertcart',
            type: 'post',
            dataType: 'JSON',
            data: frmData,
            beforeSend: function () {
                LoaderJS.show();
            }
        }).then(function (data) {
            if (data.status) {
                swal('Berhasil', data.message, 'success');

                location.reload();

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
