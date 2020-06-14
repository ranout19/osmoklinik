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
</section>