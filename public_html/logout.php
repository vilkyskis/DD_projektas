<?php
session_start();
unset($_SESSION['on']);
session_destroy();
header("Location:index.php");
exit();