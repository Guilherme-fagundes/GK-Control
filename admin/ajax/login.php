<?php
session_start();
$login = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);


require __DIR__ . './../../vendor/autoload.php';


$json = [];
switch ($action) {
    case "login":

        if (in_array('', $login)) {
            $json['error'] = 'Preencha todos os campos';
        } elseif (!filter_var($login['adm_user_email'], FILTER_VALIDATE_EMAIL)) {
            $json['error'] = 'E-mail inválido';

        } else {
            $readAdmUser = new \database\Read();
            $readAdmUser->find('adm_user', 'WHERE adm_user_email = :e', "e={$login['adm_user_email']}");
            $email = $readAdmUser->getResult()[0];
            $pass = (password_verify($login['adm_user_pass'], $readAdmUser->getResult()[0]->adm_user_pass));
            if (!$email || !$pass) {
                $json['error'] = 'Usuário ou senha inválida';
            }else{
                sleep(2);
                $json['success'] = "Seja bem vindo";
                $_SESSION['adm'] = $readAdmUser->getResult()[0]->adm_user_id;
            }
        }

        break;
    case "recover":
        if(in_array('', $login)){
            $json['error'] = "Preencha o campo de e-mail";

        }elseif (!filter_var($login['adm_user_email'], FILTER_VALIDATE_EMAIL)){
            $json['error'] = "E-mail inválido";
        }else{

            $read = new \database\Read();
            $read->find('adm_user',
            'WHERE adm_user_email = :e', "e={$login['adm_user_email']}");
            if ($read->getResult()){

                $send = new \coffeebreaks\Mail();
                $send->config(
                    MAIL['host'],
                    MAIL['user'],
                    MAIL['pass'],
                    MAIL['port']
                );

                $body = "<p>Você está recendo este e-mail porque foi solicitado a recuperação de sua senha, para recupera-la
 acesse <a href=\"".SITE['base']."/admin/nova-senha.php?email=".base64_encode($login["adm_user_email"])."\">este link</a></p>
 <p><small>".date('d-m-Y H:i')."</small></p>";

                $send->add(
                    'suporte@gkcontrol.com',
                    'Suporte',
                    $login['adm_user_email'],
                    'Recuperação de senha',
                    $body
                );
                if ($send->getResult()){
                    $json['success'] = "E-mail enviado para {$login['adm_user_email']}";
                }

            }

        }
        break;
    case "newPass":
        if (in_array('', $login)){
            $json['error'] = "Para atualizar a senha, preencha o formulário";
        }elseif ($login['adm_user_pass'] != $login['Cpass']){
            $json['error'] = "As senhas não conferem";

        }else{
            $login['adm_user_pass'] = password_hash($login['adm_user_pass'], PASSWORD_DEFAULT);

            $email = base64_decode($login['adm_user_email']);

            $upDatePass = new \database\Update();
            $upDatePass->update('adm_user', ["adm_user_pass" => $login['adm_user_pass']],
            "WHERE adm_user_email = :e", "e={$email}");
            if ($upDatePass->getResult()){
                $json['success'] = "Senha atualizada, efertue seu login com a nova senha";
            }
        }

        break;
}


echo json_encode($json);