<?php
  session_start();
  
  if (! isset($_SESSION['user'])) {
      header('Location: login.php');
  }
  
?>
<!DOCTYPE html>
<html>

    <head>
        <!-- Include Head Info (Meta Tags) -->
        <?php include_once("includes/head.html"); ?>

        <?php include_once("includes/alert.html"); ?>
    </head>

    <body style="background-color: blue">
        <?php include_once("includes/header.php"); ?>

        <div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">

			<main>
                <div class="row">
                    <div class="col-lg-4">
                
                        <div class="card h-100">
                            
                            <div class="card-header bg-transparent text-center">
                                <img id="pfp" class="pfp m-5" style="border: 5px solid black; border-radius:50%" height="150" width="150" src="https://images.halloweencostumes.com/products/74065/1-1/kirby-adult-inflatable-costume.jpg" alt="prof dp" width="100" height= "100">
                                <h3 class="mt-2"> <?php echo $_SESSION['name']; ?></h3>
                            </div>
                
                            <div class="card-body text-center">
                                <p class="mb-0"><strong class="pr-1">Email:</strong> <?php echo $_SESSION['email']; ?> </p>
                            </div>
                
                        </div>

                    </div>
                    
                    <div class="col-lg-8">
                    
                        <div class="card shadow-sm mb-3">
                            <div class="card-header bg-transparent border-0">
                                <h3 class="mb-1 text-decoration-underline">Biography</h3>
                                <div class="card-body pt-0 ps-0 mb-0 pb-0">
                                    <p> 
                                        <?php
                                            $b = $_SESSION['bio'];
                                            if($b == '')
                                                echo "This user has no bio yet. Please create a bio.";
                                            else
                                                echo $b; 
                                        ?>
                                    </p>
                                </div>
                            </div>                
                        </div>

                        <div class="card shadow-sm mb-3">
                            <div class="card-header bg-transparent border-0">
                                <h3 class="mb-1 text-decoration-underline">Notifications</h3>
                            </div>
                
                            <div class="card-body pt-0">
                                <p>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" value="" name="notifSetting" id="noNotif" <?php if($_SESSION['notif'] == 1) echo "checked";?>>
                                    <label class="form-check-label" for="notifSetting">
                                        Don't send me notifications
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" value="" name="notifSetting" id="notif" <?php if($_SESSION['notif'] == 0) echo "checked";?>>
                                    <label class="form-check-label" for="notifSetting">
                                        Annoy me with notifications idrc
                                    </label>
                                    </div>
                                </p>
                            </div>
                        </div>
                
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent border-0">
                                <h3 class="mb-1 text-decoration-underline">Theme Preference</h3>
                                <div class="card-body pt-0 ps-0 mb-0 pb-0">
                                    <input id = "colorpicker" type = "color">
                                    <button onclick = "changecolor();"> Change Profile Color Scheme </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</main>

		</div>

		<?php include_once("includes/jquery.html"); ?>

        <script src="scripts/custom.js"></script>

		<script>
			$(document).ready(function(){
				$('header').removeClass('bg-dark shadow')
				$('footer').removeClass('bg-dark border bottom-0').addClass('fixed-bottom')
				$('title').text($('title').text()+" - Profile")
				$('#theme').remove()

                $(document).on('click', '#notif', function(){
                    $.ajax({
                        type:"POST",
                        url:"scripts/updateNotifications.php",
                        data:{
                            num: 0
                        },
                        success:function(response){
                            customAlert("good", "Lmao hope you enjoy spam");
                        },
                        error:function(){
                            alert("Connection Error.  Please contact your system administrator.");
                        }
                    });
                });

                $(document).on('click', '#noNotif', function(){
                    $.ajax({
                        type:"POST",
                        url:"scripts/updateNotifications.php",
                        data:{
                            num: 1
                        },
                        success:function(response){
                            customAlert("bad", "Surely you will definitely not be emailed anymore...");
                        },
                        error:function(){
                            alert("Connection Error.  Please contact your system administrator.");
                        }
                    });
                });
			});
		</script>

        <script>
            function changecolor(){
                let color = document.getElementById('colorpicker').value;
                document.body.style.backgroundColor = color; 
                document.getElementById('pfp').style.border="5px solid "+color;
                $.ajax({
                    type:"POST",
                    url:"scripts/updateColors.php",
                    data:{
                        c: color
                    },
                    success:function(response){
                            customAlert("good", "Color saved!");
                    },
                    error:function(){
                        alert("Connection Error.  Please contact your system administrator.");
                    }
                });
            }
        </script>

    </body>
    
<html>

