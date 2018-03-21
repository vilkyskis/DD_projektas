<?php
require_once('connect.php');
if(isset($_POST) & !empty($_POST)){
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password = md5($_POST['password']);
    $sql = "INSERT INTO `login` (email,password) VALUES ('$email', '$password')";
    $result = mysqli_query($connection, $sql);
    if($result){
        echo "Success";
    }
    else echo "Fail";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/login_style.css">
</head>
<body>
<div class="block">
    <form class="form" method="POST">
        <h2>Please register</h2>
        <input type="text" name="email" id="inputEmail" placeholder="Email address" required autofocus>
        <br>
        <br>
        <input type="password" name="password" id="inputPassword" placeholder="Password" required>
        <br>
        <br>
        <button type="submit">Register</button><br><br>
        <a href="index.php">Login></a>
    </form>
</div>
</body>
</html>