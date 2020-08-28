<div class="item" style="margin-bottom: 1em;">
    <div class="item-header">
        <h2 class="font-weight-normal">Meu perfil</h2>
        <p style="font-size: .8em; margin: 5px 0;"><small>Dashboard &raquo; usuários &raquo; meu perfil</small></p>

    </div>

</div>
<?php
$getId = filter_input(INPUT_GET, 'admId', FILTER_VALIDATE_INT);
if (empty($getId) || !is_int($getId)){
    header('Location: Painel.php');
}

$readLevel = new \database\Read();
$readLevel->all('config_level');

?>
<div class="item">
    <div class="item-content">
        <h3 class="font-weight-normal" style="margin: 1em 0;">Alterar meus dados</h3>
        <form method="post" name="editMyProfile">
            <article style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px;">
                <div class="dv-input">
                    <input name="adm_user_name" placeholder="Nome" class="gk-input" value="<?=$admOn->adm_user_name;?>">
                </div>
                <div class="dv-input">
                    <input name="adm_user_lastname" placeholder="Sobrenome" class="gk-input" value="<?=$admOn->adm_user_lastname;?>">
                </div>
            </article>
            <article style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px;">
                <div class="dv-input">
                    <input name="adm_user_email" placeholder="E-mail" class="gk-input" value="<?=$admOn->adm_user_email;?>">
                </div>
                <div class="dv-input">
                    <select class="gk-select" name="adm_user_level">
                        <option disabled>Selecione o nivel de acesso</option>
                        <?php
                        foreach ($readLevel->getResult() as $level):
                            ?>
                        <option value="<?=$level->config_level;?>"><?=$level->config_level;?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>

                </div>
            </article>
            <button class="btn btn-success btn-sm btn-border-3">Salvar</button>
        </form>

    </div>
    <div class="item-content">
        <h3 class="font-weight-normal" style="margin: 1em 0;">Alterar minha senha</h3>
        <form name="editMyPass" method="post">
            <article style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px;">
                <div class="dv-input">
                    <input type="password" name="adm_user_pass" placeholder="Nova senha" class="gk-input">
                </div>
                <div class="dv-input">
                    <input class="gk-input" type="password" name="cPass" placeholder="Confirmar senha">
                </div>
            </article>
            <button class="btn btn-success btn-sm btn-border-3" type="submit">Alterar</button>
        </form>
    </div>
</div>

<script>
    $(function () {
        $("form[name='editMyPass']").submit(function (e) {
            e.preventDefault();
            var dataPass = $(this).serialize();

            $.ajax({
                url: "ajax/usuarios/editPassAdmin.php",
                data: dataPass,
                dataType: 'json',
                type: 'post',
                success: function (response) {
                    if (response.error){
                        toastr.error(response.error);
                    }else{
                        toastr.success(response.success);

                    }

                }
            })

        })

    })
</script>