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

        <!-- Custom Styles for Calendar Page -->
        <style>

            /* Class for Calendar Day Boxes */
            .cal_day{
                height: 150px;
            }
            .week_day{
                height: 400px;
            }
            .null_box{
                background-color: rgba(0, 0, 0, .025)
            }
            .tdDate{
                border-bottom: 1px solid white;
                font-size:1.25em;
                margin-bottom:5px;
            }
            .calName{
                border:0px;
                background-color: rgba(0, 0, 0, 0);
                color: white;
                font-weight: bold;
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
                <main class="ms-sm-auto col-lg-10 min-vh-100 p-0">
                    
                    <div class="px-md-4 min-vh-100">

                        <!-- Top Section -->
                        <div class="d-flex justify-content-between flex-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom d-print-none"> 
                            
                            <!-- Calendar Name -->
                            <h1 class="h2">
                                <div class="dropdown">
                                    <button class="dropdown-toggle calName" type="button" id="cmenu" data-toggle="dropdown" aria-expanded="false">
                                        <?php
                                            require_once 'scripts/class-db.php';
                                            $db = new DB();
                            
                                            $sql = "SELECT COUNT(id), c.* FROM calendars c WHERE c.userID=".$_SESSION['user']." ORDER BY id LIMIT 1";
                                            if(isset($_GET['c'])){
                                                $sql = "SELECT c.* FROM calendars c WHERE c.userID=".$_SESSION['user']." and c.id=".$_GET['c'];
                                            }
                                            
                                            if (! isset($_GET['c']) && $db->query_shit()->query($sql)->fetch_assoc()['COUNT(id)'] == 0)
                                                $res = "My Calendar";
                                            else
                                                $res = $db->query_shit()->query($sql)->fetch_assoc()['name'];
                                            echo $res;
                                        ?>
                                    </button>
                                    <ul id="pickCal" data-cal="<?php $res = $db->query_shit()->query($sql)->fetch_assoc()['id']; echo $res; ?>" class="dropdown-menu" aria-labelledby="cmenu" style="background-color: black;">
                                        <?php
                                            $sql = "SELECT c.* FROM calendars c WHERE c.userID=".$_SESSION['user']." ORDER BY id";
                                            $res = $db->query_shit()->query($sql);
                                            while($row = $res->fetch_assoc()){
                                                $n = $row['name'];
                                                $i = $row['id'];
                                                $v = "Month";
                                                if(isset($_GET['v'])){
                                                    $v = $_GET['v'];
                                                }
                                                echo "<li><a class=\"dropdown-item viewc active\" href=\"calendars.php?c=".$i."&v=".$v."\">".$n."</a></li>";
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </h1>
                            
                            <!-- Buttons -->
                            <div class="btn-toolbar mb-2 mb-md-0">

                                <!-- View Selection Dropdown -->
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-dark dropdown-toggle" type="button" id="vmenu" data-toggle="dropdown" aria-expanded="false">
                                        Month View
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="vmenu" style="background-color: black">
                                        <li><a class="dropdown-item viewc active" id="Month">Month View</a></li>
                                        <li><a class="dropdown-item viewc" id="Week">Week View</a></li>
                                        <li><a class="dropdown-item viewc" id="List">List View</a></li>
                                    </ul>
                                </div>

                                <!-- Share / Export -->
                                <div class="btn-group mx-2">
                                    <button type="button" class="btn btn-sm btn-secondary" id="share">Share</button>
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="window.print();">Export</button>
                                </div>

                            </div>
                         
                        </div>

                         <!-- Calendar -->
                         <table class="table table-bordered calendar">
                              <thead>

                                   <!-- Top Row of the Calendar -->
                                   <tr>
                                        <th class="text-center border-end-0 prev"> <<< </th>
                                        <th colspan="5" class="text-center border-start-0 border-end-0 monthName" data-month="" data-day="" data-year"">  
                                        </th>
                                        <th class="text-center border-start-0 next"> >>> </th>
                                   </tr>

                                   <!-- Second Row of the Calendar -->
                                   <tr>
                                        <th scope="col" class="text-center" style="width:14.2857%">Sunday</th>
                                        <th scope="col" class="text-center" style="width:14.2857%">Monday</th>
                                        <th scope="col" class="text-center" style="width:14.2857%">Tuesday</th>
                                        <th scope="col" class="text-center" style="width:14.2857%">Wednesday</th>
                                        <th scope="col" class="text-center" style="width:14.2857%">Thursday</th>
                                        <th scope="col" class="text-center" style="width:14.2857%">Friday</th>
                                        <th scope="col" class="text-center" style="width:14.2857%">Saturday</th>
                                   </tr>

                              </thead>

                              <!-- Body of the Calendar -->
                              <tbody class="border-top-0"> </tbody>

                         </table>

                    </div>

                    <?php include_once("includes/jquery.html"); ?>
                </main>

                <div id="evModal" class="modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">

                            <div class="modal-body">

                                <button type="button" class="btn-close evModalClose" data-dismiss="modal" aria-label="Close" style="float:right"></button>
                                <h5 class="modal-title border-bottom"></h5> 

                                <p>
                                    <div class="text-start w-100 fs-6 px-2" style="border-radius:5px; margin-bottom:5px;" id="eventDisp">
                                        <span class="badge rounded-pill text-dark" style="float:right; margin-top:3px;"></span>
                                        <b></b>
                                        <br/>
                                        <span id="ts" style="float: right;"></span>
                                        <i id="emd"></i>
                                    </div>
                                </p>

                                <div class="w-100 d-flex justify-content-center border-top pt-1">
                                    <div class="btn btn-info me-1 w-50"> <i class="fa-solid fa-pen-to-square"></i> Edit Event </div>
                                    <div class="btn btn-danger ms-1 w-50"> <i class="fa-solid fa-trash-can"></i> Delete Event </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script src="scripts/custom.js"></script>

        <!-- Calendar Script -->
        <script>
            $(document).ready(function(){

                // Get the view type from the URL
                view = "Month"
                if(window.location.href.indexOf("v=")!=-1)
                    view = window.location.href.substr(window.location.href.indexOf("v=")+2)
                
                // Get the current calendar id
                cal_id = $("#pickCal").attr('data-cal')

                // Change the dropdown to display the propper view type
                $('#vmenu').text(view + " View")
                $('.viewc').removeClass('active')
                $('#'+view).addClass('active')

                //Change the page title
                $('title').text($('title').text()+" - Calendars")

                // Get the Current Month and Year, then print the Current Calendar
                var curr_day = new Date().getDate();
                var curr_month = new Date().getMonth()+1;
                var curr_year = new Date().getFullYear();

                // Store the Current Date in the Calendar data
                $(".monthName").attr("data-month", curr_month)
                $(".monthName").attr("data-day", curr_day)
                $(".monthName").attr("data-year", curr_year)

                // Display the Calendar in Month View
                if(view == "Month"){
                    createMonthCalendar(curr_month, curr_year, cal_id);
                    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                    $(".monthName").text(months[curr_month-1]+" "+curr_year)
                }

                //Display the Calendar in Week View
                if(view == "Week"){
                    createWeekCalendar(curr_day, curr_month, curr_year, cal_id);
                    $(".monthName").attr("data-day", curr_day)
                }

                if(view == "List"){
                    $.ajax({
                        type:"POST",
                        url:"scripts/getList.php",
                        data:{
                            cal: cal_id
                        },
                        success:function(response){
                            $(".calendar").after(response)
                            $(".calendar").remove();
                        },
                        error:function(){
                            alert("Connection Error.  Please contact your system administrator.");
                        }
                    });//end ajax
                }

                // Function to switch to Previous Month/Week/Day
                $(document).on("click", ".prev", function(){

                    // In Month View, Go to Previous Month
                    if(view == "Month"){

                        // Go to Previous Month
                        new_month = curr_month-1;

                        // If Month was January, go to December
                        if(new_month <= 0){
                            new_month = 12;
                            curr_year--;
                        }

                        // Replace the current Calendar 
                        $("tbody").empty()
                        createMonthCalendar(new_month, curr_year, cal_id);

                        curr_month = new_month;
                        $(".monthName").attr("data-month", new_month)
                        $(".monthName").text(months[new_month-1]+" "+curr_year) 
                    }

                    //In Week View, go to Previous Week
                    if(view == "Week"){

                        // Go to Previous Week
                        new_day = curr_day-7;
                        if(new_day <= 0){
                            curr_month = curr_month-1;
                            if(curr_month <= 0){
                                curr_month = 12;
                                curr_year--;
                            }
                            var num_days = new Date(curr_year, curr_month, 0).getDate();
                            new_day = num_days+curr_day-7;
                        }
                        curr_day = new_day

                        // Replace the current Calendar 
                        $("tbody").empty()

                        createWeekCalendar(curr_day, curr_month, curr_year, cal_id);

                        $(".monthName").attr("data-month", curr_month)
                        $(".monthName").attr("data-day", curr_day)
                        $(".monthName").attr("data-year", curr_year)
                    }

                });

                // Function to switch to Next Month/Week/Day
                $(document).on("click", ".next", function(){

                    if(view == "Month"){

                        // Go to Next Month
                        new_month = curr_month+1;

                        // If Month was December, go to January
                        if(new_month >= 13){
                            new_month = 1;
                            curr_year++;
                        }

                        // Replace the current Calendar
                        $("tbody").empty()
                        createMonthCalendar(new_month, curr_year, cal_id);

                        curr_month = new_month;
                        $(".monthName").attr("data-month", new_month)
                        $(".monthName").text(months[new_month-1]+" "+curr_year)
                    }

                    if(view == "Week"){

                        // Go to Next Month
                        new_day = curr_day+7;
                        var num_days = new Date(curr_year, curr_month, 0).getDate();
                        if(new_day > num_days){
                            curr_month = curr_month+1;
                            if(curr_month > 12){
                                curr_month = 1;
                                curr_year++;
                            }
                            new_day = new_day-num_days;
                        }
                        curr_day = new_day

                        // Replace the current Calendar 
                        $("tbody").empty()

                        createWeekCalendar(curr_day, curr_month, curr_year, cal_id);

                        $(".monthName").attr("data-month", curr_month)
                        $(".monthName").attr("data-day", curr_day)
                        $(".monthName").attr("data-year", curr_year)
                    }

                });

                // Function to share calendar
                $(document).on("click", "#share", function(){
                    $.ajax({
                        type:"POST",
                        url:"search.php",
                        data:{
                            e: email
                        },
                        success:function(response){
                            alert("Mail has been sent!")
                        },
                        error:function(){
                            alert("Connection Error.  Please contact your system administrator.");
                        }
                    });
                });
            });
        </script>

    </body>    
<html>