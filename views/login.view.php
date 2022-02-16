<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap links  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>Login</title>
</head>

<body>
  <div class="container p-4">
    <h1 class="display-2">Login</h1>
    <?php if (isset($errors["message"])) : ?>
      <div class="alert alert-danger" role="alert">
        <?= $errors["message"] ?>
      </div>
    <?php endif ?>

    <form method="post" class="v-stack" novalidate>
      <div>
        <label for="email" class="form-label">Email:</label>
        <input class="form-control" type="email" name="email" id="email" required>
        <?php if (isset($errors["email"])) : ?>
          <span class="text-danger fs-6"><?= $errors["email"] ?></span>
        <?php endif ?>
      </div>

      <div>
        <label for="password" class="form-label">Password:</label>
        <input class="form-control" type="password" name="password" id="password" required>
        <?php if (isset($errors["password"])) : ?>
          <span class="text-danger fs-6"><?= $errors["password"] ?></span>
        <?php endif ?>
      </div>
      <button class="btn btn-primary w-100 my-2" name="submit">Submit</button>
      <span>Don't have an account? <a href="/signup.php">Signup</a></span>
    </form>

  </div>
</body>

</html>