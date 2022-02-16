<?php
require_once "db_conn.php";
$email = $password = $message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (!empty($email) && !empty($password)) {
    $query = "SELECT * FROM USERS WHERE email='$email'";

    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row["password"])) {
          setcookie("user", base64_encode($email . '|' . $password), time() + (86400 * 30), "/");
          header("Location: index.php");
        }
      }
      $message = "Invalid Credentials";
    } else {
      $message = "Invalid Credentials";
    }

    $conn->close();
  }
}



function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen">
  <div class="rounded-xl shadow p-4  flex flex-col items-center">
    <h1 class="text-3xl font-bold">Login</h1>
    <?php if ($message) : ?>
      <span class="bg-yellow-300 border border-yellow-400 py-3 px-2 w-full bg-opacity-50 rounded-md text-yellow-900 my-2">
        <?= $message ?>
      </span>
    <?php endif ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-2">
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
      <button class="rounded-md p-2 px-8 font-bold text-white bg-blue-500 w-full" name="submit">Submit</button>
    </form>
    <span class="text-sm text-center">Don't have an account? <a href="/signup.php" class="text-blue-800 underline">Signup</a></span>

  </div>
</body>