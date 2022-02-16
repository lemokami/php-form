<?php

/**
 * Create connection with the database
 * @return mysqli|void
 */
function getConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "UserDB";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

/**
 * closes the connection with the database
 * @param $conn mysqli connection variable
 */
function closeConnection($conn)
{
    $conn->close();
}
