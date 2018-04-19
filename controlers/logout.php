<?php
session_start();
session_destroy();

// Ici destruction des cookies existants
setcookie('pseudo', '', time() -3600);
setcookie('password', '', time() -3600);	

header('location:../index.php');

