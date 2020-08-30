<?php

use database\Update;

$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$setData = array_map('strip_tags', $post);
$data = array_map('trim', $setData);

$getCatId = $data['category_id'];

unset($data['category_id']);

$json = [];

if (in_array('', $data)){
    $json['error'] = "Para atualizar preencha todos os campos";

}else{
    require __DIR__.'/../../../vendor/autoload.php';

    $updateCat = new Update;
    $updateCat->update('categories', $data, 'WHERE category_id = :id', "id={$getCatId}");
    if ($updateCat->getResult()){
        $json['success'] = "Atualizado com sucesso";

    }
}



echo json_encode($json);
