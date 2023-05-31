<?php
    session_start();
?>

<!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="generator" content="Hugo 0.84.0">
            <title>Please Sign In</title>

            <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

            <!-- Bootstrap core CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

            <!-- Favicons -->
            <link rel="apple-touch-icon" href="icon.png" sizes="180x180">
            <link rel="icon" href="icon.png" sizes="32x32" type="image/png">
            <link rel="icon" href="icon.png" sizes="16x16" type="image/png">
            <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
            <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
            <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
            <meta name="theme-color" content="#7952b3">
    
            <style>
                .button {
                width: 50%;
                //float: right;
                border: black;
                color: white;
                padding: 8px 16px;
                text-align: center;
                text-decoraction: none;
                /*display: inline-block;*/
                font-size: 16px;
                margin: auto;
                transition-duration: 0.4s;
                cursor: pointer;
                }
                .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                }

                @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
                }
                body{
                background: url(Pictures/blueBG.jpg) no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                }
                .form-floating{

                margin: auto;
                width: 50%;
                border: 2px solid blue;
                border-bottom-left-radius: 25px;
                border-top-right-radius: 25px;
                padding: 50px;
                //float: right;
                text-align: center;
                }
            </style>

            <!-- Custom styles for this template -->
            <link href="style`.css" rel="stylesheet">
        </head>

        <body class="text-center">

            <main class="form-signin">
                <br/>
                <img class="mb-4" src="icon.png" alt="" width="60" height="57" style="padding:5px; border:3px solid black; border-radius: 50%">
                <h1 class="h3 mb-3 fw-normal">Make your account</h1>
                
                <div class="form-floating">
                <input type="email" name="email" id="email" class="form-control" id="floatingInput" placeholder="name@example.com" size="1" style="background-color: lightblue" >
                <label for="floatingInput">Email address</label>
                </div>
                <br>

                <div class="form-floating">
                <input type="text" name="firstName" id="firstName" class="form-control" id="floatingPassword" placeholder="Password" style="background-color: lightblue">
                <label for="floatingPassword">First Name</label>
                </div>
                <br>
                <div class="form-floating">
                <input type="text" name="lastName" id="lastName" class="form-control" id="floatingPassword" placeholder="Password" style="background-color: lightblue">
                <label for="floatingPassword">Last Name</label>
                </div>              

                
                <br>
                <div class="form-floating">
                <input type="password" name="password" id="password" class="form-control" id="floatingPassword" placeholder="Password" style="background-color: lightblue">
                <label for="floatingPassword">Enter Password</label>
                </div>
                <br>
                <div class="form-floating">
                <input type="password" name="passwordConf" id="passwordConf" class="form-control" id="floatingPassword" placeholder="Password" style="background-color: lightblue">
                <label for="floatingPassword">Re-enter Password</label>
                </div>
                

                <p>
                </p>
                <div class="w-50 btn btn-lg btn-primary button" id="makeAccount" name="submit" value="Login">Make Account</div>
                <p>
                </p>
                <p class="mt-5 mb-3 text-muted">&copy; Group 8</p>
            </main>

            <?php include_once("includes/jquery.html"); ?>
            
            <script>
                $(document).ready(function(){
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
                                    //if(response!="none") customAlert("bad", response);
                                    //else window.location.href="calendars.php"
                                    alert("Account successfully created")
                                    //alert(response)
                                    window.location.replace("http://127.0.0.1/calendars.php");
    
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
    </html>
