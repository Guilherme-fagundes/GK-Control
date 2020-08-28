<?php
$dataNewUser = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$setData = array_map('strip_tags', $dataNewUser);
$data = array_map('trim', $setData);

require __DIR__.'/../../../vendor/autoload.php';



$json = [];

if (in_array('', $data)){
    $json['error'] = 'Preencha todos os campos';
}elseif(!filter_var($data['adm_user_email'], FILTER_VALIDATE_EMAIL)){
    $json['error'] = 'E-mail inválido';
}else{

    $checkAdm = new \database\Read();
    $checkAdm->find('adm_user', 'WHERE adm_user_email = :e', "e={$data['adm_user_email']}");
    if ($checkAdm->getResult()){
        $json['error'] = 'Este e-mail já esta sendo utilizado';
    }else{

        $pass = time(uniqid(rand(100, 1000000)));
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        $sendMail = new \coffeebreaks\Mail();
        $sendMail->config(
            MAIL['host'],
            MAIL['user'],
            MAIL['pass'],
            MAIL['port']
        );
        $body = "<p>Este é o e-mail com instruções de acesso ao painel do GK Control</p>
<p><b>Sua senha: </b>{$pass}\n\nPara entrar no sistema informe este e-mail e senha </p>";
        $sendMail->add('suporte@gkcontrol.com', 'Suporte',
        $data['adm_user_email'], 'Acesso', $body);

        if ($sendMail->getResult()){

            $dataPass = ['adm_user_pass' => $hash];

            $create = new \database\Create();
            $create->create('adm_user', array_merge($data, $dataPass));
            if ($create
            ->getResult()){
                $json['success'] = "Usuário cadastrado";

            }

        }else{
            $json['error'] = "Erro ao enviar e-mail";
        }




    }
}




echo json_encode($json);
