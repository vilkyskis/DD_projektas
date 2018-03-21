<?php
//visas klases įtraukti TIK čia (naudojant include)
include_once "../modules/University.php";
include_once "../modules/Student.php";
include_once "../modules/Authorization.php";

include_once("../resources/config.php");
//include_once(TEMPLATES_PATH . "/header.php");

if (empty($_SESSION))
    session_start();

ini_set('display_errors', 1);
echo '<pre>';

//----------------------------------------------------------
$status ="";
$status_class ="";
$university = new University('KTU');
$auth = new Authorization($university);

//----------------------------------------------------------

$a = new Student('as', 'ass');
$b = new Student('bs', 'bss');
$university->addStudent($a);
$university->addStudent($b);

//----------------------------------------------------------

if (isset($_SESSION['on']) && $_SESSION['on'] === true) {
    $status = "Welcome back!";
    include_once(TEMPLATES_PATH . '/main.php');

} elseif (isset($_POST['u_name'])) {
    if ($auth->checkUser($_POST['u_name'], $_POST['u_pass'])) {
        $_SESSION['on'] = True;
        $status = "You are now logged in";
        include_once(TEMPLATES_PATH . '/main.php');
    } else {
        $status = "Bad email or password";
        $status_class = "alert_failure";
        include_once(TEMPLATES_PATH . "/login.php");
    }
} else {
    include_once(TEMPLATES_PATH . "/login.php");

}
include_once(TEMPLATES_PATH . "/footer.php");

