<?php
require_once "services/users.service.php";

if (isset($_COOKIE['user'])) {
    $user = getUser( $_COOKIE['user']);
    if(is_null($user)){
        header("Location: login.php");
    } else {
        include_once "views/index.view.php";
    }
} else {
  header("Location: login.php");
}



if (array_key_exists('logout', $_POST)) {
    logoutUser();
    header("Location: login.php");
}
