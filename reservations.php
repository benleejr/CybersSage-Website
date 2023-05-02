<!DOCTYPE html>
<html>
    <head>
        <!-- By: Nicholas Comeaux-->
        <!-- Date: 5/2/2023 -->
        <title>Reservation Form</title>
        <script lang="text/JavaScript">
            function displayMsg(form){
			var msg1;
			
			msg1 = document.getElementById("msg");
			msg1.innerHTML = "Reservation Sucessfully Made <br />"+"For "+form.elements["name"].value
                            +" at "+form.elements["time"].value + " on " + form.elements["date"].value;
			
			form.reset();
			form.elements["name"].focus();
            }
        </script>
        <style>
             body
            {
                margin:0px;
                background-image: url("familyAtArcade.jpg");
                background-position:cover;
            }
            nav ul
            {
                width:100%;
                list-style-type: none;
                margin:0;
                padding:0;
                overflow:hidden;
                background-color: purple;
                text-align: center;
            }
            nav ul li
            {
                display:inline;
            }
            nav ul li a
            {
                display:inline-block;
                padding:20px;
                background-color: purple;
                color:white;
                font-size:24px;
                text-decoration: none;
                font-family:fantasy;
            }
            nav ul li a:visited
            {
                background-color: rgb(241, 108, 241);
            }
            nav ul li a:hover
            {
                background-color: rgb(185, 4, 185);
            }
            nav ul li a:active
            {
                background-color:rgb(214, 5, 214);
            }
            .dropbutton
            {
                padding:16px;
                font-size: 16px;
                border:none;
                cursor: pointer;
                position: relative;
                display:inline-block;
            }
            .container
            {
                position:relative;
            }
            .dropdown-content
            {
                display:none;
                position:absolute;
                background-color: aqua;
                min-width: 100px;
                box-shadow: 0px 8px 16px 0px red;
                z-index:1;
                left:50%;
                top:calc(100% + 10px);
            }
            .dropdown-content input
            {
                color:black;
                padding: 12px 16px;
                text-decoration: none;
                display:block;
            }
            div{
                text-align:center;
                background-color:rgb(214, 5, 214);
            }
            .show{display:block;}
            footer{
                background-color: purple;
                width:100;
                overflow:auto;
            }
            #note{
                font-weight:bold;
                font-style:italic;

            }

            img{
                height: 150px;
                width: 175px;
                position:fixed;
            }
            table.center{
                margin-left: auto;
                margin-right: auto;
                border-spacing: 50px;
                
            }
        </style>
          
    </head>
    <body>
        <nav class="dropdown" style="margin:0; padding:0; overflow:hidden; background-color: purple;">

        </nav>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="template1.html">Games</a></li>
                <li><a href="contactus.html">Contact Us</a></li>
                <li><a href="reservations.html">Reservation</a></li>
            </ul>
        <noscript>Please Enable JavaScript for this to work properly</noscript>

        <div>
            <h2>WANT A GUARANTEED SEAT? BOOK A TABLE!</h2>
            <p>This includes your own deticated spot for 2 hours</p>
            <p id="note">Note: Table reservation does not include admission fees</p>

            <!-- Form to get reservation data -->
            <form name="Res" method="POST" action="MakeReservation.php">
                <label>Name:</label>
                <input type="txt" name="name" required/>
                <br>
                <br>
                <label>Party Size:</label>
                <input type="number" name="size" />
                <br>
                <br>
                <label>Date:</label>
                <input type="date" name="date" required/>
                <br>
                <br>
                <label>Time:</label>
                <input type="time" name="time" required/>
                <br>
                <br>
                <button type="Submit">Submit</button>
            </form>
            <p id="msg"></p>

        </div>

        <div>
            <!-- Here is the Search Date form for the reservations-->
            <h2>Search Reservations By Date</h2>
            <form id="searchRes" method="GET">
                <label>Input a Date</label>
                <input type="date" name="searchDate" default="2023-05-02" value="<?php if(isset($_GET['searchDate'])){echo $_GET['searchDate'];} ?>">
                <button type="Submit">Search</button>
            </form>

            <!-- Table to display the results of the search -->
            <table class="center" algin="center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Party Size</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- Connection to the database and query the reservations table -->
                    <?php
                        $con = mysqli_connect("localhost","root","","cybersagearcade");

                        error_reporting(E_ERROR | E_PARSE);
                        $filterdate = $_GET['searchDate'];
                       
                        
                           
                            $query = "SELECT ResName, ResSize, ResDate, ResTime FROM reservations WHERE ResDate = '$filterdate' ORDER BY ResTime";
                            $query_run = mysqli_query($con, $query);

                            //Printing the Data
                            if(mysqli_num_rows($query_run))
                            {
                                foreach($query_run as $reservations)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $reservations['ResName'] ?></td>
                                        <td><?php echo $reservations['ResSize'] ?></td>
                                        <td><?php echo $reservations['ResDate'] ?></td>
                                        <td><?php echo $reservations['ResTime'] ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                <tr>
                                    <td colspan="4">No Reservations Found</td>
                                </tr>
                                <?php
                            }
                        

                    ?>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>


    
    </body>
</html>