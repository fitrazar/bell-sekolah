<link href="assets/css/sweetalert.css" rel="stylesheet">
<?php 
 
 require_once ('../connect/koneksi.php');
 require_once ('connect/alert.php');
 error_reporting(0);
 $hari = $_POST['hari'];
 $jam = $_POST['jam'];
 $menit = $_POST['menit'];
 $audio = $_POST['audio'];
 $jadwal = $_POST['deks'];
 $id = $_POST['idJadwal'];

					$query = "UPDATE jadwal SET hari='$hari', jam='$jam', menit='$menit', audio='$audio', jadwal='$jadwal' WHERE idJadwal='$id'";
                    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
                    // echo "<script>alert('Data Berhasil Diubah');window.location = 'kelolaGuru.php';</script>";
                    //echo "<script>window.location = 'kelolaGuru.php';</script>";
                    echo "<script>
                    setTimeout(function() {
                        swal({
                            title: 'Yosh',
                            text: 'Data Berhasil Diubah',
                            type: 'success'
                        }, function() {
                            window.location = 'bell.php';
                        });
                    }, 100);
                </script>'";
                echo notice(1);
   
?>
  <script src="assets/js/sweetalert.min.js"></script>

