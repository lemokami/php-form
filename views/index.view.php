<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap links  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Home</title>
</head>

<body>
    <div class="container py-5">
        <div>
            <div class="fs-6">Name:</div>
            <h1 class="display-6"><?= $user["name"] ?></h1>
        </div>
        <div>
            <div class="fs-6">Email:</div>
            <h1 class="display-6"><?= $user["email"] ?></h1>
        </div>
        <form method="post">
            <input type="submit" name="logout" id="logout" value="Logout" class="btn btn-warning w-100" />
        </form>

    </div>
</body>

</html>