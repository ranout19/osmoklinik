<section class="content-header">
  <h1 style="font-family: semua;">
    Pasien
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Pasien</li>
    <li class="active"><?=ucfirst($page)?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box" style="padding-bottom: 30px;">
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua;"><?=ucfirst($page)?> pasien</h3>
          <a href="<?=site_url('pasien')?>" class="btn btn-sm btn-flat btn-warning pull-right"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="col-md-4 col-md-offset-4">
        		<form action="<?=site_url('pasien/process')?>" method="post">
	                <div class="form-group">
	                  <label for="pasienName">Kode Pasien</label>
	                  <input type="text" class="form-control" value="<?=$row->kode_pasien?>" name="kode_pasien" id="pasienName" readonly>
	                </div>
	                <div class="form-group">
	                  <label for="pasienName">Nama Pasien</label>
	                  <input type="text" class="form-control" value="<?=$row->nama_pasien?>" name="nama_pasien" id="pasienName" >
	                </div>
	                <div class="form-group">
		                <label for="gender">Gender</label>
		                <select class="form-control select2" id="gender" name="gender_pasien">
		                  <option disabled <?=$page == 'tambah' ? 'selected' : ''?>>- pilih -</option>
                        <option value="L" <?=$row->gender_pasien == 'L' ? 'selected' : ''?>>Laki-laki</option>
                        <option value="P" <?=$row->gender_pasien == 'P' ? 'selected' : '' ?>>Perempuan</option>
		                </select>
		            </div>
					<div class="form-group">
	                  <label for="umur">Umur</label>
	                  <input type="number" value="<?=$row->umur_pasien?>" class="form-control" name="umur_pasien" id="umur">
	                </div>
	                <div class="form-group">
	                  <label for="phone">Telepon</label>
	                  <input type="number" value="<?=$row->telepon_pasien?>" class="form-control" name="telepon_pasien" id="phone">
	                </div>
	                <div class="form-group">
	                  <label for="address">Alamat</label>
	                  <textarea id="address" name="alamat_pasien" class="form-control"><?=$row->alamat_pasien?></textarea>
	                </div>
	              	<button type="submit" name="<?=$page?>" class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></i> Save</button>
	              	<button type="reset" class="btn btn-sm btn-default"><i class="fa fa-refresh"></i> Reset</button>
	            </form>
        	</div>
     
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

</section>