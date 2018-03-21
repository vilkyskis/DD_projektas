<html>
<head>
    <link rel="stylesheet" href="../../public_html/css/login_style.css">
</head>
<div class="block"><div class="alert_failure"><?php echo $status;?></div>
<h2>Login</h2>
<form method="post">
<label for="u_name"><input type="text" placeholder="Enter Username" name="u_name" required></label>
    <br>
<label for="u_pass"><input type="password" placeholder="Enter Password" name="u_pass" required></label>
    <br>
<button type="submit">Login</button><br>
<a href="register.php">Register></a><br>
</form>
</div>
</html>