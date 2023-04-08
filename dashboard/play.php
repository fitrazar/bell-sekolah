<?php 
 
 require_once ('../connect/koneksi.php');

 error_reporting(0);
$selected = $_POST['sel1'];

?>
<video controls="" autoplay="" name="media"><source src="fileUpload/<?php echo $selected?>" type="audio/mpeg"></video>