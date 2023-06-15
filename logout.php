<?php
session_start();

if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
}

echo "Have a Great Day!!!";
header("refresh:2;url=login.php");
?>