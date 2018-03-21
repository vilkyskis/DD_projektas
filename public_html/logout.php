<?php
session_start();
unset($_SESSION['on']);
session_destroy();
header('location: index.php');
