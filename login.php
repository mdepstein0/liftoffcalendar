<?php
  session_start();
  
  if (isset($_SESSION['user'])) {
      header('Location: calendars.php');
  }
  
?>
<!DOCTYPE html>
<html>

    <head>
        <!-- Include Head Info (Meta Tags) -->
        <?php include_once("includes/head.html"); ?>

        <?php include_once("includes/alert.html"); ?>
    </head>

    <body>

        <!-- Log In Icon -->
        <div class="d-flex justify-content-center mt-3">
            <img src="images/icon.png" width="60" height="57" class="border border-3 border-dark rounded-circle">
        </div>

        <!-- "Please Sign In" Text -->
        <div class="d-flex justify-content-center mt-1">
            <div class="h3">Please Sign In</div>
        </div>

        <!-- Email Input -->
        <div class="d-flex justify-content-center mt-2">
            <div class="w-50 p-2 border border-4 border-info" style="border-bottom-left-radius: 25px; border-top-right-radius: 25px;">
                <label for="floatingInput">Email address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com" size="1" style="background-color: lightblue" >
            </div>
        </div>

        <!-- Password Input -->
        <div class="d-flex justify-content-center mt-2">
            <div class="w-50 p-2 border border-4 border-info" style="border-bottom-left-radius: 25px; border-top-right-radius: 25px;">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" style="background-color: lightblue"/>
                <i class="bi bi-eye-slash float-end" style="margin-top:-40px; margin-right:20px; position:relative; z-index:9999999;" id="togglePassword"></i>
            </div>
        </div>

        <!-- Log In Button -->
        <div class="d-flex justify-content-center mt-2">
            <div class="btn btn-primary w-50" id="loginButton">Log In</div>
        </div>

        <!-- Register Button -->
        <div class="d-flex justify-content-center my-2">
            <div class="btn btn-info w-50"><a href="mA2.php" >Don't have an account? Register</a></div>
        </div>

        <?php include_once("includes/jquery.html"); ?>

        <script src="scripts/custom.js"></script>
        <script>
            $(document).ready(function(){
                $("footer").remove()
                $("title").text($("title").text()+" - Login");

                $(document).on('click', '#togglePassword', function(){
                    if($(this).hasClass("bi-eye-slash")){
                        $(this).removeClass("bi-eye-slash")
                        $(this).addClass("bi-eye")
                        $(this).prev().attr("type", "text")
                    }
                    else{
                        $(this).removeClass("bi-eye")
                        $(this).addClass("bi-eye-slash")
                        $(this).prev().attr("type", "password")
                    }
                });
            });
        </script>
    </body>
<html>