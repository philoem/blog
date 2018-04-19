<?php
session_start();
session_destroy();

// Ici destruction des cookies existants
setcookie('pseudo', '', time() -3600, '/', null, false, true);
setcookie('password', '', time() -3600, '/', null, false, true);	

header('location:../index.php');

