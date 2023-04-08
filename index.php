<?php
//KONVERSI PHP KE PHP 7
require_once ('connect/koneksi.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jadwal Hari ini</title>
  </head>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/jquery.simplyscroll/jquery.simplyscroll.css">
  <script type="text/javascript" src="assets/js/jquery.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/jquery.simplyscroll/jquery.simplyscroll.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#scroller").simplyScroll({
        customClass: 'simply-scroll',
        frameRate: 15,
        speed: 10,
        pauseOnHover: false,
        orientation:'vertical',
        customClass:'vert'
      });
    });
  </script>
  <body style="background:url('assets/img/pattern.png');background-attachment:fixed;">
    <nav class="navbar navbar-default navbar-fixed-top" style="background:#428bca !important;color:#fff !important;box-shadow: 0px 0px 5px #222;">
      <div class="container">
        <div class="navbar-header">
          <a href="login" class="navbar-brand" style="color: white;">Bell IAU (Integrated Automatic User Configuration)</a>
        </div> <!-- end of class navbar-header -->
        <div class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            <li>
              <h4 style="padding-top:7px;margin-right:280px;">
                <?php
                $hari = date('w');
                $tgl	= date('Y-m-d');
                echo hari($hari).', '.tglskrg($tgl); ?>
              </h4>
            </li>
          </ul>
        </div> <!-- end of class collapse -->
      </div> <!-- end of class container -->
    </nav>

    <div class="container-fluid" id="main-content">
        <div class="row">
          <div class="col-md-9" style="background-image: url('images/pattern.png') !important;padding-right: 0px;padding-left: 5px;">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="ctr" width="120px">Jam</th>
                  <th class="ctr">Ket.</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $day = hari($hari);
                    $jad2 = mysqli_query($conn,"SELECT * FROM jadwal WHERE hari='$day'");
                    $no =1;
                    while ($listJad2 = mysqli_fetch_array($jad2)) {
                  ?>
                  <tr>
                  <td class="ctr" width="120px" style="background:#fff;"><?php echo $listJad2['jam'];?>:<?php echo $listJad2['menit'];?></td>
                  <td class="ctr" style="background:#fff;"><?php echo $listJad2['jadwal'];?></td>
                  </tr>
                  <?php
                    }
                  ?> 
                </tbody>
            </table>
            <hr>
          </div>
          <div class="col-md-3" style="padding-right: 5px;">
            <div class="panel panel-primary">
              <div class="panel-heading">
                Pengumuman
              </div>
              <div class="panel-body">
                <p>
                  Data tidak ada.
                </p>
              </div> <!-- end of class panel-body -->
            </div> <!-- end of class panel-primary -->
            <hr>

            <div class="panel panel-primary">
              <div class="panel-heading">
                Keterangan :
              </div>
              <div class="panel-body">
                <p>
                    Buat siapapun anda yang memakai website ini harap ingat : <br>
                    1. Web ini dikembangkan hanya oleh satu orang.<br>
                    2. Hak cipta web ini hanya milik Allah azza wa jalla.<br>
                    3. Jika menemukan kendala atau ingin penambahan fitur bisa hubungi saya lewat DM.<br>
                    <a href="https://www.instagram.com/vzar__/">Instagram</a> Atau WA<br>
                    <a href="https://api.whatsapp.com/send?phone=6281385931773">+62 813-8593-1773.</a><br>
                    <br>
                    Terimakasih buat kamu yang sudah memberi semangat, motivasi, dan telah menjadi mood booster:).<br>
                    Laptop &#10084;
                </p>
              </div>
            </div>
          </div> <!-- end of class col-md-3 -->
        </div> <!-- end of class row -->
    </div> <!-- end of class container or ID main-content -->

  </body>
</html>
