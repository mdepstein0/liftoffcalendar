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

        <style>
            .manageOption:hover{
                transform: scale(1.1);
            }
        </style>
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
                        
                        <h1 class="pt-3 mb-0"> Create </h1>
                        <hr class="mt-0"/>
                        <div class="d-flex justify-content-between flex-wrap flex-lg-nowrap align-items-center pb-2"> 
                            <div id="c-cal" class="manageOption border border-secondary rounded py-3 mx-2 text-center fs-2 shadow" style="width:30%">
                               <i class="fa-solid fa-calendar-plus fs-1"></i>
                               <br/>
                               New Calendar
                            </div>
                            <div id="c-cat" class="manageOption border border-secondary rounded py-3 mx-2 text-center fs-2 shadow" style="width:30%">
                                <i class="fa-solid fa-folder-plus fs-1"></i>
                                <br>
                                New Category
                            </div>
                            <div id="c-nev" class="manageOption border border-secondary rounded py-3 mx-2 text-center fs-2 shadow" style="width:30%">
                                <i class="fa-solid fa-square-plus fs-1"></i>
                                <br/>
                                New Event
                            </div>
                        </div>

                        <h1 class="pt-3 mb-0"> Manage </h1>
                        <hr class="mt-0"/>
                        <div class="d-flex justify-content-between flex-wrap flex-lg-nowrap align-items-center pb-5"> 
                            <div id="m-cal" class="manageOption border border-secondary rounded py-3 mx-2 text-center fs-2 shadow" style="width:30%">
                                <i class="fa-regular fa-calendar-days fs-1"></i>
                                <br/>
                                My Calendars
                            </div>
                            <div id="m-cat" class="manageOption border border-secondary rounded py-3 mx-2 text-center fs-2 shadow" style="width:30%">
                                <i class="fa-brands fa-elementor fs-1"></i>
                                <br>
                                My Categories
                            </div>
                            <div id="m-mev" class="manageOption border border-secondary rounded py-3 mx-2 text-center fs-2 shadow" style="width:30%">
                                <i class="fa-solid fa-business-time fs-1"></i>
                                <br/>
                                My Events
                            </div>
                        </div>
                    </div>

                    <?php include_once("includes/jquery.html"); ?>
                </main>

            </div>
        </div>
        <script src="scripts/custom.js"></script>
        <script>
            $(document).ready(function(){
                $("title").text($("title").text()+" - Events");
            });
        </script>
    </body>
<html>