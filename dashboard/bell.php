<!DOCTYPE html>
<html lang="en">
<head>
  <?php 

  //header
  require_once('header.php'); 
  ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php 
          //navbar atas
          require_once('topNav.php');
          //sidebar
          require_once('sidebar.php');
          ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Bell Configuration
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Bell</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- ./row -->
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Settings</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-upload-tab" data-toggle="pill" href="#custom-tabs-three-upload" role="tab" aria-controls="custom-tabs-three-upload" aria-selected="false">Upload MP3</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="far fa-calendar"></i>
                      Jadwal Hari <?php echo hari($hari); ?>
                    </h3>
                  </div>
                  <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Jadwal</th>
                    <th>Audio</th>
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
                    <td><?php echo $no++;?></td>
                    <td><?php echo $listJad2['hari'];?></td>
                    <td><?php echo $listJad2['jam'];?>:<?php echo $listJad2['menit'];?></td>
                    <td><?php echo $listJad2['jadwal'];?></td>
                    <td><?php echo $listJad2['audio'];?></td>
                  </tr>
                  <?php
                    }
                  ?> 
                  </tbody>
                </table>
                <div class="card-header mb-4">
                    <h3 class="card-title">
                      <i class="fa fa-play-circle"></i>
                      Manual
                    </h3>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <form method="POST" action="play.php" enctype="multipart/form-data" target="_blank">
                      <div class="form-group">
                        <select name="sel1" class="form-control">
                        <?php 
                            $sql=mysqli_query($conn, "SELECT * FROM audio");
                            while ($data=mysqli_fetch_array($sql)) {
                          ?>
                          <option value="<?php echo $data['audio']?>"><?php echo $data['audio']?></option>
                          <?php
                          }
                        ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <button type="submit" id="play" class="btn btn-primary">Play</a>
                    </div>
                  </form>
                  </div>
                  Example Text.
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                  <div class="row">
                    <div class="col-sm-2">
                      <!-- select -->
                      <form id="formJadwal" method="POST" action="simpan-jadwal.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <select name="hari" id="hari" class="form-control">
                        <option selected="true" disabled="disabled" value="">-- Hari --</option>
                          <option value="Senin">Senin</option>
                          <option value="Selasa">Selasa</option>
                          <option value="Rabu">Rabu</option>
                          <option value="Kamis">Kamis</option>
                          <option value="Jumat">Jumat</option>
                          <option value="Sabtu">Sabtu</option>
                          <option value="Minggu">Minggu</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <select name="jam" id="jam" class="form-control select2bs4" style="width: 100%;">
                        <option selected="true" disabled="disabled" value="">-- Jam --</option>
                        <?php foreach (jam($items) as $item) { ?>
                          <option value="<?php echo $item; ?>"><?php echo $item; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <select name="menit" id="menit" class="form-control select2bs4" style="width: 100%;">
                        <option selected="true" disabled="disabled" value="">-- Menit --</option>
                        <?php foreach (menit($mnt) as $menit) { ?>
                          <option value="<?php echo $menit; ?>"><?php echo $menit; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <!-- select -->
                      <div class="form-group">
                        <select name="audio" id="audio" class="form-control">
                        <option selected="true" disabled="disabled" value="">-- Audio --</option>
                          <?php 
                            $sql=mysqli_query($conn, "SELECT * FROM audio");
                            while ($data=mysqli_fetch_array($sql)) {
                          ?>
                          <option value="<?php echo $data['audio']?>"><?php echo $data['audio']?></option>
                          <?php
                          }
                        ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <!-- text input -->
                      <div class="form-group">
                        <input type="text" name="deks" id="deks" class="form-control" placeholder="Deskripsi">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                    </form>
                  </div>
                  <table id="jadwal" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Jadwal</th>
                    <th>Audio</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $jad = mysqli_query($conn,"SELECT * FROM jadwal");
                    $no =1;
                    while ($listJad = mysqli_fetch_array($jad)) {
                  ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $listJad['hari'];?></td>
                    <td><?php echo $listJad['jam'];?>:<?php echo $listJad['menit'];?></td>
                    <td><?php echo $listJad['jadwal'];?></td>
                    <td><?php echo $listJad['audio'];?></td>
                    <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $listJad['idJadwal'];?>">
                      <i class='fas fa-edit'></i>
                    </button>
                      <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="delete-jadwal.php?idJadwal=<?php echo $listJad['idJadwal'];?>" style="color: white;" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
              <!-- Modal -->
                <div class="modal fade" id="edit<?php echo $listJad['idJadwal'];?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <div class="container">
                        <div class="row">
                        <form id="formJadwal2" method="POST" action="update-jadwal.php" enctype="multipart/form-data">
                            <input type="text" name="idJadwal" value="<?php echo $listJad['idJadwal']; ?>" hidden>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Hari</label>
                              <select name="hari" id="hari" class="form-control">
                                <option selected="true" disabled="disabled" value="">-- Hari --</option>
                                <option value="Senin" <?=$listJad['hari'] == 'Senin' ? ' selected="selected"' : '';?>>Senin</option>
                                <option value="Selasa" <?=$listJad['hari'] == 'Selasa' ? ' selected="selected"' : '';?>>Selasa</option>
                                <option value="Rabu" <?=$listJad['hari'] == 'Rabu' ? ' selected="selected"' : '';?>>Rabu</option>
                                <option value="Kamis" <?=$listJad['hari'] == 'Kamis' ? ' selected="selected"' : '';?>>Kamis</option>
                                <option value="Jumat" <?=$listJad['hari'] == 'Jumat' ? ' selected="selected"' : '';?>>Jumat</option>
                                <option value="Sabtu" <?=$listJad['hari'] == 'Sabtu' ? ' selected="selected"' : '';?>>Sabtu</option>
                                <option value="Minggu" <?=$listJad['hari'] == 'Minggu' ? ' selected="selected"' : '';?>>Minggu</option>
                              </select>
                          </div>
                          </div>
                          <div class="col-sm-2">
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Jam</label>
                            <select name="jam" id="jam" class="form-control select2" style="width: 100%;">
                              <option selected="true" disabled="disabled" value="">-- Jam --</option>
                              <?php foreach (jam($items) as $item) { ?>
                                <option value="<?php echo $item; ?>" <?=$listJad['jam'] == $item ? ' selected="selected"' : '';?>><?php echo $item; ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          </div>
                          <div class="col-sm-2">
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Menit</label>
                            <select name="menit" id="menit" class="form-control select2" style="width: 100%;">
                            <option selected="true" disabled="disabled" value="">-- Menit --</option>
                            <?php foreach (menit($mnt) as $menit) { ?>
                              <option value="<?php echo $menit; ?>" <?=$listJad['menit'] == $menit ? ' selected="selected"' : '';?>><?php echo $menit; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          </div>
                          <div class="col-sm-4">
                          <!-- select -->
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Audio</label>
                            <select name="audio" id="audio" class="form-control">
                            <option selected="true" disabled="disabled" value="">-- Audio --</option>
                              <?php 
                                $sql=mysqli_query($conn, "SELECT * FROM audio");
                                while ($data=mysqli_fetch_array($sql)) {
                              ?>
                              <option value="<?php echo $data['audio']?>" <?=$data['audio'] == $data['audio'] ? ' selected="selected"' : '';?>><?php echo $data['audio']?></option>
                              <?php
                              }
                            ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <!-- text input -->
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Deskripsi</label>
                            <input type="text" name="deks" id="deks" class="form-control" placeholder="Deskripsi" value="<?php echo $listJad['jadwal']; ?>">
                          </div>
                        </div>
                        <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                      </div>
                      </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                  </div>
                </div>
                  <?php
                    }
                  ?> 
                  </tbody>
                </table>
                  Example Text.
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-upload" role="tabpanel" aria-labelledby="custom-tabs-three-upload-tab">
                  <form id="formAudio" method="POST" action="simpan-audio.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputFile">Upload MP3</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="audio" class="custom-file-input" id="audio">
                        <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                      </div>
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-primary tombol-simpan">Upload</button>
                      </div>
                    </div>
                    </form>
                  </div>
                  <table id="audio2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Audio</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $aud = mysqli_query($conn,"SELECT * FROM audio");
                    $no =1;
                    while ($listAud = mysqli_fetch_array($aud)) {
                  ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $listAud['audio'];?></td>
                    <td>
                      <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="delete-audio.php?idAudio=<?php echo $listAud['idAudio'];?>" style="color: white;" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php
                    }
                  ?> 
                  </tbody>
                </table>
                  Example Text.
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <!-- Start = Footer -->
    <?php require_once('footer.php'); ?>

</body>
</html>
