<?php
session_start();
session_destroy(); // User info delete chestundi
header('Location: index.php'); // Login page ki teesukeltundi
exit();
?>
