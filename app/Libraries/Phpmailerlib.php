<?php
defined('BASEPATH') OR exit('No direct script access allowed');





use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Phpmailerlib{

    public function __construct(){
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load(){

        require_once("/public/PHPMailer/PHPMailer.php");
        require_once("/public/PHPMailer/SMTP.php");
        require_once("/public/PHPMailer/Exception.php");

        $mail = new PHPMailer();

        return $mail;
            

        // $mail->isSMTP();
        // $mail->Host = "smtp.gmail.com";
        // $mail->SMTPAuth = true;
        // $mail->Username = "makmakachacoso@gmail.com";
        // $mail->Password = "";
        // $mail->Port = 465;
        // $mail->SMTPSecure = "ssl";

        // $mail->isHTML(true);
        // $mail->setFrom($email, $this->request->getVar('task'));
        // $mail->addAddress("makmakachacoso@gmail.com");
        // $mail->Subject = ("$email ($this->request->getVar('members'))");
        // $mail->Body = $this->request->getVar('description');

        // if($mail>send()){
         
        //     echo "Email sent succesfully";

        // }else{
        //     echo 'he';
        // }


    }
}