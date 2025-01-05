<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Update & Delete Appointment Schedule Details</title>
</head>
<body>
    <div class="header-title-container">
        <h2>MYBABY</h2>
    </div><br><br>
    <div class="content-container">
    <div class="title-container">
        <h1>Update & Delete Details of Appointment Schedule</h1>
        <a href="appointment.php">
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
            $sqlId = "SELECT * FROM appointment_schedule
            WHERE appointment_schedule.id=$id";

            // result of the query
            $result = $conn->query($sqlId);
            // change the result to the assciative array
            $row = $result->fetch_assoc();
        ?>

        <form action="submitUpdateDeleteAppointmentDetails.php" method="post" enctype="multipart/form-data" onSubmit="return formValidation();">
                <br><br>
                <div class="login-container" style="width: 40em; margin: 0 auto;"> 

                    <input class="input-field" style="display: none;" name="id" value="<?php echo $id;?>">

                    <label for="name"><b>Previous Date</b></label>
                    <input class="input-field" type="date" name="previous-date"  value="<?php echo $row['previous_date'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div>

                    <label for="name"><b>Current Date</b></label>
                    <input class="input-field" type="date" name="current-date"  value="<?php echo $row['present_date'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div>

                    <label for="name"><b>Upcoming Date</b></label>
                    <input class="input-field" type="date" name="upcoming-date"  value="<?php echo $row['upcoming_date'];?>" required>
                    <div id="staff-name-error-message" style="color: red; font-size: 14px; font-weight: bold;"></div>
                    <div class="space-between"></div>

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