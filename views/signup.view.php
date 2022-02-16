<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap links  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>Signup</title>
</head>

<body>
  <div class="container p-4">

    <h1 class="display-2">Signup</h1>
    <?php if (isset($errors["message"])) : ?>
      <div class="alert alert-danger" role="alert">
        <?= $errors["message"] ?>
      </div>
    <?php endif ?>

    <form method="post" class="v-stack" novalidate>
      <div>
        <label for="name" class="form-label">Name:</label>
        <input type="name" name="name" class="form-control" required>
        <?php if (isset($errors["name"])) : ?>
          <span class="text-danger fs-6"><?= $errors["name"] ?></span>
        <?php endif ?>
      </div>

      <div>
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
        <?php if (isset($errors["email"])) : ?>
          <span class="text-danger fs-6"><?= $errors["email"] ?></span>
        <?php endif ?>
      </div>


      <div>
        <label for="password" class="form-label">Password:</label>
        <input type="password" name="password" id="password" class="form-control" required>
        <?php if (isset($errors["password"])) : ?>
          <span class="text-danger fs-6"><?= $errors["password"] ?></span>
        <?php endif ?>
      </div>
      <div>
        <label for="confirm" class="form-label">Confirm Password:</label>
        <input type="password" name="confirm" id="confirm" class="form-control" required>
        <?php if (isset($errors["confirm"])) : ?>
          <span class="text-danger fs-6"><?= $errors["confirm"] ?></span>
        <?php endif ?>
      </div>

      <button class="btn btn-primary w-100 my-2" name="submit">Submit</button>
      <span>Have an account? <a href="/login.php">Login</a></span>
    </form>
  </div>
</body>

</html>