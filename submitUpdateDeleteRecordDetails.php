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
            $patient = $_POST['patient-name'];
            $blood_type = $_POST['blood-type'];
            $current_medication = $_POST['current-medication'];
            $incharge_doctor = $_POST['incharge-doctor'];
            $weight = $_POST['weight'];
            $height = $_POST['height'];
            $hepatitis = $_POST['hepatitis'];
            $tetanus = $_POST['tetanus'];
            $pcv = $_POST['pcv'];
            $bcg = $_POST['bcg'];
            $glucose = $_POST['glucose'];
            $status = $_POST['status'];

            $servernameDatabase = "localhost";
            $usernameDatabase = "root";
            $passwordDatabase = "";
            $databaseName = "mybaby";
            
            $conn = new mysqli($servernameDatabase, $usernameDatabase, $passwordDatabase, $databaseName);
            
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }
        
            $sql = "UPDATE medical_record
            SET patient_name='$patient',
            blood_type='$blood_type',
            current_medication='$current_medication',
            incharge_doctor='$incharge_doctor',
            weight='$weight',
            height='$height',
            hepatitis_b_vaccine='$hepatitis',
            tetanus='$tetanus',
            pcv='$pcv',
            bcg='$bcg',
            blood_glucose_level='$glucose',
            status='$status'
            WHERE id='$id'";

            if($conn->query($sql) === TRUE){
                header( "refresh:3;url=medicalRecord.php" );
                echo '<h2 style="text-align: center; color:green; font-weight: bold;">Medical Record data updated successfully.</h2>';
                echo '<h2 style="text-align: center; font-weight: bold;"><br>You\'ll be redirected in about 3 secs. If not, click <a href="medicalRecord.php">Click Here</a></h2>';
            } else {
                header( "refresh:3;url=medicalRecord.php" );
                echo '<h2 style="text-align: center; color:red; font-weight: bold;">Error in updating Medical Record data: '.$conn->error.'</h2>';
                echo '<h2 style="text-align: center; font-weight: bold;"><br>You\'ll be redirected in about 3 secs. If not, click <a href="medicalRecord.php">Click Here</a></h2>';
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

            $sql = "DELETE FROM medical_record
            WHERE id='$id'";

            if($conn->query($sql) === TRUE){
                header( "refresh:3;url=medicalRecord.php" );
                echo '<h2 style="text-align: center; color:green; font-weight: bold;">Medical Record data deleted successfully.</h2>';
                echo '<h2 style="text-align: center; font-weight: bold;"><br>You\'ll be redirected in about 3 secs. If not, click <a href="medicalRecord.php">Click Here</a></h2>';
            } else {
                header( "refresh:3;url=medicalRecord.php" );
                echo '<h2 style="text-align: center; color:red; font-weight: bold;">Error in deleting Medical Record data: '.$conn->error.'</h2>';
                echo '<h2 style="text-align: center; font-weight: bold;"><br>You\'ll be redirected in about 3 secs. If not, click <a href="medicalRecord.php">Click Here</a></h2>';
            }
        
            $conn->close();
        }
    
    ?>
</body>
</html>