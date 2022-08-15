<?php
ob_start();
session_start();

session_destroy();

Header("Location:login.php?status=exit");
?>