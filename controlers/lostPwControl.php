<?php
session_start();

// Appel du formulaire de connexion - autoloading
require '../vendor/autoload.php';
require_once '../models/classe/FormLostPw.php';
use \Forteroche\FormLostPw;
$formLostPw = new FormLostPw();

//require_once '../models/classe/App/Manager/RecupPassword.php';
//use \Forteroche\RecupPassword;
//$recupPassword = new RecupPassword();

header('Location:./views/lost_pw.php');
// Gestion de l'envoi de mail
if ($_POST['submit_lost_pw']) {

    $header = "MIME-Version:1.0\r\n";
    $header .= 'From: "JeanForteroche.com"<philoem@nexgate.ch>'."\n"; 
    $header .= 'Content-Type:text/html; charset="utf-8"'."\n";
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

    if (isset($_POST['mailRecup']) AND !empty($_POST['mailRecup'])) {

        
        
        echo '<p style="color: green"><strong>Une clé vous a été envoyée dans votre boîte mail</strong></p>';


    }



}