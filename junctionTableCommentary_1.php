<?php
    require_once('./models/model.php');

    $db = dbConnect();
    
    header('location: ../user.php');

    