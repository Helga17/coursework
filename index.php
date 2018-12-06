<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();
$_SESSION['isAdmin'] = true;
include_once './bootstrap.php';