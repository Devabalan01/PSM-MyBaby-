<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Appointment Details</title>
</head>
<body>
<?php
        if(isset($_GET['insertBtn'])){
            $previous_date = $_GET['previous-date'];
            $current_date = $_GET['current-date'];
            $upcoming_date = $_GET['upcoming-date'];
            $user_id = $_GET['user-id'];

            $servernameDatabase = "localhost";
            $usernameDatabase = "root";
            $passwordDatabase = "";
            $databaseName = "mybaby";
            
            $conn = new mysqli($servernameDatabase, $usernameDatabase, $passwordDatabase, $databaseName);
            
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }
        
            $sql = "INSERT INTO appointment_schedule (previous_date, present_date, upcoming_date, user_id) VALUES ('$previous_date', '$current_date', '$upcoming_date', '$user_id');";

            if($conn->query($sql) === TRUE){
                header( "refresh:3;url=appointment.php" );
                echo '<h2 style="text-align: center; color:green; font-weight: bold;">Appointment Schedule data inserted sucessfully.</h2>';
                echo '<h2 style="text-align: center; font-weight: bold;"><br>You\'ll be redirected in about 3 secs. If not, click <a href="appointment.php">Click Here</a></h2>';
            } else {
                echo "Error inserting data: $conn->error";
            }
            $conn->close();
        }
    
    ?>
</body>
</html>