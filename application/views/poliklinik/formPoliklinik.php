<section class="content-header">
  <h1 style="font-family: semua;">
    Poliklinik
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Poliklinik</li>
    <li class="active"><?=ucfirst($page)?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box" style="padding-bottom: 30px;">
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua;"><?=ucfirst($page)?> Poliklinik</h3>
          <a href="<?=site_url('poliklinik')?>" class="btn btn-sm btn-flat btn-warning" style="float: right;"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="col-md-4 col-md-offset-4">
        		<form action="<?=site_url('poliklinik/process')?>" method="post">
        			<?php if ($page == 'edit') {?>
                        <input type="hidden" name="id_poliklinik" value="<?=$row->id_poliklinik?>">
                    <?php } ?>
	                <div class="form-group">
	                  <label for="poliklinikName">Kode Poliklinik</label>
	                  <input type="text" class="form-control" value="<?=$row->kode_poliklinik?>" name="kode_poliklinik" id="poliklinikName" readonly>
	                </div>
	                <div class="form-group">
	                  <label for="poliklinikName">Nama Poliklinik</label>
	                  <input type="text" class="form-control" value="<?=$row->nama_poliklinik?>" name="nama_poliklinik" id="poliklinikName" >
	                </div>
	              	<button type="submit" name="<?=$page?>" class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
	              	<button type="reset" class="btn btn-sm btn-default"><i class="fa fa-refresh"></i> Batal</button>
	            </form>
        	</div>
     
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

</section>