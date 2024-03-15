<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';



if (isset($_POST['user_form_submit'])) {


        if (empty($_POST['forename']) || empty($_POST['surname']) || empty($_POST['email'] || empty($_POST['message']))) {
            $mailErrorMessage = "Veillez à remplir chaque champs du formulaire et
            à accepter les conditions";
        } else {

            $userName = $_POST['surname'];
            $userFirstname = $_POST['forename'];
            if (!empty($_POST['company'])) {
                $userCompany = $_POST['company'];
            }
            $userMail = $_POST['email'];
            $userMessage = $_POST['message'];








//Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable
                // verbose debug output
                //$mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'contact@mh-webdev.fr';                     //SMTP
                // username
                $mail->Password   = 'Nuggyroots89$';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom($userMail, $userName);
                $mail->addAddress('contact@mh-webdev.fr', 'Mathieu Huguet');



                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Contact - mh-webdev.fr - ' . $userCompany;
                $mail->Body    = $userMessage;

                $mail->send();
                require './views/mailsent.view.php';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        }


}