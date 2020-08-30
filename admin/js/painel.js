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

    // NOVA CATEGORIA
    $(".formNewCategory").submit(function (e){
        e.preventDefault();
        var dataCategory = $(this).serialize();

        $.ajax({
            url: 'ajax/categorias/nova.php',
            data: dataCategory,
            dataType: 'json',
            type: "post",
            success: function (response){
                if (response.error){
                    toastr.error(response.error);
                }else{
                    toastr.success(response.success);

                }

            }
        })

    });

    //ATUALIZA CATEGORIA
    $("#updateCategory").submit(function (e) {
        e.preventDefault();

        var datacat = $(this).serialize();

        $.ajax({
            url: 'ajax/categorias/atualizar.php',
            dataType: 'json',
            data: datacat,
            type: 'post',
            success: function (response){
                if (response.error){
                    toastr.error(response.error);

                }else{
                    toastr.success(response.success);
                    location.href="painel.php?gk=categoria/index";
                }

            }
        });

    });
})