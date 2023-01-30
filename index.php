<?php

    $insert=false;
    if(isset($_POST['name'])){

    //set connecrion variables
    $server="localhost:3307";
    $username="root";
    $password="";
    $db="trip";


    //craete a dtabase connection
    $con=mysqli_connect($server, $username, $password, $db);
    // $conn = new mysqli('localhost:3306', 'root', '1234','test');
    if(!$con){
        die("connection to this database failed due to". mysqli_connect_error());
    }
   //echo "Successfully connected to the db"; 


   //collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
   

    //execute the query
    $sql="INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
        VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";

        // echo $sql;


    if($con->query($sql)== true){
        // echo "Successfully inserted!!";

        //flag for successful insertion
        $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    //close the database connection
    $con->close();
}

?>



<!-------------------------------------------------html-------------------------------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="bg.png" alt="DY Patil Pimpri" class="bg">
    <div class="container">
        <h1>Welcome to DYPIT Tour Form.</h1>
        <p>Enter your details and submit it to confirm your seat.</p>
         
        <?php
            if($insert==true){
            echo "<p class='submitMsg' id='pp'>Thanks for submitting this form. We are happy to see you joining us for Japan trip.</p>";
            }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your phone">
            <textarea name="desc" id="desc" cols="30" rows="5" placeholder="Enter more information here..."></textarea>
            <button class="btn" name="submit">Submit</button>
        </form>
       <script src="index.js"></script>

       
    </div>
</body>
</html>