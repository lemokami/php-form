<?php
require_once "utils/db_conn.php";

/**
 * checks if email already exists in the database
 * @param $email
 * @return bool
 */
function checkIfEmailExists($email)
{
    $conn = getConnection();
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        return TRUE;
    }
    closeConnection($conn);
    return FALSE;
}

/**
 * Function to create a user
 * @param $email
 * @param $name
 * @param $password
 * @return bool|mysqli_result
 */
function createUser($email, $name, $password)
{
    $conn = getConnection();

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
    $result = mysqli_query($conn, $query);
    closeConnection($conn);
    return $result;
}

/**
 * finds the user from the database
 * @param $encoded_user
 * @return array | null
 */
function getUser($encoded_user) {
    $conn = getConnection();

    $user = null;
    $decoded_user = base64_decode($encoded_user);
    $email = explode('|', $decoded_user)[0];
    $password = explode('|', $decoded_user)[1];
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row["password"])) {
                $user['name'] = $row["name"];
                $user['email'] = $row["email"];
            }
        }
    }
    closeConnection($conn);
    return $user;
}

function checkUser($email,$password) {
    $conn = getConnection();
    $query = "SELECT * FROM USERS WHERE email='$email'";

    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row["password"])) {
                setcookie("user", base64_encode($email . '|' . $password), time() + (86400 * 30), "/");
                return TRUE;
            }
        }
    }
    closeConnection($conn);
    return FALSE;
}

/**
 * removes cookie from browser and redirects user
 */
function logoutUser()
{
    setcookie("user", "", time() - 3600); #removing cookie
}