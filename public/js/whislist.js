$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#btn-updateCart").on('click', function () {
        var frmObj = $("#frmupdate-cart");

        frmObj.trigger('submit');
    });

    $("#frmupdate-cart").on('submit', function (e) {


        e.preventDefault();
        var frmData = $(this).serialize();

        $.ajax({
            url: 'Cart/UpdateCart',
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
            swal('Gagal', 'Gagal Upate Data Cart. Cobalah beberapa saat lagi', 'error');

            LoaderJS.hide();
        });
    });

    $('.btn-number-down').on('click', function () {
        var numProduct = Number($(this).next().val());
        if (numProduct > 0) $(this).next().val(numProduct - 1);

        // var modalObj = $("#frmupdate-cart");
        // // modalObj.find('.approval_plafon').text(data.plafon);
        // var jumlahitem = $("#number").val();
        // var hargaitem = $("#harga").val();

        // alert(hargaitem);
    });

    $('.btn-number-up').on('click', function () {
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
    });


    $("#btn-order").on('click', function () {
        var frmObj = $("#frm-order");

        frmObj.trigger('submit');
    });

    $("#frm-order").on('submit', function (e) {


        e.preventDefault();
        var frmData = $(this).serialize();

        $.ajax({
            url: 'Cart/Order',
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
            swal('Gagal', 'Gagal Upate Data Cart. Cobalah beberapa saat lagi', 'error');

            LoaderJS.hide();
        });
    });

});
