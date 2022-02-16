<?php
require_once "services/users.service.php";
require_once "utils/helpers.php";

$errors = [];
$email = $password = $message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["email"])) {
        $errors["email"] = "Email is required";
    } else if (!isValidEmail($_POST["email"])) {
        $errors["email"] = "Email is not valid";
    } else {
        $email = sanitize($_POST["email"]);
    }

    if (empty($_POST["password"])) {
        $errors["password"] = "Password is required";
    } else {
        $password = sanitize($_POST["password"]);
    }

    if (!empty($email) && !empty($password)) {
        if (checkUser($email, $password)) {
            header("Location: index.php");
        } else {
            $errors["message"] = "Invalid Credentials";
        }
    }
    include_once "views/login.view.php";
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include_once "views/login.view.php";
}
