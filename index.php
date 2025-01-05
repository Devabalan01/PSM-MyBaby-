<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainLoginPage.css">
    <link rel="icon" href="./img/website-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <title>Voyage - Best Travel Website | Online Travel Planner/Dealer System | Book Hotels, Flights, Travel Locations.</title>
</head>
    <body style="background-image: url(./1.jpg); height: 78.5vh;">
        <div style="width: 100vw; height: 50vh; justify-content: center; align-items: center;">
            <div class="form-outer-container big-banner" style="margin: 0 auto;">
                <div id="main-container">
                    <div id="main-container-login" style="margin-left: 50px; margin-right: 30px;">
                    <p class="login-style-text" align="center" style="margin-left: 21px;">Login</p>
                    <form action="mainLoginCheck.php" method="get" class="form-element" id="form">
                        <div class="input-box-container">
                            <input class="login-id-input" type="number" id="login-id" name="login-id-input" align="center" placeholder="Login Id" required>
                        </div>
                        <div class="input-box-container">
                            <input class="login-password-input" type="password" id="password" name="password-input" align="center" placeholder="Password" required>
                        </div>

                        <div class="radio-button-container">
                            <legend class="user-text-style" style="font-weight: bold;"></legend>
                            <div class="user-type-container">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="login-type" value="administrator" id="gender_administrator">
                                    <label class="form-check-label">
                                    Administrator
                                    </label>
                                </div>
                                <div class="form-check margin-right">
                                    <input class="form-check-input" type="radio" name="login-type" value="user" id="gender_user">
                                    <label class="form-check-label">
                                    User
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br><br>

                        <button type="submit" name="submitButton" id="submitButtonId" class="submit">Login</button>
                        <br><br>
                        <!-- <br> -->
                        <div id="error" style="width: 100%; margin-left: 10px; line-height: 25px; text-align: center; color: red; font-weight: bold;"></div>
                    </form>
                    </div>

                    <div id="error-not-found" style="color: red; font-weight: bold;">
                        <div class="modal-container enable-animation">
                        <!-- <form class="modal-container enable-animation" action="submitUpdateDeleteHotel.php" method="get"> -->
                            <div class="avatar-image-container">
                                <h2 class="sign-in-heading txt-align-left padding-left-1rem">Error</h2>
                                <span onclick="document.getElementById('error-not-found').style.display='none'" class="btn-close" title="Close Modal">&times;</span>
                                <hr class="hr-tag">
                            </div>
                            <div class="login-container">
                                <label for="hotel-id"><i class="fas fa-exclamation-triangle" style="font-size: 20px; color: #ebc310;">&nbsp;&nbsp;&nbsp;&nbsp;</i><b style="color:black;">Login details are not found. Try to login again.</b></label>
                            </div>
                            <div class="login-container login-bottom-container" style="background-color:#f1f1f1">
                                <!-- <button type="submit" name="deleteBtn" class="btn btn-green">OK</button>
                                <button type="button" onclick="document.getElementById('id03').style.display='none'" class="btn btn-red">Cancel</button> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
        const login_id = document.getElementById('login-id');
        const password = document.getElementById('password');
        const form = document.getElementById('form');
        const errorElement = document.getElementById('error');

        form.addEventListener('submit', (e) => {
            let messages = [];
            if(login_id.value === '' || login_id.value == null){
                messages.push('Login id is required');
            }
            if(password.value.length < 3){
                messages.push('Password must be longer than 3 characters');
            }
            if(password.value.length >= 50){
                messages.push('Password must be less than 50 characters');
            }
            if(!(document.getElementById('gender_administrator').checked || document.getElementById('gender_user').checked)){
                messages.push('User type is not selected');
            }
            if(messages.length > 0){
                e.preventDefault();
                errorElement.innerText = messages.join(', ');
            }
        })
    </script>
    
        <?php
        ob_end_flush();
        ?>
        <!-- display error login popup -->
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            const queryString = window.location.search;
            const urlParameters = new URLSearchParams(queryString);
            const login_error = urlParameters.get('login-error');
            

            if(login_error === "true") {
                // alert("true");
                document.getElementById('error-not-found').style.display='block';
            } else {
                // alert("false");
                document.getElementById('error-not-found').style.display='none';
            }
        });
        // Get the modal
        var modal = document.getElementById('error-not-found');

        // When the user clicks anywhere outside of the modal, btn-close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    </body>
</html>