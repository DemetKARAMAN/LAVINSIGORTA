<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//get data from form


        $tc = trim($_POST["tc"]);
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["name"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $plaka = trim($_POST["plaka"]);
        $tescil = trim($_POST["tescil"]);
        $meslek = trim($_POST["meslek"]);
        $teminat = trim($_POST["teminat"]);
        $tel = trim($_POST["tel"]);
        $mesaj = trim($_POST["mesaj"]);

// preparing mail content
$messagecontent ="Tc = ". $tc . "<br>Email = " . $email .  "<br>Ad = " . $name. "<br>Plaka =" . $plaka. "<br>Tescil = " . $tescil. "<br>Meslek = " . $meslek. "<br>Teminat = " . $teminat. "<br>Tel = " . $tel. "<br>Mesaj = " . $mesaj;


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'teknikberk80@gmail.com';                     //SMTP username
    $mail->Password   = 'Barkodcu2508';                               //SMTP password
   // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('dmtkrmn158@gmail.com', 'Mailer');
    $mail->addAddress('dmtkrmn158@gmail.com', 'Joe User');     //Add a recipient
    $mail->addAddress('dmtkrmn158@gmail.com');               //Name is optional
    $mail->addReplyTo('dmtkrmn158@gmail.com', 'Information');
    $mail->addCC('dmtkrmn158@gmail.com');
    $mail->addBCC('dmtkrmn158@gmail.com');

    //Attachments

    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('photo.jpeg', 'photo.jpeg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $messagecontent;
    

    $mail->send();
    header('Location:index.html');
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}