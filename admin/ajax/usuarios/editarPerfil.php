<?php
session_start();
$editProfile = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

require __DIR__.'/../../../vendor/autoload.php';
$json = [];

if (in_array('', $editProfile)){
    $json['error'] = 'Parece que tem campos em branco';

}else{
    $udate = new \database\Update();
    $udate->update('adm_user', $editProfile, "WHERE adm_user_id = :id", "id={$_SESSION['adm']}");
    if ($udate->getResult()){
        $json['success'] = "{$editProfile["adm_user_name"]} seu perfil foi atualizado com sucesso";
    }

}


echo json_encode($json);