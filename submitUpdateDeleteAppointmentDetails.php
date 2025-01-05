<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['updateBtn'])){
            
            $id = $_POST['id'];
            $previous_date = $_POST['previous-date'];
            $current_date = $_POST['current-date'];
            $upcoming_date = $_POST['upcoming-date'];

            $servernameDatabase = "localhost";
            $usernameDatabase = "root";
            $passwordDatabase = "";
            $databaseName = "mybaby";
            
            $conn = new mysqli($servernameDatabase, $usernameDatabase, $passwordDatabase, $databaseName);
            
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }
        
            $sql = "UPDATE appointment_schedule
            SET previous_date='$previous_date',
            present_date='$current_date',
            upcoming_date='$upcoming_date'
            WHERE id='$id'";

            if($conn->query($sql) === TRUE){
                header( "refresh:3;url=appointment.php" );
                echo '<h2 style="text-align: center; color:green; font-weight: bold;">Appointment Schedule data updated successfully.</h2>';
                echo '<h2 style="text-align: center; font-weight: bold;"><br>You\'ll be redirected in about 3 secs. If not, click <a href="appointment.php">Click Here</a></h2>';
            } else {
                header( "refresh:3;url=appointment.php" );
                echo '<h2 style="text-align: center; color:red; font-weight: bold;">Error in updating Appointment Schedule data: '.$conn->error.'</h2>';
                echo '<h2 style="text-align: center; font-weight: bold;"><br>You\'ll be redirected in about 3 secs. If not, click <a href="appointment.php">Click Here</a></h2>';
            }
        
            $conn->close();

        }else if(isset($_POST['deleteBtn'])){

            $id = $_POST['id'];

            $servernameDatabase = "localhost";
            $usernameDatabase = "root";
            $passwordDatabase = "";
            $databaseName = "mybaby";
            
            $conn = new mysqli($servernameDatabase, $usernameDatabase, $passwordDatabase, $databaseName);
            
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "DELETE FROM appointment_schedule
            WHERE id='$id'";

            if($conn->query($sql) === TRUE){
                header( "refresh:3;url=appointment.php" );
                echo '<h2 style="text-align: center; color:green; font-weight: bold;">Appointment Schedule data deleted successfully.</h2>';
                echo '<h2 style="text-align: center; font-weight: bold;"><br>You\'ll be redirected in about 3 secs. If not, click <a href="appointment.php">Click Here</a></h2>';
            } else {
                header( "refresh:3;url=appointment.php" );
                echo '<h2 style="text-align: center; color:red; font-weight: bold;">Error in deleting Appointment Schedule data: '.$conn->error.'</h2>';
                echo '<h2 style="text-align: center; font-weight: bold;"><br>You\'ll be redirected in about 3 secs. If not, click <a href="appointment.php">Click Here</a></h2>';
            }
        
            $conn->close();
        }
    
    ?>
</body>
</html>