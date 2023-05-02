<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"
    name = "author" content = " Benedict Lee, Richard Truong, Nicholas Comeaux, Costel Vakiandro"
    name = "viewport" content = "width=device-width", initial-scale="1.0">
    <title>Contact Form</title>
    <link href = "contactus.css" rel="stylesheet">

    <style>
        body        {
            margin:0px;
            background-image: url("familyAtArcade.jpg");
        }
        .navbar-image img
        {
            width:20%;
            height:20%;
            position: absolute;
            left:10%;
            top:0;
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
            left:45%;
            
        }
        .dropdown-content input
        {
            border: 10px 10px 10px 10px solid white;
            color:black;
            padding: 12px 16px;
            text-decoration: none;
            display:inline-block;
        }
        .show{display:block;}
    </style>
</head>

<body>
    <nav class="dropdown" style="margin:0; padding:0; overflow:hidden; background-color: purple;">

    </nav>
    <nav>
        <ul>
            <div class="container">
                <button onclick="myFunction()" class="dropbutton" style="display:inline-block; padding:20px; background-color: purple;
                color:white; font-size:24px; text-decoration: none; font-family:fantasy;">Reservations</button>
                <div id="myDropdown" class="dropdown-content">
                    <input type="text" id="reservationHelp" placeholder="Search">
                    <button type="button" id="locationIdentifier">Use My Location
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <a class="navbar-image" href="home.html"><img src="cybersage_transparent.png" alt="cybersagelogo"></a>
            <li><a href="home.html">Home</a></li>
            <li><a href="template1.html">Games</a></li>
            <li><a href="contactus.html">Contact Us</a></li>
        </ul>
    </div>
    </nav>
        
    <?php
    //This is a list of variables needed to connect to a database whose name may vary and which may potentially need a username and password.
    // Other variables include the database and the form information provided by contactus.html.
        $serverName = "localhost";
        $username = "root";
        $password = "";
        $database_Name = "cybersage_contact";
        $name =  $_POST["Name"];
        $email = $_POST["Email"];
        $message = $_POST["Message"];
        //Connection to the database and conditional for in case it fails
        $conn = new mysqli($serverName, $username, $password, $database_Name);

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        // Insertion into database with information and in case it fails.
        $sql1 = "INSERT INTO user_info (Name, Email)
        VALUES('$name', '$email')";
        $sql2 = "INSERT INTO contact_messages (Name, Message)
        VALUES('$name', '$message')";


        if ($conn->query($sql1) === TRUE && $conn->query($sql2))
        {
            echo "Your message has been sent successfully.";
        }
        else
        {
            echo mysqli_error($conn);
            echo "Error: Your message has not been sent.";
        }

    ?>

</body>
</html>