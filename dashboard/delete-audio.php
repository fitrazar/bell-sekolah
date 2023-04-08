<link href="assets/css/sweetalert.css" rel="stylesheet">
<?php 
//koneksi database
require_once ('../connect/koneksi.php');
require_once ('connect/alert.php');
$id = $_GET['idAudio'];
mysqli_query($conn,"DELETE FROM audio WHERE idAudio = '$id' ");
header("location:bell.php");
exit;
?>
  <script src="assets/js/sweetalert.min.js"></script>