<?php
/**
 * Created by PhpStorm.
 * User: mindaugas
 * Date: 18.3.8
 * Time: 15.34
 */

include_once "contracts/Login.php";
include_once "University.php";

final class Authorization implements Login
{
    public function checkUser(string $email, string $password)
    {

        $connection = mysqli_connect('localhost','root', 'arminas9');
        if(!$connection){
            die("DB Connection failed" . mysqli_error($connection));
        }
        $selection = mysqli_select_db($connection, 'Login_Details');
        if(!$selection){
            die("DB Selection failed" . mysqli_error($connection));
        }
        if(isset($_POST) & !empty($_POST)){
            $_email = mysqli_real_escape_string($connection,$email);
            $_password = md5($password);
            $sql = "SELECT * FROM `login` WHERE email='$_email' AND password='$_password'";
            $result = mysqli_query($connection, $sql);
            $count = mysqli_num_rows($result);
            if($count == 1){
               return true;
            }
            else
                return false;
        }
    }
}