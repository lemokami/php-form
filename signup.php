<?php

require_once "db_conn.php";

$name = $email = $password = $confirmErr = $message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $nameErr = "";
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $emailErr = "";
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else if ($_POST["password"] != $_POST["confirm"]) {
    $confirmErr = "Passwords do not match";
  } else {
    $confirmErr = "";
    $passwordErr = "";
    $password = test_input($_POST["password"]);
  }

  #creating a user

  if (!empty($name) && !empty($email) && !empty($password)  && empty($confirmErr)) {
    if (check_if_email_exists($email, $conn)) {
      $message = "Email already exists";
    } else {
      $hashed_password = password_hash($password, PASSWORD_BCRYPT);
      $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
      $result = mysqli_query($conn, $query);
      if ($result) {
        setcookie("user", base64_encode($email . '|' . $password), time() + (86400 * 30), "/");
        header("Location: index.php");
      } else {
        $message = "Error creating user";
      }
      $conn->close();
    }
  }
}

function check_if_email_exists($email, $conn)
{
  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  if ($result->num_rows > 0) {
    return TRUE;
  }
  return FALSE;
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen">
  <div class="rounded-xl shadow p-4 px-8 flex flex-col items-center">

    <h1 class="text-3xl font-bold">Signup</h1>
    <?php if ($message) : ?>
      <span class="bg-yellow-300 border border-yellow-400 py-3 px-2 w-full bg-opacity-50 rounded-md text-yellow-900 my-2">
        <?= $message ?>
      </span>
    <?php endif ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-2">
      <span class="flex flex-col items-start">
        <label for="name" class="text-sm text-slate-500">Name:</label>
        <input class="border border-slate-300 rounded-md p-2" type="name" name="name" required>
        <span class="text-sm text-red-500"><?php echo isset($nameErr) ? $nameErr : '';  ?></span>
      </span>

      <span class="flex flex-col items-start">
        <label for="email" class="text-sm text-slate-500">Email:</label>
        <input class="border border-slate-300 rounded-md p-2" type="email" name="email" id="email" required>
        <span class="text-sm text-red-500"><?php echo isset($emailErr) ? $emailErr : '';  ?></span>
      </span>


      <span class="flex flex-col items-start">
        <label for="password" class="text-sm text-slate-500">Password:</label>
        <input class="border border-slate-300 rounded-md p-2" type="password" name="password" id="password" required>
        <span class="text-sm text-red-500"><?php echo isset($passwordErr) ? $passwordErr : '';  ?></span>
      </span>
      <span class="flex flex-col items-start">
        <label for="confirm" class="text-sm text-slate-500">Confirm Password:</label>
        <input class="border border-slate-300 rounded-md p-2" type="password" name="confirm" id="confirm" required>
        <span class="text-sm text-red-500"><?php echo isset($confirmErr) ? $confirmErr : '';  ?></span>

      </span>

      <button class="rounded-md p-2 px-8 font-bold text-white bg-blue-500 w-full" name="submit">Submit</button>
    </form>
    <span class="text-sm text-center">Have an account? <a href="/login.php" class="text-blue-800 underline">Login</a></span>
  </div>
</body>

</html>