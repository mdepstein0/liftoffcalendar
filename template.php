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
                    
                    <!-- Put CODE here -->
                    <div class="px-md-4 min-vh-100">

                    </div>

                    <?php include_once("includes/jquery.html"); ?>
                </main>

            </div>
        </div>

        <script src="scripts/custom.js"></script>
    </body>
<html>