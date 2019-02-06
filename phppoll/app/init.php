<?php 
session_start();

$_SESSION['user_id'] = 10;

$db = new PDO('mysql:host=localhost;dbname=pollingwebsite', 'root', '')

?>