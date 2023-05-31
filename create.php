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

    <body>
        <!-- Include Header w/ Nav -->
        <?php include_once("includes/header.php"); ?>

        <!-- Main Part of Page -->
        <div class="container-fluid">
            <div class="row">

                <!-- Include Sidebar -->
                <?php include_once("includes/sidebar.html"); ?>

                <!-- Main Section of the Page -->
                <main class="col-md-9 ms-sm-auto col-lg-10 min-vh-100 p-0">
                    
                    <div class="px-md-4 min-vh-100">
                        <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            
                            <?php  
                                $type = $_GET['t'];
                                if($type == "cat") include("forms/catForm.html");
                                else if($type == "nev") include("forms/evForm.php");
                                else if($type == "cal") include("forms/calform.html");
                            ?>
                            
                        </div>
                    </div>

                    <?php include_once("includes/jquery.html"); ?>
                </main>


            </div>
        </div>

        <script src="scripts/custom.js"></script>
        <script>
            // Document Ready, Run JQuery Functions
            $(document).ready(function(){
                $("title").text($("title").text()+" - Create");
            });

        </script>
    </body>
<html>