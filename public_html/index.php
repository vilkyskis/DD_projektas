<?php
//visas klases įtraukti TIK čia (naudojant include)
include_once "../modules/University.php";
include_once "../modules/Student.php";
include_once "../modules/Authorization.php";

ini_set('display_errors', 1);
echo '<pre>';
$university = new University('KTU');
$auth = new Authorization($university);
$a = new Student('as', 'as');
$b = new Student('bs', 'bs');
var_dump($a);

$university->addStudent($a);
$university->addStudent($b);

$c = $university->getStudent('as');
$university = null;
var_dump($auth);