<!doctype html>
<?php
require __DIR__.'/../vendor/autoload.php';
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GK Control | Recuperar senha</title>
    <meta name="description" content="<?=SITE['desc']?>">
    <link rel="stylesheet" href="../assets/boot/css/bootcss.css"/>
    <link rel="stylesheet" href="../assets/boot/fontawesome/css/all.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../assets/plugins/toastr/toastr.js"></script>
    <link rel="stylesheet" href="../assets/plugins/toastr/build/toastr.css"/>
    <link rel="stylesheet" href="css/login.css"/>
    <script type="text/javascript" src="js/login.js"></script>

</head>
<body style="display: flex; justify-content: center; align-items: center; position: fixed; width: 100%; height: 100%">

<div class="login-box">
    <h3 class="text-center font-weight-normal">Recupere sua senha</h3>
    <form method="post" class="formRecoverAdmin">
        <div class="dv-input">
            <input class="gk-input" type="text" name="adm_user_email" placeholder="E-mail">
        </div>
        <button class="btn btn-sm btn-success btn-border-3" type="submit" name="admLogin">Recuperar</button>
        <p><small><a class="text-decoration-none" href="<?=SITE['base']?>/admin">Voltar</a></small></p>

    </form>

</div>

</body>
</html>