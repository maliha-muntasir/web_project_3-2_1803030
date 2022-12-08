<?php
session_start();
include 'connect.php';
if(isset($_SESSION['logged']) && $_SESSION['logged']){
    header('Location:home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour & Travel project</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travel";

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //die($email);
        //$pass = password_hash($pass, PASSWORD_BCRYPT);

        $sql = "SELECT * FROM register WHERE email='$email' AND password='$pass'";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $_SESSION['logged'] = true;
                $_SESSION['email'] = $email;
                header('location:home.php');
            }
        } else {
            echo "Invalid login";
        }
        $conn->close();
    }
    ?>

    <?php
    /*if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $email_search = "select * from register where email='$email' password='$password'";
        $query = mysqli_query($con, $email_search);


        $email_count = mysqli_num_rows($query);
        if ($email_count) {
            $email_pass = mysqli_fetch_assoc($query);
            $db_pass = $email_pass['password'];
            $pass_decode = password_verify($password, $hash);
            if ($pass_decode) {
                echo "login successful";
                header('location:home.php');
            } else {
                echo "password incorrect";
            }
        } else {
            echo "invalid email";
        }
    }*/

    ?>
    <!--login page-->
    <div class="container">
        <div class="card">
            <div class="inner_box" id="card">
                <div class="card_front">
                    <h2>Login</h2>
                    <form action="index.php" method="POST">
                        <input type="email" class="input-box" name="email" placeholder="Your email id" required>
                        <input type="password" name="password" class="input-box" placeholder="password" required>
                        <button type="submit" class="submit-btn" name="login">Submit</button>
                        <input type="checkbox"><span>Remember Me</span>
                    </form>
                    <button type="button" class="btn" onclick="openRegister()">I'm New Here</button>
                    <!--<a href="">Forgot password</a>-->
                </div>

                <!--registration part-->



                <?php
                if (isset($_POST['Submit'])) {
                    $name = mysqli_real_escape_string($con, trim($_POST['name']));
                    $email = mysqli_real_escape_string($con, trim($_POST['email']));
                    $password = mysqli_real_escape_string($con, trim($_POST['password']));
                    $cpassword = mysqli_real_escape_string($con, trim($_POST['cpassword']));

                    // $pass = password_hash($password, PASSWORD_BCRYPT);
                    // $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

                    $emailquery = "select * from register where email='$email' ";
                    $query = mysqli_query($con, $emailquery);

                    $email_count = mysqli_num_rows($query);
                    echo $password != $cpassword;

                    if ($email_count > 0) {
                        echo "email already exist";
                    } else {
                        if ($password == $cpassword) {

                            $insertquery = "insert into register(name,email,password) values('$name ','$email','$password')";

                            $iquery = mysqli_query($con, $insertquery);

                            if ($iquery) {


                                echo "<script>";
                                echo "alert('Inserted Successfully')";
                                echo "</script>";
                            } else {
                                echo "<script>";
                                echo "alert('Not inserted')";
                                echo "</script>";
                            }
                        } else {
                            echo "password are not matching";
                        }
                    }
                }

                ?>

                <div class="card_back">
                    <h2>Register</h2>
                    <form action="" method="POST">
                        <input type="Text" id="name" name="name" class="input-box" placeholder="Your name" required>
                        <input type="email" id="email" name="email" class="input-box" placeholder="Your email id" required>
                        <input type="password" id="password" name="password" class="input-box" placeholder="password" required>
                        <input type="password" id="cpassword" name="cpassword" class="input-box" placeholder="Repeat_password" required>
                        <button type="submit" class="submit-btn" name="Submit">Submit</button>
                        <!-- <input type="checkbox"><span>Remember Me</span>-->
                    </form>
                    <button type="button" class="btn" onclick="openLogin()">I've an account</button>
                    <!--<a href="">Forgot password</a>-->

                </div>
            </div>
        </div>

    </div>
    <script>
        var card = document.getElementById("card");

        function openRegister() {
            card.style.transform = "rotateY(-180deg)";

        }

        function openLogin() {
            card.style.transform = "rotateY(0deg)";

        }
    </script>

</body>

</html>