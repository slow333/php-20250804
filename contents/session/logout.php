<?php
session_start();
session_abort();
session_destroy();
?>
<script>
  alert("You have been logged out successfully.");
  window.location.href = "/contents/session/login.php";
</script>