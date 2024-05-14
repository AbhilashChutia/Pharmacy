<?php
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "pharmacy";

    $connection = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: home.php");
?>