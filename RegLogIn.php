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
