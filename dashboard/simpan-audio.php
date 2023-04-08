<link href="assets/css/sweetalert.css" rel="stylesheet">
<?php

//koneksi database
require_once ('../connect/koneksi.php');
require_once ('connect/alert.php');
 //data yang diperoleh dari form mahasiswa

 $audio = $_FILES['audio']['name'];
 $ukuran_file = $_FILES['audio']['size'];
 $tipe_file = $_FILES['audio']['type'];
 $tmp_file = $_FILES['audio']['tmp_name'];
 // Valid file extensions

 $path = "fileUpload/".$audio;

		if($tipe_file == "video/mp4" || $tipe_file == "audio/vorbis" || $tipe_file == "audio/basic" || $tipe_file == "audio/ogg" || $tipe_file == "audio/mp3" || $tipe_file == "audio/mpeg"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
			// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
			if($ukuran_file <= 8000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
				// Jika ukuran file kurang dari sama dengan 1MB, lakukan :
				// Proses upload
				if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
					// Jika gambar berhasil diupload, Lakukan :	
					// Proses simpan ke Database
					$query = "INSERT INTO audio(audio) VALUES('".$audio."')";
					$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
					
					if($sql){
                        echo "<script>
                            setTimeout(function() {
                                swal({
                                    title: 'Yosh',
                                    text: 'Data Berhasil Disimpan',
                                    type: 'success'
                                }, function() {
                                    window.location = 'bell.php';
                                });
                            }, 100);
                            </script>'";
                            echo notice(1);
                    }else{
                        echo "<script>
                        setTimeout(function() {
                            swal({
                                title: 'Yosh',
                                text: 'Data Gagal Disimpan',
                                type: 'error'
                            }, function() {
                                window.location = 'bell.php';
                            });
                        }, 100);
                        </script>'";
                        echo notice(0);
                    }
                }else{
                    echo "<script>
                    setTimeout(function() {
                        swal({
                            title: 'Yosh',
                            text: 'Periksa Koneksi Anda!',
                            type: 'error'
                        }, function() {
                            window.location = 'bell.php';
                        });
                    }, 100);
                    </script>'";
                    echo notice(0);
                }
            }else{
                echo "<script>
                setTimeout(function() {
                    swal({
                        title: 'Yosh',
                        text: 'Ukuran File Terlalu Besar!',
                        type: 'error'
                    }, function() {
                        window.location = 'bell.php';
                    });
                }, 100);
                </script>'";
                echo notice(0);
            }
        }else{
            echo "<script>
            setTimeout(function() {
                swal({
                    title: 'Yosh',
                    text: 'Tipe File Tidak Sesuai!',
                    type: 'error'
                }, function() {
                    window.location = 'bell.php';
                });
            }, 100);
            </script>'";
            echo notice(0);
        }    
?>
  <script src="assets/js/sweetalert.min.js"></script>