<?php
session_start();
if (isset($_SESSION['logged'])) {
    unset($_SESSION['logged']);
    unset($_SESSION['email']);
    header('location:home.php');
} else {
    echo "You were not logged in";
    echo "<button><a href='logn.php'>Go to Login Page</a></button>";
}
