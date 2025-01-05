<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Medical Record</title>
</head>
<body>
    <div class="header-title-container">
        <h2>MYBABY</h2>
    </div><br><br>
    <div class="title-container">
        <h1>List of Medical Record Information</h1>
        <button type="button" class="add-details-button" onclick="document.getElementById('addBtn').style.display='block'">Add</button>
        <a href="select.php">
            <button type="button" class="add-details-button">Back</button>
        </a>
        <!-- <button style="margin-left: 0.5rem;" type="button" class="add-details-button" onclick="document.getElementById('uploadButton').style.display='block'">Upload Excel</button> -->
    </div>

    <br><hr class="horizontal-line-style"><br>

    <div>
        <div>
            <label class="title-styles">
                <h2>Search Details</h2>
            </label>
        </div>
        <div>
            <input type="text" class="search-bar" id="searchBar" onkeyup="myFunction()" placeholder="Enter your name...">
        </div>
    </div>

    <!-- Sql query for retrieve data from db -->
    <?php
        $servernameDatabase = "localhost";
        $usernameDatabase = "root";
        $passwordDatabase = "";
        $databaseName = "mybaby";

        $conn = new mysqli($servernameDatabase, $usernameDatabase, $passwordDatabase, $databaseName);

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
            
        $sql = "SELECT * FROM medical_record";
            
        $result = $conn->query($sql);
        $countRows = $result->num_rows;
    ?>
    <br><br>
    <!-- Table start -->
    <div style="width: 100%;">
        <div class="content-table-agent">
            <div>
                <?php
                    if ($result->num_rows > 0) {
                        echo '<h2 class="font-color-styles">All Medical Record Details</h2>
                            <table class="styled-table" id="tableData">
                                <thead>
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Blood Type</th>
                                        <th>Current Medication</th>
                                        <th>Incharge Doctor</th>
                                        <th>Weight (kg)</th>
                                        <th>Height (cm)</th>
                                        <th>Hepatitis B Vaccine</th>
                                        <th>Tetanus</th>
                                        <th>PCV</th>
                                        <th>BCG</th>
                                        <th>Blood Glucose Level (mg)</th>
                                        <th>Status</th>
                                        <th>User ID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>';
                            
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr class="active-row">
                                    <td>
                                        <?php echo $row['patient_name']?>
                                    </td>
                                    <td>
                                        <?php echo $row['blood_type']?>
                                    </td>
                                    <td>
                                        <?php echo $row['current_medication']?>
                                    </td>
                                    <td>
                                        <?php echo $row['incharge_doctor']?>
                                    </td>
                                    <td>
                                        <?php echo $row['weight']?>
                                    </td>
                                    <td>
                                        <?php echo $row['height']?>
                                    </td>
                                    <td>
                                        <?php echo $row['hepatitis_b_vaccine']?>
                                    </td>
                                    <td>
                                        <?php echo $row['tetanus']?>
                                    </td>
                                    <td>
                                        <?php echo $row['pcv']?>
                                    </td>
                                    <td>
                                        <?php echo $row['bcg']?>
                                    </td>
                                    <td>
                                        <?php echo $row['blood_glucose_level']?>
                                    </td>
                                    <td>
                                        <?php echo $row['status']?>
                                    </td>
                                    <td>
                                        <?php echo $row['user_id']?>
                                    </td>
                                    <td>
                                        <a href="updateRecord.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-cogs"></i></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                                </tbody>
                            </table>
                            <?php
                            } else {
                                echo '0 result';
                            }
                        ?>
            </div>
        </div>
    <div>

    <!-- modal for add staff details -->
    <div id="addBtn" class="modal">
            <form class="modal-container enable-animation" action="submitRecordDetails.php" method="get" enctype="multipart/form-data">
                <div class="avatar-image-container">
                    <h2 class="sign-in-heading txt-align-left padding-left-1rem">Add Medical Records</h2>
                    <span onclick="document.getElementById('addBtn').style.display='none'" class="btn-close" title="Close Modal">&times;</span>
                    <hr class="hr-tag">
                </div>

                <div class="login-container">

                    <label for="staff-name"><b>Patient Name</b></label>
                    <input type="text" placeholder="Enter Patient Name" name="patient-name" required>
                    <div class="space-between"></div>

                    <label for="staff-name"><b>Blood Type</b></label>
                    <input type="text" placeholder="Enter Blood Type" name="blood-type" required>
                    <div class="space-between"></div>

                    <label for="staff-name"><b>Current Medication</b></label>
                    <input type="text" placeholder="Enter Current Medication" name="current-medication" required>
                    <div class="space-between"></div>

                    <label for="staff-name"><b>Incharge Doctor</b></label>
                    <input type="text" placeholder="Enter Incharge Doctor" name="incharge-doctor" required>
                    <div class="space-between"></div>

                    <label for="staff-name"><b>Weight (kg)</b></label>
                    <input type="number" placeholder="Enter Weight (kg)" name="weight" step="any" required>
                    <div class="space-between"></div>

                    <label for="staff-name"><b>Height (cm)</b></label>
                    <input type="number" placeholder="Enter Height (cm)" name="height" step="any" required>
                    <div class="space-between"></div>

                    <label for="staff-name"><b>Hepatitis B Vaccine</b></label>
                    <input type="text" placeholder="Enter Hepatitis B Vaccine" name="hepatitis" required>
                    <div class="space-between"></div>    
                    
                    <label for="staff-name"><b>Tetanus</b></label>
                    <input type="text" placeholder="Enter Blood PH Level" name="tetanus" required>
                    <div class="space-between"></div> 

                    <label for="staff-name"><b>PCV</b></label>
                    <input type="text" placeholder="Enter PCV" name="pcv" required>
                    <div class="space-between"></div> 

                    <label for="staff-name"><b>BCG</b></label>
                    <input type="text" placeholder="Enter BCG" name="bcg" required>
                    <div class="space-between"></div> 

                    <label for="staff-name"><b>Blood Glucose Level (mg)</b></label>
                    <input type="number" placeholder="Enter Blood Glucose Level (mg)" name="glucose" step="any" required>
                    <div class="space-between"></div> 

                    <label for="staff-name"><b>Status</b></label>
                    <input type="text" placeholder="Enter Status" name="status" required>
                    <div class="space-between"></div>

                    <label for="staff-name"><b>User ID</b></label>
                    <input type="number" placeholder="Enter User ID" name="user-id" step="any" required>
                    <div class="space-between"></div> 

                    <button type="submit" class="login-btn submit" name="insertBtn">Submit</button>
                    <div class="create-account-error"></div>
                </div>
                <div class="login-container login-bottom-container" style="background-color:#f1f1f1"></div>
            </form>
        </div>

        <!-- modal for add excel file details -->
        <!-- <div id="uploadButton" class="modal">
            <form class="modal-container enable-animation" action="excelFile.php" method="post" enctype="multipart/form-data">
                <div class="avatar-image-container">
                    <h2 class="sign-in-heading txt-align-left padding-left-1rem">Upload Staff Details</h2>
                    <span onclick="document.getElementById('uploadButton').style.display='none'" class="btn-close" title="Close Modal">&times;</span>
                    <hr class="hr-tag">
                </div>

                <div class="login-container">

                    <label for="excel-file"><b>Choose Excel File</b></label>
                    <input type="file" name="file" required/>

                    <button class="styleButtonUpload" type="submit" name="submit_file">Upload</button>
                    <div class="create-account-error"></div>
                </div>
                <div class="login-container login-bottom-container" style="background-color:#f1f1f1"></div>
            </form>
        </div> -->

        <?php
            $conn->close();
        ?>

    <!-- javascript code for modal for add staff details  -->
    <script>
        // Get the pop up modal id
        var modal = document.getElementById('addBtn');

        // When the user clicks anywhere outside of the modal, btn-close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <!-- javascript code for modal for add staff details  -->
    <script>
        // Get the pop up modal id
        var modal2 = document.getElementById('uploadButton');

        // When the user clicks anywhere outside of the modal, btn-close it
        window.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }
    </script>

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchBar");
            filter = input.value.toUpperCase();
            table = document.getElementById("tableData");
            tr = table.getElementsByTagName("tr");
            
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                } 
            }
        }
  </script>
</body>
</html>