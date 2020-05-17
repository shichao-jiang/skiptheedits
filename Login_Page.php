<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
 <head>
  <title>Sign On</title>
 </head>

  <body>
   <div class = "reg">
   <h1>Let's Get Started</h1>
   <br></br>
    <h2>Login</h2>
   </div>

   <div class = "existuser">
    <form method = "POST" action = "Login_Page.php">
    <input type = "text" name = "username" value = "Username">
    <input type = "text" name = "password1" value = "Password"><br></br>
    <button type = "submit" name = "login" class = "btn">Next</button>
    </form>
   </div>
<br></br>

<div class = "log" >
    <h2>Register Now</h2>
   </div>
   <div class = "newuser">
    <form method= "POST" action = "Login_Page.php">
    <input type = "text" name = "username" value = "Enter Username">
    <input type = "text" name = "password1" value = "Enter Password">
    <input type = "text" name = "password2" value = "Confirm Password"><br></br>
    <button type = "submit" name = "register" class = "btn">Register</button>
    </form>
  </body>
</html>