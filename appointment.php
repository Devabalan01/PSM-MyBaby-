<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Appointment Schedule</title>
</head>
<body>
    <div class="header-title-container">
        <h2>MYBABY</h2>
    </div><br><br>
    <div class="title-container">
        <h1>List of Appointment Schedule Information</h1>
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
            
        $sql = "SELECT * FROM appointment_schedule";
            
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
                        echo '<h2 class="font-color-styles">All Appointment Schedule Details</h2>
                            <table class="styled-table" id="tableData">
                                <thead>
                                    <tr>
                                        <th>Previous Date</th>
                                        <th>Current Date</th>
                                        <th>Upcoming Date</th>
                                        <th>User ID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>';
                            
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr class="active-row">
                                    <td>
                                        <?php echo $row['previous_date']?>
                                    </td>
                                    <td>
                                        <?php echo $row['present_date']?>
                                    </td>
                                    <td>
                                        <?php echo $row['upcoming_date']?>
                                    </td>
                                    <td>
                                        <?php echo $row['user_id']?>
                                    </td>
                                    <td>
                                        <a href="updateAppointment.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-cogs"></i></a>
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
            <form class="modal-container enable-animation" action="submitAppointmentDetails.php" method="get" enctype="multipart/form-data">
                <div class="avatar-image-container">
                    <h2 class="sign-in-heading txt-align-left padding-left-1rem">Add Appointment Schedule</h2>
                    <span onclick="document.getElementById('addBtn').style.display='none'" class="btn-close" title="Close Modal">&times;</span>
                    <hr class="hr-tag">
                </div>

                <div class="login-container">
                    <label for="staff-name"><b>Previous Date</b></label>
                    <input type="date" placeholder="Enter Previous Date" name="previous-date" required>
                    <div class="space-between"></div>

                    <label for="staff-name"><b>Current Date</b></label>
                    <input type="date" placeholder="Enter Current Date" name="current-date" required>
                    <div class="space-between"></div>

                    <label for="staff-name"><b>Upcoming Date</b></label>
                    <input type="date" placeholder="Enter Upcoming Date" name="upcoming-date" required>
                    <div class="space-between"></div>
                    
                    <label for="staff-name"><b>User ID</b></label>
                    <input type="number" placeholder="Enter User" name="user-id" step="any" required>
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