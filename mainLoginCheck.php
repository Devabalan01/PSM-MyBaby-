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
        if(isset($_GET['submitButton'])){
            $login_id = $password = $login_type = "";
            $login_id = $_GET['login-id-input'];
            $password = $_GET['password-input'];
            $login_type = $_GET['login-type'];
            
            
            if($login_id && $password){
                if($login_type == "administrator"){
                    $servername = "localhost";
                    $username = "root";
                    $passwordDatabase = "";
                    $databaseName = "myBaby";

                    $conn = new mysqli($servername, $username, $passwordDatabase, $databaseName);
                    
                    if($conn->connect_error){
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    $sql = "SELECT * FROM admin
                    WHERE id='$login_id' AND password='$password'";

                    $result = $conn->query($sql);
                    
                    if($result->num_rows > 0){
                        session_start();
                        header("location:validateAdmin.php?login-id-input=".$login_id);

                    } else {
                        header("location:index.php?login-error=true");
                    }
                    $conn->close();

                }
                else if($login_type == "user"){
                    $servernameDatabase = "localhost";
                    $usernameDatabase = "root";
                    $passwordDatabase = "";
                    $databaseName = "myBaby";
                    
                    $conn = new mysqli($servernameDatabase, $usernameDatabase, $passwordDatabase, $databaseName);
                    
                    if($conn->connect_error){
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT * FROM user
                    WHERE id='$login_id' AND password='$password'";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0) {
                        
                        session_start();
                        header("location:validateUser.php?login-id-input=".$login_id."&login-type=".$login_type);

                    } else {
                        header("location:index.php?login-error=true");
                    }
                    $conn->close();
                }
            }else{
                echo "<script>
                            const errorElement = document.getElementById('error');
                            errorElement.innerText = 'Error: To search, you should fill up all columns';
                        </script>";
            }
        }
    ?>
</body>
</html>