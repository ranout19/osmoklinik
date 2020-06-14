<section class="content-header">
  <h1 style="font-family: semua;">
    Stock
    <small>Keluar</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Stock</li>
    <li>Keluar</li>
    <li class="active">Tambah</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box" style="padding-bottom: 30px;">
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua;">Tambah Stok Keluar</h3>
          <a href="<?=site_url('stok/keluar')?>" class="btn btn-sm btn-flat btn-warning" style="float: right;"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="col-md-4 col-md-offset-4">
        		<form action="<?=site_url('stok/proses')?>" method="post">
					<div class="form-group">
					  <label for="datepicker">Tanggal</label>
					  <input type="text" name="tanggal" value="<?= tanggal(date('Y-m-d')) ?>" class="form-control datetimepicker-input" id="datepicker" readonly>
					</div>
					<div class="form-group">
						<label for="barcode">Obat</label>
						<div class="input-group">
							<input type="hidden" name="kode_obat" id="kode_obat">
						    <input type="text" id="obat" class="form-control" required autofocus>
						    <div class="input-group-btn">
						        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#modal-obat"><i class="fa fa-search" style="font-weight: 1000; font-size: 17px; margin-right: -1px;"></i></button>
						    </div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-7">	
					            <label for="kode">Kode</label>
					            <input type="text" class="form-control" id="kode" name="kode" value="-" required readonly>
							</div>
							<div class="col-md-5">	
					            <label for="stok">Stok</label>
					            <input type="text" class="form-control" id="stok" name="stok" value="-" required readonly>
							</div>
						</div>
					</div>
					<div class="form-group">
					    <label for="keterangan">Keterangan</label>
					    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Kadaluwarsa / rusak / hilang / dll" required>
					</div>
					<div class="form-group">
					    <label for="qty">Qty</label>
					    <input type="number" class="form-control" id="qty" name="qty" required>
					</div>
	              	<button type="submit" name="keluar" class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
	              	<button type="reset" class="btn btn-sm btn-default"><i class="fa fa-refresh"></i> Batal</button>
	            </form>
        	</div>
     
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

</section>
<div class="modal fade" id="modal-obat" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="demoModalLabel" style="font-family: semua; font-size: 18px;">Obat</h6>
            </div>
            <div class="modal-body table-responsive">
	            <table id="keluar" class="table table-responsive" style="width: 100%;">
	                <thead>
	                    <tr>
	                        <th class="nosort" style="border:none;width: 40px;">Kode</th>
	                        <th class="nosort" style="border:none;width: 180px;">Nama</th>
	                        <th class="nosort" style="border:none;width: 140px;">Kategori</th>
	                        <th class="nosort" style="border:none;width: 120px;">Jenis</th>
	                        <th class="nosort" style="border:none;width: 120px;">Jumlah</th>
	                        <th class="nosort" style="border:none;">Pilih</th>
	                    </tr>
	                </thead>
	                <tbody>
	            	<?php
	            		foreach ($obat->result() as $data) { ?>
	            		<tr>
	            			<td><?=$data->kode_obat?></td>
	            			<td><?=$data->nama_obat?></td>
	            			<td><?=$data->kategori_obat?></td>
	            			<td><?=$data->jenis_obat?></td>
	            			<td><?=$data->jumlah_obat?></td>
	            			<td>
	            				<button type="button" class="btn btn-xs btn-info" 
	            				id="pilih" 
	            				data-kode_obat="<?=$data->kode_obat?>"
	            				data-nama_obat="<?=$data->nama_obat?>" 
	            				data-jumlah_obat="<?=$data->jumlah_obat?>">
	            					<i class="fa fa-check"></i> Pilih
	            				</button>
	            			</td>
	            		</tr>
	            	<?php } ?>
	                </tbody>
	            </table>
            </div>
        </div>
    </div>
</div>
<script>
	$(document).on('click', '#pilih', function() {

		var kode_obat = $(this).data('kode_obat');
		var nama_obat = $(this).data('nama_obat');
		var jumlah_obat = $(this).data('jumlah_obat');

		$('#kode_obat').val(kode_obat);
		$('#obat').val(nama_obat);
		$('#kode').val(kode_obat);
		$('#stok').val(jumlah_obat);

		$('#modal-obat').modal('hide');
	})
</script>
<script>
	$(document).ready(function () {
		$('#keluar').DataTable({
			"columnDefs" : [
                {
                   "targets" : [0, 1, 2, 3, 4, 5],
                   "orderable" : false
                },
                {
                   "targets" : [5],
                   "className" : 'text-center'
                },
                {
                   "targets" : [1, 2, 3, 4],
                   "className" : 'text-left'
                }
            ]
		})
	})
</script>

