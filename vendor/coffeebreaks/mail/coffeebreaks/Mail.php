<?php


namespace coffeebreaks;


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mail
{

    private $mail;
    private $result;


    public function config(string $host, string $user, string $pass, int $port)
    {
        $this->mail = new PHPMailer(1);
        $this->mail->isSMTP();
        $this->mail->Host = $host;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $user;
        $this->mail->Password = $pass;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = $port;

        $this->mail->isHTML(true);

    }

    public function add(string $fromAdress, string $fromName, string $mailTo, string $subject, string $body)
    {
        $this->mail->setLanguage('br');
        $this->mail->setFrom($fromAdress, $fromName);
        $this->mail->addAddress($mailTo);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        return $this->send();


    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }


    private function send()
    {
        try {
            if ($this->mail->send()){
                $this->result = true;

            }else{
                $this->result = false;
            }
        } catch (Exception $e){
            echo "Error email send:: ". $e->errorMessage();
        }
    }

}