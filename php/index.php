<?php
if (isset($_POST['register_btn']))
{
    session_start();
    $db = mysqli_connect("localhost", "root", "", "authentication");
    $regi_username = $_POST['reg_username'];
    $regi_password = $_POST['reg_password'];
    $check = mysqli_query($db, "select * from users where username='$regi_username' and password='$regi_password'");
    $checkrows = mysqli_num_rows($check);
   if($checkrows > 0) {
      echo "customer exists";
   } 
   else if ($checkrows == 0) {
    $sql = "INSERT INTO users(username, password) Values('$regi_username', '$regi_password')";
    mysqli_query($db, $sql);
    $_SESSION['message']= "You are registered in";
    $_SESSION['username']= $username;
    header("Location: index.php");
    die();
   }
   else {
    $_SESSION['message']= "You are not registered";
    }
} 

if (isset($_POST['login_btn']))
{
    session_start();
    $db = mysqli_connect("localhost", "root", "", "authentication");
    $username = mysqli_real_escape_string($db, $_POST['login_username']);
    $password = mysqli_real_escape_string($db, $_POST['login_password']);
    
    $sqllogin = "Select * From users Where username = '$username' and password = '$password'";
    $result = mysqli_query($db, $sqllogin);
    if(mysqli_num_rows($result)== 1)
    {
        $_SESSION['message'] = "You are logged in";
        $_SESSION['username']= $username;
        header("location: home.php");
        die();
    }
    else {
        $_SESSION['message'] = "Wrong Username or Password";
    }
}
?>
<html>
<head>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <meta charset="utf-8">
    <title>Flat Login</title>
    <link rel="stylesheet" href="css/RegisterLogIn.css">
    <meta name="description" content="">
    <meta name="author" content="">
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
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="javascript/script.js"></script>
    <?php
    if (isset($_SESSION['message']))
{
    echo "<div id='error_msg'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
}
?>
    <div class="container">
        <div class="flat-form">
            <ul class="tabs">
                <li>
                    <a rel="nofollow" rel="noreferrer"href="#login" class="active">Login</a>
                </li>
                <li>
                    <a rel="nofollow" rel="noreferrer"href="#register">Register</a>
                </li>
            </ul>
            
            
            <div id="login" class="form-action show">
                <h1>Login on webapp</h1>
                <p>
                    Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                    Maecenas sed diam eget risus varius bladit sit amet non
                </p>
                <form action="index.php" method="POST">
                    <ul>
                        <li>
                            <input type="text" placeholder="Username" name="login_username"/>
                        </li>
                        <li>
                            <input type="password" placeholder="Password" name="login_password" />
                        </li>
                        <li>
                            <input type="submit" value="Login" class="button" name="login_btn"/>
                        </li>
                    </ul>
                </form>
            </div>
            <div id="register" class="form-action hide">
                <h1>Register</h1>
                <p>
                    You should totally sign up for our super awesome service.
                    It's what all the cool kids are doing nowadays.
                </p>
                <form action="index.php" method="POST">
                    <ul>
                        <li>
                            <input type="text" placeholder="Username" name="reg_username"/>
                        </li>
                        <li>
                            <input type="password" placeholder="Password" name="reg_password" />
                        </li>
                        <li>
                            <input type="submit" value="Sign Up" class="button" name="register_btn" />
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</body>
</html>