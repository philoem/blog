<?php

// functions qui correspondent aux items du menu de la page index.php

function login() {

    header('Location: ../views/login.php');
}

function register() {

    header('Location: ../views/register.php');

}

function reading() {

    header('Location: ../views/user_post.php');

}

function lastBillets() {

    header('Location: ../views/user.php');

}
