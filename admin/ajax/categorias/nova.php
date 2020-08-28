<?php
ini_set('error_reporting', E_ALL);
use database\Create;

$categoryPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$setData = array_map('strip_tags', $categoryPost);
$data = array_map('trim', $setData);

$json = [];

require __DIR__.'/../../../vendor/autoload.php';

if (in_array('', $data)){
    $json['error'] = "Para cadastrar é necessário informar titulo e descição";
}else{
    $readCat = new \database\Read();
    $readCat->all('categories');
    if ($readCat->getResult()[0]->category_title === $data['category_title']){
        $json['error'] = "Esta sessão ou categoria já existe";
    }else{
        $create = new Create();
        $create->create('categories', $data);
        $json['success'] = "Cadastro efetuado";
    }

}

echo json_encode($json);
