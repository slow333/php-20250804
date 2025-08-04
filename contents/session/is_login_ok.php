<?php
session_start();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username == 'admin' && $password == '123') {
    $_SESSION['ses_id'] = $username;
    echo "<p>Login successful! Welcome, <b>" . htmlspecialchars($username) . "</b>.</p>";
    echo "<script>window.location.href = '/contents/session/index.php';</script>";
  } 
  else { ?>
    <p>Login failed. Please check your username and password.</p>
    <p>Username: <?= htmlspecialchars($username) ?></p>
    <p>Password: <?= htmlspecialchars($password) ?></p>
  <a href="/contents/session/login.php">로그인으로 이동</a>    
<?php  }  ?>
