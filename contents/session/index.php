<?php
session_start();
$ses_id = $_SESSION['ses_id'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href="/index.css"/>
  <title>Session Index</title>
</head>
<body>
<?php include '../../include/nav.php' ?>
  <h1>Session Index</h1>
  <p>Welcome to the session index page.</p>
  <?php
  if ($ses_id) {
    echo "<p>Current session ID: " . htmlspecialchars($ses_id) . "</p>";
  } else {
    ?>
    <p>You are not logged in. Please log in to continue.</p>
    <a href="/contents/session/login.php">Login</a>
  <?php  }  ?>
     <div class="out">
     <a href="/contents/session/logout.php">Logout</a>
   </div>
</body>
</html>