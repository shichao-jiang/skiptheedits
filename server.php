<?php
$servername = "35.203.5.122";
$username = "root";
$password = "harshilpicopenis123";
$db = "skiptheedits";

$conn = mysqli_connect($servername, $username, $password, $db);


if(isset($_POST['register'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
     
     $duplicateuser = "SELECT username from users WHERE username ='$username' ";
     $result = mysqli_query($conn, $duplicateuser);
     $count = mysqli_num_rows($result);

     if ($count > 0){
         echo "Username has been taken";
         return false;
     }      elseif(empty($password1)){
        echo "Please enter a valid password";
    }    elseif(strlen($username) > 15 || empty($username)){
        echo "Please enter a valid user name under 15 characters";
    }   elseif ($password1 != $password2){
        echo "Passwords do not match";
    }   else {
        $password = password_hash($password1, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        mysqli_query($conn, $sql);
        echo "Registration Done";
     }

}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password1']);

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $user = $result->fetch_assoc();

    if (($result->num_rows > 0) and (password_verify($password, $user['password']))) {
        $_SESSION['user'] = array('id' => $user['id'], 'username' => $user['username']);
        header('location: home');
    } else {
        echo "Login Failed";
    }
}

?>
