<?php
$servername = "localhost";
$username = "root"; #username for the mysql server
$password = ""; #password for the mysql server

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  echo "Connected successfully";

  # creating a database for the project
  $dbCreate = "CREATE DATABASE UserDB";
  if (mysqli_query($conn, $dbCreate)) {
    echo "Database created successfully";
    $conn->query("USE UserDB");
  } else {
    echo "Error creating database: " . mysqli_error($conn);
  }

  #creating the table
  $sql = "CREATE TABLE USERS (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(80),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

  if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
}
mysqli_close($conn);
