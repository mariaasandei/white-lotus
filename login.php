<?php
session_start();

$admin_user = "admin";
$admin_pass = "parola123";

// Dacă există cookie-uri, setăm automat username și parola
if (isset($_COOKIE['remember_user']) && isset($_COOKIE['remember_pass'])) {
  $_POST['username'] = $_COOKIE['remember_user'];
  $_POST['password'] = $_COOKIE['remember_pass'];
  $_POST['remember'] = 'on'; // simulăm bifarea
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username === $admin_user && $password === $admin_pass) {
    $_SESSION['admin_logged_in'] = true;

    if (isset($_POST['remember'])) {
      setcookie("remember_user", $username, time() + (86400 * 30), "/"); // 30 zile
      setcookie("remember_pass", $password, time() + (86400 * 30), "/");
    } else {
      setcookie("remember_user", "", time() - 3600, "/");
      setcookie("remember_pass", "", time() - 3600, "/");
    }

    header("Location: admin.php");
    exit();
  } else {
    $error = "Username sau parola incorecte!";
  }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Login Admin</h2>
    <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
    <form method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username"
               value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>" required>
      </div>
      <div class="form-group">
        <label for="password">Parola</label>
        <input type="password" class="form-control" id="password" name="password"
               value="<?= isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '' ?>" required>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="remember" name="remember"
               <?= isset($_POST['remember']) ? 'checked' : '' ?>>
        <label class="form-check-label" for="remember">Remember me</label>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</body>
</html>
