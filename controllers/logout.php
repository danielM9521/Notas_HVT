<?php
    include_once 'user_session.php';
    $userSession = new user_session();
    $userSession->closeSession();
    header("location: ../index.php");
?>