$(function () {
    //edita perfil admin
    $("form[name='editMyProfile']").submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var dataEdit = $(this).serialize();

        $.ajax({
            url: 'ajax/usuarios/editarPerfil.php',
            dataType: 'json',
            type: 'POST',
            data: dataEdit,
            success: function (res) {
                if (res.error){
                    toastr.error(res.error);
                }else {
                    toastr.success(res.success);
                }

            }
        })

    });

    //Novo usuário

    $("form[name='formNewUser']").submit(function (e) {
        e.preventDefault();

        var dataUser = $(this).serialize();

        $.ajax({
            url: 'ajax/usuarios/novo.php',
            dataType: 'json',
            data: dataUser,
            type: 'post',
            success: function (response) {
                if (response.error){
                    toastr.error(response.error);
                }else{
                   toastr.success(response.success);
                   window.location.href="painel.php?gk=usuarios/index";

                }

            }
        })

    })

    // MODULO FINANCEIRO
    // Despesas :: NOVA DESPESA

    $("a#novaDespesa").click(function () {
        $("#novaDespesaBox").toggleClass('active');
        if ($("#novaDespesaBox").hasClass('active')){
            $("#novaDespesaBox").fadeIn(500)
        }else{
            $("#novaDespesaBox").fadeOut(500)
        }

    });

})