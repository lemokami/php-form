<?php
require_once "utils/helpers.php";
require_once "services/users.service.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $errors['name'] = "Name is required";
    } else if (!isValidEmail($_POST["email"])) {
        $errors["email"] = "Email is not valid";
    } else {
        $name = sanitize($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $errors['email'] = "Email is required";
        $emailErr = "";
    } else {
        $emailErr = "";
        $email = sanitize($_POST["email"]);
    }

    if (empty($_POST["password"])) {
        $errors['password'] = "Password is required";
    } else if (strlen($_POST["password"]) < 8) {
        $errors['password'] = "Password should have atleast 8 characters";
    } else if ($_POST["password"] != $_POST["confirm"]) {
        $errors['confirm'] = "Passwords do not match";
    } else {
        $password = sanitize($_POST["password"]);
    }

    #creating a user
    if (!count($errors)) {
        if (checkIfEmailExists($email)) {
            $errors["message"] = "Email already exists";
        } else {
            $result = createUser($email, $name, $password);
            if ($result) {
                setcookie("user", base64_encode($email . '|' . $password), time() + (86400 * 30), "/");
                header("Location: index.php");
            } else {
                $errors["message"] = "Error creating user";
            }
        }
    }
    include_once "views/signup.view.php";
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include_once "views/signup.view.php";
}
