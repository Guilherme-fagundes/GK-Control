$(function () {
    toastr.options.closeDuration = 300;
    toastr.options.positionClass = 'toast-bottom-right';
    $('.formLoginAdmin').submit(function (e) {
        e.preventDefault();

        var dataLogin = $(this).serialize();

        $.ajax({
            url: "ajax/login.php?action=login",
            data: dataLogin,
            type: 'POST',
            dataType: 'json',
            success: function (res) {
                if (res.error){
                    toastr.error(res.error, 'Erro ao logar');
                }else{
                    toastr.success(res.success, 'Tudo certo');
                    location.href="painel.php";
                }

            }
        })

    });

    //Recover
    $(".formRecoverAdmin").submit(function (e) {
        e.preventDefault();

        var dataRecover = $(this).serialize();

        $.ajax({
            url: "ajax/login.php?action=recover",
            dataType: 'json',
            data: dataRecover,
            type: 'POST',
            success: function (response) {
                if (response.error){
                    toastr.error(response.error);
                }else{
                    toastr.success(response.success);
                }

            }
        })

    });

    //nova senha

    $(".formNewPassAdmin").submit(function (e) {
        e.preventDefault();

        var datarecover = $(this).serialize();
        var form = $(this);

        $.ajax({
            url: "ajax/login.php?action=newPass",
            data: datarecover,
            dataType: 'json',
            type: 'post',
            success: function (response) {
                if (response.error){
                    toastr.error(response.error, "Desculpe erro");
                }else{
                    toastr.success(response.success, 'Tudo certo');
                }

            }
        });

    });

})