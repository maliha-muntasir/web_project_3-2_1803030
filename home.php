<?php
// if (!isset($_SESSION['logged'])) {
//     header('location:index.php');
// }
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePpage</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="main">
            <ul>
                <?php
                if(!isset($_SESSION['logged'])){
                ?>
                <li><a href="http://localhost/tour_management_project/index.php">Log In</a></li>
                <?php
                }
                ?>
                <li><a href="http://localhost/tour_management_project/personal.php">Add Personal Info</a></li>

                <li><a href="http://localhost/tour_management_project/image.php">Travel Destination</a></li>
                <li><a href="http://localhost/tour_management_project/package.php">View packages</a></li>
                <li><a href="http://localhost/tour_management_project/form.php">Booking Form</a></li>

                <li><a href="http://localhost/tour_management_project/About.php">About Us</a></li>

                <?php 
                if(isset($_SESSION['logged']) && $_SESSION['logged']){
                ?>
                    <li><a href="logout.php">Log Out</a></li>
                <?php } ?>

            </ul>
        </div>
        <div class="title">
            <h1>Tour & Travel website.<br> </h1>
            <p>
                <!--
            Explore New places...<br>
            Adventure awaits.-->
                The World is Yours <br> to EXPLORE....
            </p>


        </div>
    </header>
</body>

</html>