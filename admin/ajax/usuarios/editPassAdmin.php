<?php
session_start();

$dataPass = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$json = [];

if (in_array('', $dataPass)){
    $json['error'] = 'Preencha todos os campos';
}elseif ($dataPass['adm_user_pass'] != $dataPass['cPass']){
    $json['error'] = 'As senhas não conferem';

}else{
    require __DIR__.'/../../../vendor/autoload.php';



    $newPass = password_hash($dataPass['adm_user_pass'], PASSWORD_DEFAULT);
    $upPass = new \database\Update();
    $upPass->update('adm_user', ['adm_user_pass' => $newPass],
    'WHERE adm_user_id = :id', "id={$_SESSION['adm']}");

    if ($upPass->getResult()){
        $json['success'] = 'Senha atualizada com sucesso';

    }
}





echo json_encode($json);