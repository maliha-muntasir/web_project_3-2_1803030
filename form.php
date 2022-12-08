<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking_form</title>

    <link rel="stylesheet" href="style_2.css">
</head>

<body>

    <?php

    session_start();
    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $phone_no = mysqli_real_escape_string($con, $_POST['phone_no']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $package = mysqli_real_escape_string($con, $_POST['package']);
        $person = mysqli_real_escape_string($con, $_POST['person']);
        $destination = mysqli_real_escape_string($con, $_POST['destination']);
        $reservation = mysqli_real_escape_string($con, $_POST['reservation']);
        $tickets = mysqli_real_escape_string($con, $_POST['tickets']);
        $date = mysqli_real_escape_string($con, $_POST['date']);
        //header('location:location:http://localhost/tour_management_project/home.php');


        $count = "select count(id) from booking_form";

        // $count = $count + 1;
        $insertquery = "insert into booking_form(id,name,phone_no,email,package,person,destination,reservation,tickets,date) values ('$count','$name','$phone_no','$email','$package','$person','$destination','$reservation','$tickets','$date')";
        // $iquery = mysqli_query($con, $insertquery);

        if (mysqli_query($con, $insertquery)) {
            $last_id = mysqli_insert_id($con);
            $_SESSION['id']=$last_id;
            echo "<script>";
            echo "alert('Inserted Successful')";
            echo "</script>";
            header('Location: view.php');
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
          }
           }

    ?>



    <div class="booking">
        <div class="container">
            <div class="title">Booking_Form:For booking check about_section </div>
            <form action="" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">User Name </span>
                        <input type="text" id="name" name="name" placeholder="Enter Name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone <Noscript></Noscript> </span>
                        <input type="tel" id="phone_no" name="phone_no" placeholder="Enter phone_no" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email No </span>
                        <input type="email" id="mail" name="email" placeholder="Enter mail" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Select Package</span>
                        <input type="text" id="package" name="package" placeholder="Enter package" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Total Person</span>
                        <input type="number" id="person" name="person" placeholder="Enter total person" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Destination</span>
                        <input type="text" id="destination" name="destination" placeholder="Enter Destination" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Reservation Type</span>
                        <input type="text" id="reservation" name="reservation" placeholder="Enter reservation" required>
                    </div>
                    <div class="input-box">
                        <span class="details">No_of_tickets</span>
                        <input type="text" id="tickets" name="tickets" placeholder="No of tickets" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Booking Date </span>
                        <input type="date" id="date" name="date" class="date" placeholder="Enter date" required>
                    </div>
                </div>
                <!--<div class="button">-->
                <!--<input type="submit" value="Booking">-->
                <!-- <input type="submit" value="Cancel">-->
                <button type="submit" class="submit-btn" id="submit" name="submit">Submit</button>
                <!-- <button type="cancel" class="cancel-btn" id="cancel" name="cancel">cancel</button>-->
                <!-- </div>-->

            </form>
        </div>
    </div>
</body>

</html>