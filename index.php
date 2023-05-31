<?php session_start(); ?>
<!DOCTYPE html>
<html>

    <head>
        <?php include_once("includes/head.html"); ?>
		<style>
			body{
				background: url(images/indexbg.jpg) no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
			main{
				position: relative;
				animation-name: moveUp;
				animation-duration: 1s;
			}
			@keyframes moveUp{
				from{top:50px;}
				to{top:0px;}
			}
			.modal {
				display: none;
				position: fixed; 
				z-index: 999999;
				left: 0;
				top: 0;
				width: 100%;
				height: 100%;
				overflow: auto; 
				background-color: rgb(0,0,0); 
				background-color: rgba(0,0,0,0.4); 
			}
			.modal-content {
				background-color: #fefefe;
				margin-top: 10%; 
				padding: 20px;
			}
			.nav-link:hover{
				-webkit-text-stroke: 1px white;
				font-size:1.1em
			}
			#loader {  
				position: fixed;  
				left: 0px;  
				top: 0px;  
				width: 100%;  
				height: 100%;  
				z-index: 9999;  
				background: url('images/loading.gif') 50% 50% no-repeat rgb(249,249,249);  
			}  
		</style>
    </head>
    <body>

		<div id="loader"></div>  

        <?php include_once("includes/header.php"); ?>

		<div class="cover-container d-flex  w-75 h-100 p-2 p-md-3 mx-auto flex-column text-center">

			<main class="p-2 p-md-4 shadow" style="background-color: rgba(255, 255, 255, .7); border-radius:20px;">
				
				<div class="align-self-center">

					<h1 style="font-family: 'Russo One', sans-serif; font-size: 5vw" class="text-wrap">LIFTOFF Calendar</h1>
					
					<p class="lead">In times like these, your time is important!
					Let us help you manage your time with our online planner! Upload your classes, assignments, practices, shifts, 
					and never worry about falling behind again.</p>

					<?php //include_once("includes/wip.html"); ?>

					<p class="lead">
						<a href="calendars.php" class="btn btn-lg btn-outline-primary fw-bold mt-3">Get Started</a>
					</p>

				</div>

			</main>
		</div>

		<?php include_once("includes/jquery.html"); ?>

		<script>

			$(document).ready(function(){ 
				$('header').removeClass('bg-dark shadow')
				$('footer').removeClass('bg-dark border bottom-0').addClass('fixed-bottom')
				$('title').text($('title').text()+" - Home")
				$('#theme').remove()

				$("#myModal").css("display", "block");

				$(document).on('click', '.close', function(){
					$("#myModal").css("display", "none");
				});
 
				$("#loader").fadeOut(1000);
			});

			
		</script>
    </body>
    
<html>
