<div class="item" style="margin-bottom: 1em;">
    <div class="item-header" style="display: flex; justify-content: space-between; align-items: center;">
        <div class="header-desc">
            <h2 class="font-weight-normal">Todos os usuários</h2>
            <p style="font-size: .8em; margin: 5px 0;"><small>Dashboard &raquo; usuários</small></p>

        </div>
        <div class="header-item-nav">
            <a href="painel.php?gk=usuarios/novo" class="btn btn-success btn-sm btn-border-3">Novo usuário</a>

        </div>


    </div>

</div>

<?php

$delId = filter_input(INPUT_GET, 'delId', FILTER_VALIDATE_INT);

if ($delId){
    $delete = new \database\Delete();
    $delete->delete('adm_user', 'WHERE adm_user_id = :id', "id={$delId}");
    if ($delete->getResult()){
        header('Location: painel.php?gk=usuarios/index');
    }
}


$readAdmUsers = new \database\Read();
$readAdmUsers->find('adm_user', 'WHERE adm_user_id != :id', "id={$_SESSION['adm']}");
if (!$readAdmUsers->getResult()){
    GK_MESSAGE('warning', 'Nenhum usuáriocadastrado até o momento');

}else{
    foreach ($readAdmUsers->getResult() as $user):
?>
    <div class="item dataUser">
        <div class="dataUser-box">
            <div class="userData">
                <p><small><b>Nome: </b><?=$user->adm_user_name?> <?=$user->adm_user_lastname?></small></p>
                <p><small><b>E-mail: </b><?=$user->adm_user_email?></small></p>
                <p><small><b>Nível de acesso: </b><?=$user->adm_user_level?></small></p>

            </div>
            <span><a href="#" class="btn btn-danger btn-sm">Editar</a></span>
            <span><a href="painel.php?gk=usuarios/index&delId=<?=$user->adm_user_id?>" class="btn btn-primary btn-sm">Excluir</a></span>

        </div>

    </div>

<?php
endforeach;
}

?>

