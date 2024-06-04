
<?php
    $insert = false;
    if(isset($_POST["name"]) && $_POST["email"] && $_POST["phone"]){
        $submit = true;
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tour_trip";

        //create connection
        $con = mysqli_connect($server, $username, $password, $dbname);

        //check connection
        if (!$con) {
            die("connection to this db faild to". mysqli_connect_error());
        }
        // echo "Successfully connected to the db"; 

        $name = $_REQUEST['name'];
        $gender = $_REQUEST['gender'];
        $age = $_REQUEST['age'];
        $email = $_REQUEST['email'];
        $phone = $_REQUEST['phone'];
        $other = $_REQUEST['other'];

        $sql = "INSERT INTO `trip`(`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp())";

        // $result = mysqli_query($con, $sql);

        if ($con->query($sql) === TRUE) {
            // echo "New record created successfully";
            $insert = true;
        } 
        else {
            echo "Error: " . $sql . "<br>" . $con->error;
          }
        
        $con->close();

        //echo $sql; 
    }
?>;










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel From</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Jacquard+12&family=Jersey+25+Charted&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sevillana&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>


<body>
    <img class="bg" src="Tourist-Places-In-Bangladesh-bg.jpg" alt="Tour Trip">
    <div class="container">
        <h1>Welcome to Tour Trip Bangladesh</h1>
        <p>Enter your details and submit this from to confirm your 
            participation in the trip
        </p>


        <?php 
            if($insert == true){
                echo "<p class='sub-msg'>Thanks for submitting your form. We are happy to see you joining!</p>";
         }
        ?>



        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your number">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>         
        </form>
    </div>

    <script src="index.js"></script>
</body>
</html>





