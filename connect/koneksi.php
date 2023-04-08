<?php
//KONVERSI PHP KE PHP 7
require_once "parser-php-version.php";

$servername	= "localhost";
$username	= "ponp5628_root";
$password	= "darulilmi123";
$database	= "ponp5628_bell";

$conn = mysqli_connect($servername, $username, $password, $database) or die(mysqli_connect_error($link));

require_once ('core.php');
?>

