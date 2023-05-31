<?php
  session_start();
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
        <div id="band" class="container">
            <br/>
            <h3 class="text-center">The LIFTOFF Team</h3>
            <p class="text-center"><em><b>L</b>et's <b>I</b>nvent <b>F</b>un <b>T</b>echnology, <b>O</b>wned by <b>F</b>ive <b>F</b>riends</em></p>
            <p>
                We created the LIFTOFF Academic Planner. With the LIFTOFF site, users can create their own calendars,
                categories, and events to manage their life in a simple, efficient way that is fully customizable. 
                This web-based calendar boasts a friends list, notification features, and color customization 
                options. Our site thrives on being accessible to anyone, for any purpose. This product is for students, 
                teachers, managers, and anybody that needs a place to keep track of their busy schedules!
                <br/><br/>
                The LIFTOFF Calendar was built over the course of 6 months, as part of Drexel University's Computing 
                and Informatics courses. Our team had 20 weeks to build a project from scratch following the Agile
                methodology. During this time, we learned how to utilize languages such as HTML, CSS, JavaScript, PHP,
                and SQL, as well as libraries such as Bootstrap 5, AJAX, and JQuery to build a fully functional web
                application. 
            </p>
        
            <br>
        
            <div class="d-lg-flex flex-lg-row bd-highlight mb-3">
                
                <div class="p-2 flex-fill bd-highlight">
                    <p class="text-center">
                        <strong>Daniel Epstein</strong><br/>
                        <i>Product Owner</i>
                    </p>
                    <img src="images/daniel.png" class="rounded-circle mx-auto d-block" alt="Daniel's Picture" width="150" height="150">
                </div>

                <div class="p-2 flex-fill bd-highlight">
                    <p class="text-center">
                        <strong>Tyler Grover</strong><br/>
                        <i>Back-End Developer</i>
                    </p>
                    <img src="images/tyler.png" class="rounded-circle mx-auto d-block" alt="Tyler's Picture" width="150" height="150">
                </div>

                <div class="p-2 flex-fill bd-highlight">
                <p class="text-center">
                        <strong>Neha Patel</strong><br/>
                        <i>Front-End Developer</i>
                    </p>
                    <img src="images/neha.png" class="rounded-circle mx-auto d-block" alt="Neha's Picture" width="150" height="150">
                </div>

                <div class="p-2 flex-fill bd-highlight">
                    <p class="text-center">
                        <strong>Logan Smith</strong><br/>
                        <i>Back-End Developer</i>
                    </p>
                    <img src="images/logan.png" class="rounded-circle mx-auto d-block" alt="Logan's Picture" width="150" height="150">
                </div>

                <div class="p-2 flex-fill bd-highlight">
                    <p class="text-center">
                        <strong>Jon Tu</strong><br/>
                        <i>Front-End Developer</i>
                    </p>
                    <img src="images/jon.png" class="rounded-circle mx-auto d-block" alt="Jon's Picture" width="150" height="150">
                </div>

            </div>

        </div>

        <script src="scripts/custom.js"></script>
        <script>
            $(document).ready(function(){ 
				$('title').text($('title').text()+" - About");
            });
        </script>
    </body>
<html>