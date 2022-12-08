<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'connect.php' ?>
    <link rel="stylesheet" href="style.css">

    <title>Personal_Info</title>
</head>

<body>

    <?php
    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $mobile_no = mysqli_real_escape_string($con, $_POST['Phone_no']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $Address = mysqli_real_escape_string($con, $_POST['Address']);


        // Attempt select query execution
        $sql = "SELECT * FROM personal_info";
        $result = mysqli_query($con, $sql);
        $count = 0;
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                $count = mysqli_num_rows($result);
                mysqli_free_result($result);
                header('location:http://localhost/tour_management_project/home.php');
            } else {
                $count = 0;
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
        $count = $count + 1;

        $insertquery = "insert into personal_info(id,name,email,Phone_no,gender,Address) values ('$count','$name','$email','$mobile_no','$gender','$Address')";
        $iquery = mysqli_query($con, $insertquery);


        if ($iquery) {
            echo "<script>";
            echo "alert('Inserted Successful')";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('No Connection')";
            echo "</script>";
        }

        mysqli_close($con);
    }
    ?>
    <div class="container">
        <div class="card">
            <div class="inner_box" id="card">
                <div class="card_front">
                    <h2>Add Personal Information</h2>
                    <form action="" method="post">
                        <span class="details">Name:</span>
                        <input type="text" class="input-box" id="name" placeholder="Your Name" required name="name">
                        <span class="details">Email:</span>
                        <input type="Email" class="input-box" id="email" placeholder="Your email id" required name="email">
                        <span class="details">Phone_no:</span>
                        <input type="tel" class="input-box" id="phone_no" placeholder="Mobile_no" required name="Phone_no"><br>
                        <span class="details">Gender:</span>
                        <input type="radio" name="gender" id="male" value="male"> Male <input type="radio" name="gender" id="female" value="female"> Female
                        <br><br>
                        <span class="details">Address:</span>
                        <input type="text" class="input-box" id="Address" placeholder="Address" required name="Address"><br>
                        <!--<span class="details">Address:</span>
                        <select name="" id="" name="Address">
                            <option value="">Dhaka</option>
                            <option value="">Ranpur</option>
                            <option value="">Rajshahi</option>
                            <option value="">Khulna</option>
                            <option value="">Chittagong</option>
                            <option value="">Mymensingh</option>
                            <option value="">Barisal</option>
                            <option value="">Sylhet</option>

                        </select>-->
                        <button type="submit" class="submit-btn" id="submit" name="submit">Submit</button>
                        <!-- <button type="submit" class="input-box">Back</button>-->

                    </form>

                    <!--<a href="">Forgot password</a>-->
                </div>
            </div>
        </div>
    </div>

</body>

</html>