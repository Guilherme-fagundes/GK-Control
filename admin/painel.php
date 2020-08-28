<!doctype html>
<?php
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/helpers/Helpers.php';
session_start();
if (!isset($_SESSION['adm'])){
    header('Location:'.SITE['base'].'/admin/');
}else{
  $readAdmOn = new \database\Read();
  $readAdmOn->find('adm_user',
  'WHERE adm_user_id = :id', "id={$_SESSION['adm']}");
  $admOn = $readAdmOn->getResult()[0];

}
$logout = filter_input(INPUT_GET, 'logout', FILTER_VALIDATE_BOOLEAN);
if ($logout){
    unset($_SESSION['adm']);
    header('Location: '.SITE['base'].'/admin/?logout=true');
}
$get = filter_input(INPUT_GET, 'gk', FILTER_SANITIZE_STRIPPED);

$getTitle = new Helpers($get);

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?=$getTitle->getTitle();?></title>
    <link rel="stylesheet" href="<?=SITE['base']?>/assets/boot/css/bootcss.css"/>
    <link rel="stylesheet" href="<?=SITE['base']?>/assets/boot/fontawesome/css/all.css"/>
    <link rel="stylesheet" href="<?=SITE['base']?>/assets/plugins/toastr/build/toastr.css"/>
    <link rel="stylesheet" href="<?=SITE['base']?>/admin/css/painel.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="<?=SITE['base']?>/assets/plugins/toastr/toastr.js"></script>
    <script type="text/javascript" src="js/painel.js"></script>
</head>
<body>

<?php
require __DIR__.'/inc/left-siderbar.php';
require __DIR__."/inc/header.php";
?>
<main class="main">
    <div class="main-content">

            <?php
            //query string
            if (empty($get)){
                $include = __DIR__.DIRECTORY_SEPARATOR.'system'.DIRECTORY_SEPARATOR.'home.php';
            }else{
                $include = __DIR__.DIRECTORY_SEPARATOR.'system'.DIRECTORY_SEPARATOR.$get.'.php';
            }

            if (file_exists($include)){
                require $include;
            }else{
                echo "<h1>Erro ao incluir arquivo {$include}</h1>";
            }
            ?>

    </div>

</main>
</body>
</html>
