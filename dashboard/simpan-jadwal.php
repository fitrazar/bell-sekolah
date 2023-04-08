<link href="assets/css/sweetalert.css" rel="stylesheet">
<?php 
 
 require_once ('../connect/koneksi.php');
 require_once ('connect/alert.php');
 error_reporting(0);
$hari = $_POST['hari'];
$jadwal= $_POST['deks'];
$jam = $_POST['jam'];
$menit= $_POST['menit'];
$audio = $_POST['audio'];

                    $query = "INSERT INTO jadwal(hari, jadwal, jam, menit, audio) VALUES('".$hari."', '".$jadwal."','".$jam."', '".$menit."', '".$audio."')";
                    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
                   // echo "<script>alert('Data Berhasil Diubah');window.location = 'kelolaGuru.php';</script>";
                    //echo "<script>window.location = 'kelolaGuru.php';</script>";
                    echo "<script>
                    setTimeout(function() {
                        swal({
                            title: 'Yosh',
                            text: 'Data Berhasil Ditambah',
                            type: 'success'
                        }, function() {
                            window.location = 'bell.php';
                        });
                    }, 100);
                </script>'";
                echo notice(1);
?>
  <script src="assets/js/sweetalert.min.js"></script>

