<?php
if (isset($_['logOut'])) {
    session_start();
    session_destroy();
    unset($_SESSION['username']);
    $_SERVER['message'] = "You are logged out";
    header("location: index.php");
}
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title> home </title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/RegisterLogIn.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
    <ul class="topnav">
        <li style="float:left;"> <a  id="logo" style="padding:0; "href="Home.html"> <img style="height: 48px;" src="resorces/proxy.png"></a></li>
            <li><a href="About.html">About</a></li>
            <li><a class="active" href="Apply.html">Apply</a></li>
            <li><a href="Events.html">Events</a></li>
            <li><a href="GiveIdea.html">Send Idea</a></li>
            <li><a href="ContactUs.html">Contact us</a></li>
            </ul>
        
        <nav class="mobile">
            <div id="menu"> <label> MENU </label></div>
            <div style="float: left;"> 
                
            </div>
        <button>Toggle</button>
            <div>
            <a href="Home.html">Home</a>
            <a href="About.html">About</a>
            <a class="active" href="Apply.html">Apply</a>
            <a href="Events.html">Event</a>
            <a href="GiveIdea.html">Send Idea</a>
            <a href="ContactUs.html">Contact us</a>
            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
            <script src="javascript/index.js"></script>      
        </div>
        </nav>
    <div id="center">
    <div> 
        <header> THANK YOU FOR LOGGING IN<br><br> THIS PAGE IS IN FURTHER CONSTRUCTION </header>
        <button id="logOut"><a style="text-decoration: none; color:black;" href="Index.php">Log Out</a></button>
        </div>
        </div>
</body>
</html>
