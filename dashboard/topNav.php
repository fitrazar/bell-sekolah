<html>
<head>
  <title></title>
</head>
<body>
  <body class="hold-transition sidebar-mini layout-fixed">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div>

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <?php
        require_once ('../connect/koneksi.php');
        $hari = date('w');
        $tgl	= date('Y-m-d');
        echo hari($hari).', '.tglskrg($tgl);
        include_once '../connect/time.php'; ?>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
    
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item dropdown-footer">Logout</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="full" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <?php
          $day = hari($hari);
          $clock = date("H");
          $minute = date("i");
          $jd = mysqli_query($conn,"SELECT * FROM jadwal WHERE hari='$day' AND jam='$clock' AND menit='$minute'");
          $no =1;
          while ($list = mysqli_fetch_array($jd)) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="#" role="button">
            <div id="loader" style="display: none;">
              <p>Loading ...</p>
            </div>
                <div class="player">
                <i id="musik" class="fa fa-play-circle" name="musik" onclick="togglePlay();"></i>
                <i id="musik2" class="fa fa-pause-circle" name="musik2" onclick="togglePlay();" style="display:none;"></i>
                <audio autoplay="true" name="audio" id="divAudio"><source src="fileUpload/<?php echo $list['audio'];?>"></audio>
              </div>
            </a>
          </li>
          <?php
            }
          ?> 
        </ul>
      </nav>
      <!-- /.navbar -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      
      <script>
          <?php
          $day = hari($hari);
          $clock = date("H");
          $minute = date("i");
          $jd2 = mysqli_query($conn,"SELECT * FROM jadwal WHERE hari='$day' AND jam='$clock' AND menit='$minute'");
          $no =1;
          while ($list2 = mysqli_fetch_array($jd2)) {
        ?>
        function addZero(i) {
        if (i < 10) {i = "0" + i}
        return i;
      }
    $(document).ready(function(){ 
         // set interval 1 detik
         setInterval(function(){
            // baca waktu saat ini 
            var today = new Date();
            var h = addZero(today.getHours());
            var m = addZero(today.getMinutes());
            var s = addZero(today.getSeconds());
            var time = h + ":" + m;
            // cek kesesuaian waktu saat ini dg waktu skedul auto click

            if (time == "<?php echo $list2['jam'];?><?php echo ':'.$list2['menit'];?>") { 
              document.querySelector("#musik").click();
              $("#divAudio")[0].play();
              
          }
  
         }, 1000);
    });
    // setTimeout(function(){
    // 	document.getElementById('play').click();
    //    },2000);
    <?php
            }
          ?> 
    </script>

	<script>

    function togglePlay() {
  var audio = document.getElementsByTagName("audio")[0];
      audio.play();
       document.getElementById("musik").style.display = "none";
       document.getElementById("musik2").style.display = "block";

}
</script>
    </body>
</html>