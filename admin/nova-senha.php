<!doctype html>
<?php
session_start();
if (isset($_SESSION['adm'])){
    header('Location: painel.php');
}
require __DIR__.'/../vendor/autoload.php';
$getEmail = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_STRIPPED);
if (empty($getEmail)){
    header("Location: ".SITE['base']."/admin");
}

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GK Control | Nova senha</title>
    <meta name="description" content="<?=SITE['desc']?>">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="../assets/boot/css/bootcss.css"/>
    <link rel="stylesheet" href="../assets/boot/fontawesome/css/all.css"/>
    <script type="text/javascript" src="../assets/plugins/toastr/toastr.js"></script>
    <link rel="stylesheet" href="../assets/plugins/toastr/build/toastr.css"/>
    <link rel="stylesheet" href="css/login.css"/>
    <script type="text/javascript" src="<?=SITE['base']?>/admin/js/login.js"></script>

</head>
<body style="display: flex; justify-content: center; align-items: center; position: fixed; width: 100%; height: 100%">

<div class="login-box">
    <h3 class="text-center font-weight-normal">Nova senha</h3>
    <form method="post" action="" class="formNewPassAdmin">
        <div class="dv-input">
            <input class="gk-input" type="password" name="adm_user_pass" autocomplete="off" placeholder="Nova senha">
        </div>
        <div class="dv-input">
            <input class="gk-input" type="password" name="Cpass" placeholder="Confirme a senha">
        </div>
        <div class="dv-input">
            <input type="hidden" name="adm_user_email" value="<?=$getEmail;?>">

        </div>
        <button class="btn btn-sm btn-success btn-border-3" type="submit" name="admNewPass"><i class="fas fa-sign-in-alt"></i>Criar nova senha</button>
        <p><small><a class="text-decoration-none" href="<?=SITE['base']?>/admin/">Fazer login</a></small></p>


    </form>

</div>

</body>
</html>