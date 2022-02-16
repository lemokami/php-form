<?php
require_once "db_conn.php";
$name = $email = "";
if (isset($_COOKIE['user'])) {
  $user = base64_decode($_COOKIE['user']);
  $email = explode('|', $user)[0];
  $password = explode('|', $user)[1];
  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($password, $row["password"])) {
        $name = $row["name"];
        $email = $row["email"];
      }
    }
  }
  $conn->close();
} else {
  header("Location: login.php");
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen">
  <div class="rounded-xl shadow p-4 px-8 flex flex-col items-center">
    <h1 class="text-3xl font-bold"><?php echo $name ? $name : '' ?></h1>
    <h1 class="text-3xl font-bold"><?php echo $email ? $email : '' ?></h1>
    <form method="post">
      <input type="submit" name="logout" id="logout" value="Logout" class="py-3 bg-blue-300 px-8 cursor-pointer" />
    </form>

  </div>
</body>

<?php
#logout function
function logout()
{
  setcookie("user", "", time() - 3600); #removing cookie
  header("Location: login.php");
}

if (array_key_exists('logout', $_POST)) {
  logout();
}
