<?php
//KONVERSI PHP KE PHP 7
require_once "parser-php-version.php";

$servername	= "localhost";
$username	= "";
$password	= "";
$database	= "";

$conn = mysqli_connect($servername, $username, $password, $database) or die(mysqli_connect_error($link));

require_once ('core.php');
?>

