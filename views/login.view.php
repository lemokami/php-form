<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>

<body class="flex items-center justify-center min-h-screen">
<div class="rounded-xl shadow p-4  flex flex-col items-center">
    <h1 class="text-3xl font-bold">Login</h1>
    <?php if (isset($errors["message"])) : ?>
        <span class="bg-yellow-300 border border-yellow-400 py-3 px-2 w-full bg-opacity-50 rounded-md text-yellow-900 my-2">
        <?= $errors["message"] ?>
      </span>
    <?php endif ?>

    <form method="post" class="space-y-2">
      <span class="flex flex-col items-start">
        <label for="email" class="text-sm text-slate-500">Email:</label>
        <input class="border border-slate-300 rounded-md p-2" type="email" name="email" id="email" required>
          <?php if (isset($errors["email"])) : ?>
              <span class="text-sm text-red-500"><?= $errors["email"] ?></span>
          <?php endif ?>
      </span>

        <span class="flex flex-col items-start">
        <label for="password" class="text-sm text-slate-500">Password:</label>
        <input class="border border-slate-300 rounded-md p-2" type="password" name="password" id="password" required>
            <?php if (isset($errors["password"])) : ?>
                <span class="text-sm text-red-500"><?= $errors["password"] ?></span>
            <?php endif ?>
      </span>
        <button class="rounded-md p-2 px-8 font-bold text-white bg-blue-500 w-full" name="submit">Submit</button>
    </form>
    <span class="text-sm text-center">Don't have an account? <a href="/signup.php" class="text-blue-800 underline">Signup</a></span>

</div>
</body>
</html>