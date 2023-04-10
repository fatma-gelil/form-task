<?php
echo 'hey';

session_start();
if (isset($_SESSION[ 'login_user' ])) {
    echo "Welcome, " . $_SESSION[ 'login_user' ] . "!";
} else {
    header("location: login.php");
}



