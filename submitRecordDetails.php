<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Medical Record Details</title>
</head>
<body>
<?php
        if(isset($_GET['insertBtn'])){
            $patient = $_GET['patient-name'];
            $blood_type = $_GET['blood-type'];
            $current_medication = $_GET['current-medication'];
            $incharge_doctor = $_GET['incharge-doctor'];
            $weight = $_GET['weight'];
            $height = $_GET['height'];
            $hepatitis = $_GET['hepatitis'];
            $tetanus = $_GET['tetanus'];
            $pcv = $_GET['pcv'];
            $bcg = $_GET['bcg'];
            $glucose = $_GET['glucose'];
            $status = $_GET['status'];
            $user_id = $_GET['user-id'];

            $servernameDatabase = "localhost";
            $usernameDatabase = "root";
            $passwordDatabase = "";
            $databaseName = "mybaby";
            
            $conn = new mysqli($servernameDatabase, $usernameDatabase, $passwordDatabase, $databaseName);
            
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }
        
            $sql = "INSERT INTO medical_record (patient_name, blood_type, current_medication, incharge_doctor, weight, height, hepatitis_b_vaccine, tetanus, pcv, bcg, blood_glucose_level, status, user_id) VALUES ('$patient', '$blood_type', '$current_medication', '$incharge_doctor', '$weight', '$height', '$hepatitis', '$tetanus', '$pcv', '$bcg', '$glucose', '$status', '$user_id');";

            if($conn->query($sql) === TRUE){
                header( "refresh:3;url=medicalRecord.php" );
                echo '<h2 style="text-align: center; color:green; font-weight: bold;">Medical Record data inserted sucessfully.</h2>';
                echo '<h2 style="text-align: center; font-weight: bold;"><br>You\'ll be redirected in about 3 secs. If not, click <a href="medicalRecord.php">Click Here</a></h2>';
            } else {
                echo "Error inserting data: $conn->error";
            }
            $conn->close();
        }
    
    ?>
</body>
</html>