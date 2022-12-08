<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>View Data</title>
</head>
<title>
    Show the booking details view
</title>

<body>

    <center>
        <div class="container">
            <table class="table">
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">phone_no</th>
                    <th scope="col">email</th>
                    <th scope="col">package</th>
                    <th scope="col">person</th>
                    <th scope="col">destination</th>
                    <th scope="col">reservation</th>
                    <th scope="col">tickets</th>
                    <th scope="col">date</th>
                </tr> 


                <?php
session_start();
$id=$_SESSION['id'];
$sql = "SELECT * FROM booking_form where id =$id";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) { 
    ?>
    <tr>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['phone_no'];?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['package'];?></td>
    <td><?php echo $row['person'];?></td>
    <td><?php echo $row['destination'];?></td>
    <td><?php echo $row['reservation'];?></td>
    <td><?php echo $row['tickets'];?></td>
    <td><?php echo $row['date'];?></td>
</tr> 
<?php
  }
} 

mysqli_close($con);
?>


               
            </table>
            
            <a href="home.php"><button class="btn btn-primary">Go to home</button></a>
        </div>
    </center>
</body>

</html>