<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="/index.css"/>
  <title>Session Login</title>
</head>
<body>
<?php include '../../include/nav.php' ?>
  <h1>Login</h1>
  <p>Please enter your credentials to log in.</p>  
  <form action="/contents/session/is_login_ok.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Login</button>
  </form>

  <p>Current session ID: <?= htmlspecialchars($ses_id) ?></p>
  <!-- <p>Logged in as: <?= htmlspecialchars($username) ?></p> -->

</body>
</html>