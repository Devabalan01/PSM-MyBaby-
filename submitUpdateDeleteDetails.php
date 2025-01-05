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
            $name = $_POST['name'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $nationality = $_POST['nationality'];
            $birth_date = $_POST['birth_date'];
            $birth_place = $_POST['birth_place'];
            $parent = $_POST['parent'];
            $contact = $_POST['contact'];

            $servernameDatabase = "localhost";
            $usernameDatabase = "root";
            $passwordDatabase = "";
            $databaseName = "mybaby";
            
            $conn = new mysqli($servernameDatabase, $usernameDatabase, $passwordDatabase, $databaseName);
            
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }
        
            $sql = "UPDATE patient
            SET name='$name',
            age='$age',
            gender='$gender',
            nationality='$nationality',
            birth_date='$birth_date',
            birth_place='$birth_place',
            parent_name='$parent',
            contact='$contact'
            WHERE id='$id'";

            if($conn->query($sql) === TRUE){
                header( "refresh:3;url=patient_information.php" );
                echo '<h2 style="text-align: center; color:green; font-weight: bold;">Patient data updated successfully.</h2>';
                echo '<h2 style="text-align: center; font-weight: bold;"><br>You\'ll be redirected in about 3 secs. If not, click <a href="patient_information.php">Click Here</a></h2>';
            } else {
                header( "refresh:3;url=patient_information.php" );
                echo '<h2 style="text-align: center; color:red; font-weight: bold;">Error in updating Patient data: '.$conn->error.'</h2>';
                echo '<h2 style="text-align: center; font-weight: bold;"><br>You\'ll be redirected in about 3 secs. If not, click <a href="patient_information.php">Click Here</a></h2>';
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

            $sql = "DELETE FROM patient
            WHERE id='$id'";

            if($conn->query($sql) === TRUE){
                header( "refresh:3;url=patient_information.php" );
                echo '<h2 style="text-align: center; color:green; font-weight: bold;">Patient data deleted successfully.</h2>';
                echo '<h2 style="text-align: center; font-weight: bold;"><br>You\'ll be redirected in about 3 secs. If not, click <a href="patient_information.php">Click Here</a></h2>';
            } else {
                header( "refresh:3;url=patient_information.php" );
                echo '<h2 style="text-align: center; color:red; font-weight: bold;">Error in deleting Patient data: '.$conn->error.'</h2>';
                echo '<h2 style="text-align: center; font-weight: bold;"><br>You\'ll be redirected in about 3 secs. If not, click <a href="patient_information.php">Click Here</a></h2>';
            }
        
            $conn->close();
        }
    
    ?>
</body>
</html>