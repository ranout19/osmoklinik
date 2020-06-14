<section class="content-header">
  <h1 style="font-family: semua;">
    Obat
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Obat</li>
    <li class="active"><?=ucfirst($page)?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box" style="padding-bottom: 30px;">
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua;"><?=ucfirst($page)?> obat</h3>
          <a href="<?=site_url('obat')?>" class="btn btn-sm btn-flat btn-warning" style="float: right;"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="col-md-4 col-md-offset-4">
        		<form action="<?=site_url('obat/process')?>" method="post">
        			<?php if ($page == 'edit') {?>
                        <input type="hidden" name="id_obat" value="<?=$row->kode_obat?>">
                    <?php } ?>
	                <div class="form-group">
	                  <label for="obatName">Kode obat</label>
	                  <input type="text" class="form-control" value="<?=$row->kode_obat?>" name="kode_obat" id="obatName" readonly>
	                </div>
	                <div class="form-group">
	                  <label for="obatName">Nama obat</label>
	                  <input type="text" class="form-control" value="<?=$row->nama_obat?>" name="nama_obat" id="obatName" >
	                </div>
	                <div class="form-group">
		                <label for="jenis">Jenis</label>
		                <select class="form-control select2" id="jenis" name="jenis_obat">
		                  <option disabled <?=$page == 'tambah' ? 'selected' : ''?>>- pilih -</option>
                        <option value="tablet" <?=$row->jenis_obat == 'tablet' ? 'selected' : ''?>>Tablet</option>
                        <option value="kapsul" <?=$row->jenis_obat == 'kapsul' ? 'selected' : '' ?>>Kapsul</option>
                        <option value="kaplet" <?=$row->jenis_obat == 'kaplet' ? 'selected' : '' ?>>Kaplet</option>
		                </select>
		            </div>
		            <div class="form-group">
		                <label for="kategori">Kategori</label>
		                <select class="form-control select2" id="kategori" name="kategori_obat">
		                  <option disabled <?=$page == 'tambah' ? 'selected' : ''?>>- pilih -</option>
                        <option value="obat keras" <?=$row->kategori_obat == 'obat keras' ? 'selected' : ''?>>Obat Keras</option>
                        <option value="obat terbatas" <?=$row->kategori_obat == 'obat terbatas' ? 'selected' : '' ?>>Obat Terbatas</option>
                        <option value="obat bebas" <?=$row->kategori_obat == 'obat bebas' ? 'selected' : '' ?>>Obat Bebas</option>
		                </select>
		            </div>
					<div class="form-group">
	                  <label for="harga">Harga</label>
	                  <input type="number" value="<?=$row->harga_obat?>" class="form-control" name="harga_obat" id="harga">
	                </div>
	              	<button type="submit" name="<?=$page?>" class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
	              	<button type="reset" class="btn btn-sm btn-default"><i class="fa fa-undo"></i> Batal</button>
	            </form>
        	</div>
     
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

</section>