<?php 
    setcookie("AdminEmail", "", time() - 3600, '/');
    setcookie("AdminPassword", "", time() - 3600, '/');
    unset($_COOKIE['AdminEmail']);
    unset($_COOKIE['AdminPassword']);
    header("location:../PHP-Project/php/adminLoginForm.php")
?>