<section class="content-header">
  <h1 style="font-family: semua;">
    Dokter
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Dokter</li>
    <li class="active"><?=ucfirst($page)?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box" style="padding-bottom: 30px;">
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua;"><?=ucfirst($page)?> Dokter</h3>
          <a href="<?=site_url('dokter')?>" class="btn btn-sm btn-flat btn-warning" style="float: right;"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<form action="<?=site_url('dokter/process')?>" method="post">
        			<?php if ($page == 'edit') {?>
                        <input type="hidden" name="kode_dokter" value="<?=$row->kode_dokter?>">
                    <?php } ?>
                <div class="col-md-4">
	                <div class="form-group">
	                  <label for="dokterName">Kode Dokter</label>
	                  <input type="text" class="form-control" value="<?=$row->kode_dokter?>" name="kode_dokter" id="dokterName" readonly>
	                </div>
	                <div class="form-group">
	                  <label for="dokterName">Nama dokter</label>
	                  <input type="text" class="form-control" value="<?=$row->nama_dokter?>" name="nama_dokter" id="dokterName" >
	                </div>
	                <div class="form-group">
		                <label for="spesialis">Spesialis</label>
		                <select class="form-control select2" id="spesialis" name="spesialis_dokter">
		                  <option disabled <?=$page == 'tambah' ? 'selected' : ''?>>- pilih -</option>
                        <option value="gigi" <?=$row->spesialis_dokter == 'gigi' ? 'selected' : ''?>>Gigi</option>
                        <option value="tulang" <?=$row->spesialis_dokter == 'tulang' ? 'selected' : '' ?>>Tulang</option>
                        <option value="mata" <?=$row->spesialis_dokter == 'mata' ? 'selected' : '' ?>>Mata</option>
		                </select>
		            </div>
		            <?php if ($page == 'tambah') {?>
			            <div class="form-group">
			                <label for="poliklinik">Poliklinik</label>
			                <select class="form-control select2" id="poliklinik" name="kode_poliklinik">
			                  <option disabled <?=$page == 'tambah' ? 'selected' : ''?>>- pilih -</option>
			                  <?php foreach ($poliklinik->result() as $poli) { ?>
	                            <option value="<?=$poli->kode_poliklinik?>" <?=$poli->kode_poliklinik == $row->kode_poliklinik ? 'selected' : null?>><?=$poli->nama_poliklinik?></option>
	                        <?php } ?>
			                </select>
			            </div>
		            <?php } ?>
		        </div>
		        <div class="col-md-4">
		        <?php if ($page == 'tambah') {?>
					<div class="form-group">
	                  <label for="username">Username</label>
	                  <input type="text" value="" class="form-control" name="username" id="username">
	                </div>
	                <div class="form-group">
	                  <label for="password">Password</label>
	                  <input type="password" value="" class="form-control" name="password" id="password">
	                </div>
	            <?php } ?>
	            <?php if ($page == 'edit') {?>
		            <div class="form-group">
		                <label for="poliklinik">Poliklinik</label>
		                <select class="form-control select2" id="poliklinik" name="kode_poliklinik">
		                  <option disabled <?=$page == 'tambah' ? 'selected' : ''?>>- pilih -</option>
		                  <?php foreach ($poliklinik->result() as $poli) { ?>
                            <option value="<?=$poli->kode_poliklinik?>" <?=$poli->kode_poliklinik == $row->kode_poliklinik ? 'selected' : null?>><?=$poli->nama_poliklinik?></option>
                        <?php } ?>
		                </select>
		            </div>
	            <?php } ?>
	                <div class="form-group">
	                  <label for="tarif">Tarif</label>
	                  <input type="number" value="<?=$row->tarif_dokter?>" class="form-control" name="tarif_dokter" id="tarif">
	                </div>
	                <div class="form-group">
	                  <label for="telepon">Telepon</label>
	                  <input type="number" value="<?=$row->telepon_dokter?>" class="form-control" name="telepon_dokter" id="telepon">
	                </div>
	            </div>
	            <div class="col-md-4">
	                <div class="form-group">
	                  <label for="alamat">Alamat</label>
	                  <textarea id="alamat" name="alamat_dokter" class="form-control" style="height: <?=$page == 'tambah' ? '203px' : '131px'?>;"><?=$row->alamat_dokter?></textarea>
	                </div>
	              	<button type="submit" name="<?=$page?>" class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
	              	<button type="reset" class="btn btn-sm btn-default"><i class="fa fa-refresh"></i> Batal</button>
	            </div>
	       	</form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

</section>