<section class="content-header">
  <h1 style="font-family: semua;">
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<section class="content">
<?php if ($this->utility->user_login()->level == 'receipt') {?>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Pasien</span>
        <span class="info-box-number"><?=$pasien?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Pendaftaran</span>
        <span class="info-box-number"><?=$pendaftaran?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Pembayaran</span>
        <span class="info-box-number"><?=idr($total) ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
<?php } ?>

<?php if ($this->utility->user_login()->level == 'dokter') {?>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Pasien</span>
        <span class="info-box-number"><?=$pasienDokter?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-stethoscope"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Diagnosa</span>
        <span class="info-box-number"><?=$diagnosa?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-medkit"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Resep</span>
        <span class="info-box-number"><?=$resepDokter?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
<?php } ?>

<?php if ($this->utility->user_login()->level == 'apotek') {?>

  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-plus-square"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jenis Obat</span>
        <span class="info-box-number"><?=$obat?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-medkit"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Resep</span>
        <span class="info-box-number"><?=$resep?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Pembayaran</span>
        <span class="info-box-number"><?=idr($semua)?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
<?php } ?>

<?php if ($this->utility->user_login()->level == 'admin') {?>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Pasien</span>
        <span class="info-box-number"><?=$pasien?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-user-plus"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Pendaftaran</span>
        <span class="info-box-number"><?=$pendaftaran?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-dollar"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Pembayaran Pendaftaran</span>
        <span class="info-box-number"><?=idr($total) ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-plus-square"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jenis Obat</span>
        <span class="info-box-number"><?=$obat?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-medkit"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Resep</span>
        <span class="info-box-number"><?=$resep?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-dollar"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Pembayaran Resep</span>
        <span class="info-box-number"><?=idr($semua)?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-user-md"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Dokter</span>
        <span class="info-box-number"><?=$dokter?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-h-square"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah Poliklinik</span>
        <span class="info-box-number"><?=$poliklinik?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah User</span>
        <span class="info-box-number"><?=$user?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
<?php } ?>
</section>