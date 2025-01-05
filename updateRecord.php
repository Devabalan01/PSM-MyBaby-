<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Update & Delete Medical Record Details</title>
</head>
<body>
    <div class="header-title-container">
        <h2>MYBABY</h2>
    </div><br><br>
    <div class="content-container">
    <div class="title-container">
        <h1>Update & Delete Details of Medical Record</h1>
        <a href="medicalRecord.php">
            <button type="button" class="add-details-button">Back</button>
        </a>
    </div>

    <br><hr class="horizontal-line-style"><br>

        <?php
            $id = $_GET['id'];
            
            $servernameName = "localhost";
            $usernameName = "root";
            $passwordName = "";
            $databaseName = "mybaby";
            $conn = new mysqli($servernameName, $usernameName, $passwordName, $databaseName);
            
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }
            
            // query to the database
            $sqlId = "SELECT * FROM medical_record
            WHERE medical_record.id=$id";

            // result of the query
            $result = $conn->query($sqlId);
            // change the result to the assciative array
            $row = $result->fetch_assoc();
        ?>

        <form action="submitUpdateDeleteRecordDetails.php" method="post" enctype="multipart/form-data" onSubmit="return formValidation();">
                <br><br>
                <div class="login-container" style="width: 40em; margin: 0 auto;"> 

                    <input class="input-field" style="display: none;" name="id" value="<?php echo $id;?>">

                    <label for="name"><b>Patience Name</b></label>
                    <input class="input-field" type="text" placeholder="Enter Patient Name" name="patient-name"  value="<?php echo $row['patient_name'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div>

                    <label for="name"><b>Blood Type</b></label>
                    <input class="input-field" type="text" placeholder="Enter Blood Type" name="blood-type"  value="<?php echo $row['blood_type'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div>

                    <label for="name"><b>Current Medication</b></label>
                    <input class="input-field" type="text" placeholder="Enter Current Medication" name="current-medication"  value="<?php echo $row['current_medication'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div>

                    <label for="name"><b>Incharge Doctor</b></label>
                    <input class="input-field" type="text" placeholder="Enter Incharge Doctor" name="incharge-doctor"  value="<?php echo $row['incharge_doctor'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div>

                    <label for="name"><b>Weight (kg)</b></label>
                    <input class="input-field" type="number" placeholder="Enter Weight (kg)" name="weight"  value="<?php echo $row['weight'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div>

                    <label for="name"><b>Height (cm)</b></label>
                    <input class="input-field" type="number" placeholder="Enter Height (cm)" name="height"  value="<?php echo $row['height'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div>

                    <label for="name"><b>Hepatitis B Vaccine</b></label>
                    <input class="input-field" type="text" placeholder="Enter Hepatitis B Vaccine" name="hepatitis"  value="<?php echo $row['hepatitis_b_vaccine'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div>

                    <label for="name"><b>Tetanus</b></label>
                    <input class="input-field" type="text" placeholder="Enter Tetanus" name="tetanus"  value="<?php echo $row['tetanus'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div>

                    <label for="name"><b>PCV</b></label>
                    <input class="input-field" type="text" placeholder="Enter PCV" name="pcv"  value="<?php echo $row['pcv'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div>

                    <label for="name"><b>BCG</b></label>
                    <input class="input-field" type="text" placeholder="Enter BCG" name="bcg"  value="<?php echo $row['bcg'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div>

                    <label for="name"><b>Blood Glucose Level (mg)</b></label>
                    <input class="input-field" type="number" placeholder="Enter Blood Glucose Level (mg)" name="glucose"  value="<?php echo $row['blood_glucose_level'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div>

                    <label for="name"><b>Status</b></label>
                    <input class="input-field" type="text" placeholder="Enter Status" name="status"  value="<?php echo $row['status'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div>

                    <!-- <label for="name"><b>User ID</b></label>
                    <input class="input-field" type="number" placeholder="Enter User ID" name="user-id"  value="<?php echo $row['user_id'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div> -->

                    <button type="submit" class="btn btn-green" name="updateBtn">Update</button>
                    <button type="button" class="btn btn-red" name="deletePopUp" onclick="document.getElementById('id03').style.display='block'">Delete</button>
                    <div class="create-account-error"></div>
                </div>
            <br>

            <!-- Modal for popup after delete button clicked -->
            <div id="id03" class="modal">
                <div class="modal-container enable-animation">
                <!-- <form class="modal-container enable-animation" action="submitUpdateDeleteHotel.php" method="get"> -->
                    <div class="avatar-image-container">
                        <h2 class="sign-in-heading txt-align-left padding-left-1rem">Confirm</h2>
                        <span onclick="document.getElementById('id03').style.display='none'" class="btn-close" title="Close Modal">&times;</span>
                        <hr class="hr-tag">
                    </div>
                    <div class="login-container">
                        <label for="delete-confirmation-popup"><b>Are you sure want to delete?</b></label>
                    </div>
                    <div class="login-container login-bottom-container" style="background-color:#f1f1f1">
                        <button type="submit" name="deleteBtn" class="btn btn-green">OK</button>
                        <button type="button" onclick="document.getElementById('id03').style.display='none'" class="btn btn-red">Cancel</button>
                    </div>
                </div>
                </form>
            </div>
            <?php
                $conn->close();
            ?>
    </div>
</body>
</html>