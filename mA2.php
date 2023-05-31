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
            <div class="h3">Create Account</div>
        </div>

        <!-- Email Input -->
        <div class="d-flex justify-content-center mt-2">
            <div class="w-50 p-2 border border-4 border-info" style="border-bottom-left-radius: 25px; border-top-right-radius: 25px;">
                <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com" size="1" style="background-color: lightblue" >
                <label for="floatingInput">Email address</label>
            </div>
        </div>

        <!-- Password Input -->
        <div class="d-flex justify-content-center mt-2">
            <div class="w-50 p-2 border border-4 border-info" style="border-bottom-left-radius: 25px; border-top-right-radius: 25px;">
                <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name" style="background-color: lightblue">
                <label for="firstName">First Name</label>
            </div>
        </div>

        <!-- Password Input -->
        <div class="d-flex justify-content-center mt-2">
            <div class="w-50 p-2 border border-4 border-info" style="border-bottom-left-radius: 25px; border-top-right-radius: 25px;">
                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name" style="background-color: lightblue">
                <label for="lastName">Last Name</label>
            </div>
        </div>

        <!-- Password Input -->
        <div class="d-flex justify-content-center mt-2">
            <div class="w-50 p-2 border border-4 border-info" style="border-bottom-left-radius: 25px; border-top-right-radius: 25px;">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" style="background-color: lightblue">
                <label for="password">Password</label>
            </div>
        </div>

        <!-- Confirm Password Input -->
        <div class="d-flex justify-content-center mt-2">
            <div class="w-50 p-2 border border-4 border-info" style="border-bottom-left-radius: 25px; border-top-right-radius: 25px;">
                <input type="password" name="passwordConf" id="passwordConf" class="form-control" placeholder="Password" style="background-color: lightblue">
                <label for="passwordConf"> Re-enter Password</label>
            </div>
        </div>

        <!-- Register Button -->
        <div class="d-flex justify-content-center my-2">
            <div class="btn btn-info w-50" id="makeAccount">Create Account</div>
        </div>

        <?php include_once("includes/jquery.html"); ?>

        <script src="scripts/custom.js"></script>
        <script>
            $(document).ready(function(){
                $("footer").remove()
                $("title").text($("title").text()+" - Make Account");

                $(document).on('click', '#makeAccount', function(){
                        
                        var email = $("#email").val();
                        var pw = $("#password").val();
                        var cpw = $("#passwordConf").val();
                        var fn=$("#firstName").val();
                        var ln=$("#lastName").val();
                        
                        if(pw==cpw && email!='' && fn!='' && ln!='' && pw!=''){
                            //alert("match")
                            $.ajax({
                                type:"POST",
                                url:"scripts/makeAccs.php",
                                data:{
                                    e: email,
                                    p: pw,
                                    f: fn,
                                    l: ln
                                },
                                success:function(response){
                                    alert("Account successfully created")
                                    window.location.replace("calendars.php");
    
                                },
                                error:function(){
                                    alert("Connection Error.  Please contact your system administrator.");
                                }
                            });
                        }

                        else{
                            if (email==''){
                                alert("Enter Your Email");
                            }
                            else if (fn==''){
                                alert("Enter Your First Name");
                            }
                            else if (ln==''){
                                alert("Enter Your Last Name");
                            }
                            else if (pw==''){
                                alert("Enter Your Password");
                            }
                            else if (cpw==''){
                                alert("Confirm Your Password");
                            }
                            //alert("else")
                        }

                    });
            });
        </script>
    </body>
<html>