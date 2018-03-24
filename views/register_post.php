<?php
	session_start();

	require_once('../models/model.php');
	$db = dbConnect();
	
	// Redirection 
	header('Location: ./register.php');
	
	//if (isset($_POST['submit_register'])) {
	//	$prenom = htmlspecialchars($_POST['prenom']);
	//	$nom = htmlspecialchars($_POST['nom']);
	//	$pseudo = htmlspecialchars($_POST['pseudo']);
	//	$mail = htmlspecialchars($_POST['mail']);
	//	$mail_confirm = htmlspecialchars($_POST['mail_confirm']);
	//	$passwordRegister = sha1($_POST['passwordRegister']);
	//	$confirmPasswordRegister = sha1($_POST['confirmPasswordRegister']);
//
	//	if (!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail_confirm']) AND !empty($_POST//['passwordRegister']) AND !empty($_POST['confirmPasswordRegister'])) {
	//		$pseudolength = strlen($pseudo);
	//		if ($pseudolength <= 60) {
	//			if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
	//				$reqmail = $db->prepare('SELECT * FROM login_admin WHERE mail_admin = ?');
	//				$reqmail->execute([$mail]);
	//				$mailexist = $reqmail->rowCount();
	//				if ($mailexist == 0) {
	//					if ($mail == $mail_confirm) {
	//						if ($passwordRegister == $confirmPasswordRegister) {
	//							$req = $db->prepare('INSERT INTO login_admin(prenom, nom, pseudo, mail_admin, password_admin, date_login) VALUES(?, ?, ?, ?, ?, NOW())');
	//							$req->execute([$prenom, $nom, $pseudo, $mail, $passwordRegister]);
	//							$error = "VOTRE COMPTE A BIEN ETE CREE !";
	//						} else {
	//							$error = "Vos mots de passes ne sont pas identiques !";
	//						}
	//					} else {
	//						$error = "Vos adresses mail ne sont pas identiques !";
	//					}
	//				} else {
	//					$error = "Ce mail est déjà utlisé !";
	//				}
	//			} else {
	//				$error = "Votre adresse mail n'est pas bonne !";
	//			}
	//		} else {
	//			$error = "Votre pseudo ne doit pas dépasser 60 caractères !";
	//		}
	//	} 
	//	
	//}
