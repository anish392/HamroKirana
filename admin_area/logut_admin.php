<?php
session_start();
// Unset a specific session variable
unset($_SESSION['admin_name']);

echo "<script>window.open('./index.php','_self')</script>";
