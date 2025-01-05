<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Patient Details</title>
</head>
<body>
<?php
        if(isset($_GET['insertBtn'])){
            $name = $_GET['name'];
            $age = $_GET['age'];
            $gender = $_GET['gender'];
            $nationality = $_GET['nationality'];
            $birth_date = $_GET['birth_date'];
            $birth_place = $_GET['birth_place'];
            $parent = $_GET['parent'];
            $contact = $_GET['contact'];

            $servernameDatabase = "localhost";
            $usernameDatabase = "root";
            $passwordDatabase = "";
            $databaseName = "mybaby";
            
            $conn = new mysqli($servernameDatabase, $usernameDatabase, $passwordDatabase, $databaseName);
            
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }
        
            $sql = "INSERT INTO patient (name, age, gender, nationality, birth_date, birth_place, parent_name, contact) VALUES ('$name', '$age', '$gender', '$nationality', '$birth_date', '$birth_place', '$parent', '$contact');";

            if($conn->query($sql) === TRUE){
                header( "refresh:3;url=patient_information.php" );
                echo '<h2 style="text-align: center; color:green; font-weight: bold;">Patient data inserted sucessfully.</h2>';
                echo '<h2 style="text-align: center; font-weight: bold;"><br>You\'ll be redirected in about 3 secs. If not, click <a href="patient_information.php">Click Here</a></h2>';
            } else {
                echo "Error inserting data: $conn->error";
            }
            $conn->close();
        }
    
    ?>
</body>
</html>