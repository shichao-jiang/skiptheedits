<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
 <head>
  <title>Why wait?</title>
  <link rel = "stylesheet" type = "text/css" href = "style.css">
  <link rel="icon" sizes="15x15" href="favicon.jpg">
 </head>

  <body>
      <img src = "logod.png" class = "logo">
   <div class = "reg">
   <h1>Let's Get Started</h1>
   <br></br>
   <h2>OR</h2>
   </div>
<div class = "inputs">
   <div class = "existuser">
   <h2>Login</h2>
    <form method = "POST" action = "Login_Page.php">
    <input type = "text" name = "username" placeholder = "Username">
    <br></br>
    <input type = "text" name = "password1" placeholder = "Password">
    <br></br>
    <button type = "submit" name = "login" class = "btn">Next</button>
    </form>
   </div>
<br></br>

   <div class = "newuser">
   <h2>Register Now</h2>
    <form method= "POST" action = "Login_Page.php">
    <input type = "text" name = "username" placeholder = "Enter Username">
    <br></br>
    <input type = "text" name = "password1" placeholder = "Enter Password">
    <br></br>
    <input type = "text" name = "password2" placeholder = "Confirm Password">
    <br></br>
    <button type = "submit" name = "register" class = "btn">Register</button>
    </form>
</div>
  </body>
</html>