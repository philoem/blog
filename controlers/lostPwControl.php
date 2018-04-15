<?php
session_start();

// Appel du formulaire de connexion - autoloading
require_once '../vendor/autoload.php';

require_once '../models/classe/FormLostPw.php';

use \Forteroche\FormLostPw;
$formLostPw = new FormLostPw();

// Gestion de l'envoi de mail
if (isset($_POST['submit_lost_pw'])) {
    
    if (isset($_POST['mailRecup']) AND !empty($_POST['mailRecup'])) {
        $mail = $_POST['mailRecup'];
        
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
        {
            $passage_ligne = "\r\n";
        }
        else
        {
            $passage_ligne = "\n";
        }
        $sujet = 'Mot de passe oublié';
        
        $header = "MIME-Version:1.0" .$passage_ligne;
        $header .= 'From: "JeanForteroche.com"<philoem24@gmail.com>'.$passage_ligne; 
        $header .= 'Content-Type:text/html; charset="utf-8"'.$passage_ligne;
        $header .= 'Content-Tranfer-Encoding: 8bit';
        
        $message = '
        <html>
            <body>
                <div align="center">
                    Test !
                </div>
            </body>
        </html>
        ';
        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587))
        ->setUsername('philoem24@gmail.com')
        ->setPassword('sunny321654987')
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('Wonderful Subject'))
        ->setFrom(['philoem24@gmail.com' => 'Jean Forteroche'])
        ->setTo([$mail => 'Nom du destinataire'])
        ->setBody($message)
        ;

        // Send the message
        $result = $mailer->send($message);
        //header('Location: ./views/login.php');

    }

}