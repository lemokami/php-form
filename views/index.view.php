<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
</head>

<body class="flex items-center justify-center min-h-screen">
<div class="rounded-xl shadow p-4 px-8 flex flex-col items-center">
    <h1 class="text-3xl font-bold"><?= $user["name"] ?></h1>
    <h1 class="text-3xl font-bold"><?= $user["email"] ?></h1>
    <form method="post">
        <input type="submit" name="logout" id="logout" value="Logout" class="py-3 bg-blue-300 px-8 cursor-pointer"/>
    </form>

</div>
</body>
</html>