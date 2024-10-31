
<?php

session_start();

session_unset();
session_destroy();

// header("Location: login_user.php");
header("Location: ../index.php");
exit;


?>