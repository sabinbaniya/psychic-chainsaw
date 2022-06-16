<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_email($name, $email, $username, $password)
{
    // for sending mail to user's after creation is done 

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp-mail.outlook.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'baniya.sabinn@outlook.com';              //SMTP username
        $mail->Password   = file_get_contents(__DIR__ . '/google_password.txt'); //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;
        $mail->SMTPSecure = "TLS";                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('baniya.sabinn@outlook.com', 'Sabin Baniya');
        $mail->addAddress($email, $name);     //Add a recipient    
        $mail->addReplyTo('baniya.sabinn@outlook.com', 'Sabin Baniya');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Login Details for Website\'s Admin Panel for $name";
        $mail->Body    = "Here\'s your login details for the admin panel: <hr/><br/>, username: $username  <br/> password : $password";
        $mail->AltBody = 'Please use a client-mail that supports html';
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
        echo ($mail->ErrorInfo);
    }
}
