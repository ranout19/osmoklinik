<section class="content-header">
  <h1 style="font-family: semua;">
    Diagnosa & Resep Obat
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Diagnosa & Resep Obat</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box" style="padding-bottom: 30px;">
        <div class="box-header">

          <a href="" class="btn btn-sm btn-flat btn-default" style="float: left;"><i class="fa fa-refresh"></i> Refresh</a>
          <a href="<?=site_url('pasien/poliklinik')?>" class="btn btn-sm btn-flat btn-warning" style="float: right;"><i class="fa fa-chevron-left"></i>  Kembali</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
     		<div class="col-md-8 col-md-offset-2">
		        <form action="<?=site_url('diagnosa/process')?>" method="post">
		          <div class="col-md-6">
		            <div class="form-group">
		              <label for="nomor_resep">Nomor Resep</label>
		              <input type="text" class="form-control" value="<?=$nomor?>" name="nomor_resep" id="nomor_resep" readonly>
		            </div>
		          </div>
		          <div class="col-md-6">
		            <div class="form-group">
		              <label for="tanggal_resep">Tanggal</label>
		              <input type="text" class="form-control" value="<?=tanggal(date('Y-m-d'))?>" id="tanggal_resep" readonly>
		              <input type="date" style="display: none;" class="form-control" value="<?=date('Y-m-d')?>" name="tanggal_resep">
		            </div>
		          </div>
		          <div class="col-md-6">
		            <div class="form-group">
		              <label for="pasien">Pasien</label>
		              <input type="text" class="form-control" value="<?=$pasien->nama_pasien?>" name="pasien" id="pasien" readonly>
		              <input type="hidden" class="form-control" value="<?=$pasien->kode_pasien?>" name="kode_pasien" >
		              <input type="hidden" class="form-control" value="<?=$pasien->nomor_pendaftaran?>" name="nomor_pendaftaran" >
		            </div>
		          </div>

		          <div class="col-md-6">
		            <div class="form-group">
		              <label for="dokter">Dokter</label>
		              <input type="text" class="form-control" value="<?=$pasien->nama_dokter?>" name="dokter" id="dokter" readonly>
		              <input type="hidden" class="form-control" value="<?=$pasien->kode_dokter?>" name="kode_dokter" >
		              <input type="hidden" class="form-control" value="<?=$pasien->kode_poliklinik?>" name="kode_poliklinik">
		            </div>
		          </div>
		          <div class="col-md-12">
		            <div class="form-group">
		              <label for="diagnosa">Diagnosa</label>
		              <textarea id="diagnosa" name="diagnosa" class="form-control"></textarea>
		            </div>
		          </div>
		          <div class="col-md-12" id="form-item">
		            <div class="form-group">
		            	<div class="col-md-11" style="padding: 0 0;">
		              	<label for="resep">Jumlah Resep Obat</label>
                        <small class="pull-right">*Kosongkan jika tidak ada resep</small>
		              	<input type="number" name="resep" id="resep" class="form-control" placeholder="maksimal 10 obat">
		              </div>
		              <div class="col-md-1" style="padding: 25px 0;">
		              	<button type="button" name="add" class="btn btn-success btn-sm pull-right add"><i class="fa fa-plus"></i></button>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12" style="margin: 10px 0 0 0;">
		            <button type="submit" name="tambah" class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
		            <button type="Reset" class="btn btn-sm btn-default"><i class="fa fa-undo"></i> Batal</button> 
		          </div>
		        </form>
		      </div>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
</section>
<div class="modal fade" id="modal-obat1" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="demoModalLabel" style="font-family: semua; font-size: 18px;">Obat</h6>
            </div>
            <div class="modal-body table-responsive">
            <table id="obatId1" class="table table-responsive" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="nosort" style="border:none;width: 40px;">Kode</th>
                        <th class="nosort" style="border:none;width: 180px;">Nama</th>
                        <th class="nosort" style="border:none;width: 140px;">Kategori</th>
                        <th class="nosort" style="border:none;width: 120px;">Jenis</th>
                        <th class="nosort" style="border:none;">Pilih</th>
                    </tr>
                </thead>
                <tbody>
            	<?php
            		foreach ($obat->result() as $i => $data) { ?>
            		<tr>
            			<td><?=$data->kode_obat?></td>
            			<td><?=$data->nama_obat?></td>
            			<td><?=$data->kategori_obat?></td>
            			<td><?=$data->jenis_obat?></td>
            			<td>
            				<button type="button" class="btn btn-xs btn-info" 
            				id="select1" 
            				data-kode_obat="<?=$data->kode_obat?>"
            				data-nama_obat="<?=$data->nama_obat?>" 
            				data-harga_obat="<?=$data->harga_obat?>">
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

<div class="modal fade" id="modal-obat2" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="demoModalLabel" style="font-family: semua; font-size: 18px;">Obat</h6>
            </div>
            <div class="modal-body table-responsive">
            <table id="obatId2" class="table table-responsive" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="nosort" style="border:none;width: 40px;">Kode</th>
                        <th class="nosort" style="border:none;width: 180px;">Nama</th>
                        <th class="nosort" style="border:none;width: 140px;">Kategori</th>
                        <th class="nosort" style="border:none;width: 120px;">Jenis</th>
                        <th class="nosort" style="border:none;">Pilih</th>
                    </tr>
                </thead>
                <tbody>
            	<?php
            		foreach ($obat->result() as $i => $data) { ?>
            		<tr>
            			<td><?=$data->kode_obat?></td>
            			<td><?=$data->nama_obat?></td>
            			<td><?=$data->kategori_obat?></td>
            			<td><?=$data->jenis_obat?></td>
            			<td>
            				<button type="button" class="btn btn-xs btn-info" 
            				id="select2" 
            				data-kode_obat="<?=$data->kode_obat?>"
            				data-nama_obat="<?=$data->nama_obat?>" 
            				data-harga_obat="<?=$data->harga_obat?>">
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

<div class="modal fade" id="modal-obat3" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="demoModalLabel" style="font-family: semua; font-size: 18px;">Obat</h6>
            </div>
            <div class="modal-body table-responsive">
            <table id="obatId3" class="table table-responsive" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="nosort" style="border:none;width: 40px;">Kode</th>
                        <th class="nosort" style="border:none;width: 180px;">Nama</th>
                        <th class="nosort" style="border:none;width: 140px;">Kategori</th>
                        <th class="nosort" style="border:none;width: 120px;">Jenis</th>
                        <th class="nosort" style="border:none;">Pilih</th>
                    </tr>
                </thead>
                <tbody>
            	<?php
            		foreach ($obat->result() as $i => $data) { ?>
            		<tr>
            			<td><?=$data->kode_obat?></td>
            			<td><?=$data->nama_obat?></td>
            			<td><?=$data->kategori_obat?></td>
            			<td><?=$data->jenis_obat?></td>
            			<td>
            				<button type="button" class="btn btn-xs btn-info" 
            				id="select3" 
            				data-kode_obat="<?=$data->kode_obat?>"
            				data-nama_obat="<?=$data->nama_obat?>" 
            				data-harga_obat="<?=$data->harga_obat?>">
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

<div class="modal fade" id="modal-obat4" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="demoModalLabel" style="font-family: semua; font-size: 18px;">Obat</h6>
            </div>
            <div class="modal-body table-responsive">
            <table id="obatId4" class="table table-responsive" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="nosort" style="border:none;width: 40px;">Kode</th>
                        <th class="nosort" style="border:none;width: 180px;">Nama</th>
                        <th class="nosort" style="border:none;width: 140px;">Kategori</th>
                        <th class="nosort" style="border:none;width: 120px;">Jenis</th>
                        <th class="nosort" style="border:none;">Pilih</th>
                    </tr>
                </thead>
                <tbody>
            	<?php
            		foreach ($obat->result() as $i => $data) { ?>
            		<tr>
            			<td><?=$data->kode_obat?></td>
            			<td><?=$data->nama_obat?></td>
            			<td><?=$data->kategori_obat?></td>
            			<td><?=$data->jenis_obat?></td>
            			<td>
            				<button type="button" class="btn btn-xs btn-info" 
            				id="select4" 
            				data-kode_obat="<?=$data->kode_obat?>"
            				data-nama_obat="<?=$data->nama_obat?>" 
            				data-harga_obat="<?=$data->harga_obat?>">
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
<div class="modal fade" id="modal-obat5" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="demoModalLabel" style="font-family: semua; font-size: 18px;">Obat</h6>
            </div>
            <div class="modal-body table-responsive">
            <table id="obatId5" class="table table-responsive" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="nosort" style="border:none;width: 40px;">Kode</th>
                        <th class="nosort" style="border:none;width: 180px;">Nama</th>
                        <th class="nosort" style="border:none;width: 140px;">Kategori</th>
                        <th class="nosort" style="border:none;width: 120px;">Jenis</th>
                        <th class="nosort" style="border:none;">Pilih</th>
                    </tr>
                </thead>
                <tbody>
            	<?php
            		foreach ($obat->result() as $i => $data) { ?>
            		<tr>
            			<td><?=$data->kode_obat?></td>
            			<td><?=$data->nama_obat?></td>
            			<td><?=$data->kategori_obat?></td>
            			<td><?=$data->jenis_obat?></td>
            			<td>
            				<button type="button" class="btn btn-xs btn-info" 
            				id="select5" 
            				data-kode_obat="<?=$data->kode_obat?>"
            				data-nama_obat="<?=$data->nama_obat?>" 
            				data-harga_obat="<?=$data->harga_obat?>">
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
<div class="modal fade" id="modal-obat6" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="demoModalLabel" style="font-family: semua; font-size: 18px;">Obat</h6>
            </div>
            <div class="modal-body table-responsive">
            <table id="obatId6" class="table table-responsive" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="nosort" style="border:none;width: 40px;">Kode</th>
                        <th class="nosort" style="border:none;width: 180px;">Nama</th>
                        <th class="nosort" style="border:none;width: 140px;">Kategori</th>
                        <th class="nosort" style="border:none;width: 120px;">Jenis</th>
                        <th class="nosort" style="border:none;">Pilih</th>
                    </tr>
                </thead>
                <tbody>
            	<?php
            		foreach ($obat->result() as $i => $data) { ?>
            		<tr>
            			<td><?=$data->kode_obat?></td>
            			<td><?=$data->nama_obat?></td>
            			<td><?=$data->kategori_obat?></td>
            			<td><?=$data->jenis_obat?></td>
            			<td>
            				<button type="button" class="btn btn-xs btn-info" 
            				id="select6" 
            				data-kode_obat="<?=$data->kode_obat?>"
            				data-nama_obat="<?=$data->nama_obat?>" 
            				data-harga_obat="<?=$data->harga_obat?>">
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
<div class="modal fade" id="modal-obat7" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="demoModalLabel" style="font-family: semua; font-size: 18px;">Obat</h6>
            </div>
            <div class="modal-body table-responsive">
            <table id="obatId7" class="table table-responsive" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="nosort" style="border:none;width: 40px;">Kode</th>
                        <th class="nosort" style="border:none;width: 180px;">Nama</th>
                        <th class="nosort" style="border:none;width: 140px;">Kategori</th>
                        <th class="nosort" style="border:none;width: 120px;">Jenis</th>
                        <th class="nosort" style="border:none;">Pilih</th>
                    </tr>
                </thead>
                <tbody>
            	<?php
            		foreach ($obat->result() as $i => $data) { ?>
            		<tr>
            			<td><?=$data->kode_obat?></td>
            			<td><?=$data->nama_obat?></td>
            			<td><?=$data->kategori_obat?></td>
            			<td><?=$data->jenis_obat?></td>
            			<td>
            				<button type="button" class="btn btn-xs btn-info" 
            				id="select7" 
            				data-kode_obat="<?=$data->kode_obat?>"
            				data-nama_obat="<?=$data->nama_obat?>" 
            				data-harga_obat="<?=$data->harga_obat?>">
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
<div class="modal fade" id="modal-obat8" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="demoModalLabel" style="font-family: semua; font-size: 18px;">Obat</h6>
            </div>
            <div class="modal-body table-responsive">
            <table id="obatId8" class="table table-responsive" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="nosort" style="border:none;width: 40px;">Kode</th>
                        <th class="nosort" style="border:none;width: 180px;">Nama</th>
                        <th class="nosort" style="border:none;width: 140px;">Kategori</th>
                        <th class="nosort" style="border:none;width: 120px;">Jenis</th>
                        <th class="nosort" style="border:none;">Pilih</th>
                    </tr>
                </thead>
                <tbody>
            	<?php
            		foreach ($obat->result() as $i => $data) { ?>
            		<tr>
            			<td><?=$data->kode_obat?></td>
            			<td><?=$data->nama_obat?></td>
            			<td><?=$data->kategori_obat?></td>
            			<td><?=$data->jenis_obat?></td>
            			<td>
            				<button type="button" class="btn btn-xs btn-info" 
            				id="select8" 
            				data-kode_obat="<?=$data->kode_obat?>"
            				data-nama_obat="<?=$data->nama_obat?>" 
            				data-harga_obat="<?=$data->harga_obat?>">
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
<div class="modal fade" id="modal-obat9" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="demoModalLabel" style="font-family: semua; font-size: 18px;">Obat</h6>
            </div>
            <div class="modal-body table-responsive">
            <table id="obatId9" class="table table-responsive" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="nosort" style="border:none;width: 40px;">Kode</th>
                        <th class="nosort" style="border:none;width: 180px;">Nama</th>
                        <th class="nosort" style="border:none;width: 140px;">Kategori</th>
                        <th class="nosort" style="border:none;width: 120px;">Jenis</th>
                        <th class="nosort" style="border:none;">Pilih</th>
                    </tr>
                </thead>
                <tbody>
            	<?php
            		foreach ($obat->result() as $i => $data) { ?>
            		<tr>
            			<td><?=$data->kode_obat?></td>
            			<td><?=$data->nama_obat?></td>
            			<td><?=$data->kategori_obat?></td>
            			<td><?=$data->jenis_obat?></td>
            			<td>
            				<button type="button" class="btn btn-xs btn-info" 
            				id="select9" 
            				data-kode_obat="<?=$data->kode_obat?>"
            				data-nama_obat="<?=$data->nama_obat?>" 
            				data-harga_obat="<?=$data->harga_obat?>">
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
<div class="modal fade" id="modal-obat10" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="demoModalLabel" style="font-family: semua; font-size: 18px;">Obat</h6>
            </div>
            <div class="modal-body table-responsive">
            <table id="obatId10" class="table table-responsive" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="nosort" style="border:none;width: 40px;">Kode</th>
                        <th class="nosort" style="border:none;width: 180px;">Nama</th>
                        <th class="nosort" style="border:none;width: 140px;">Kategori</th>
                        <th class="nosort" style="border:none;width: 120px;">Jenis</th>
                        <th class="nosort" style="border:none;">Pilih</th>
                    </tr>
                </thead>
                <tbody>
            	<?php
            		foreach ($obat->result() as $i => $data) { ?>
            		<tr>
            			<td><?=$data->kode_obat?></td>
            			<td><?=$data->nama_obat?></td>
            			<td><?=$data->kategori_obat?></td>
            			<td><?=$data->jenis_obat?></td>
            			<td>
            				<button type="button" class="btn btn-xs btn-info" 
            				id="select10" 
            				data-kode_obat="<?=$data->kode_obat?>"
            				data-nama_obat="<?=$data->nama_obat?>" 
            				data-harga_obat="<?=$data->harga_obat?>">
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
<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click', '.add', function() {
			var length = document.getElementById('resep').value;
			if (length > 10) {
			  Swal.fire({
			      type: 'warning',
			      title: 'Peringatan!',
			      text: 'Maksimal 10 obat',
			      showConfirmButton: false,
			      timer: 1400
			   });
			  return false;
			}
			for (var i = 1; i <= 10; i++) {
				$('#obat'+i+'').remove();			
			}
			var form = '';
			for (var i = 1; i <= length; i++) {
				form += '<div class="form-group" id="obat'+i+'" style="margin: 10px 0 0 0;">';

				form += '<div class="col-md-5" style="padding: 0 0;"><div class="input-group"><input type="hidden" name="kode_obat[]" id="kode_obat'+i+'"><input type="hidden" name="harga_obat[]" id="harga_obat'+i+'"><input type="text" id="nama_obat'+i+'" class="form-control" placeholder="pilih obat" required readonly><div class="input-group-btn"><button class="btn btn-info" type="button"data-toggle="modal" data-target="#modal-obat'+i+'"><i class="fa fa-search" style="font-weight: 1000; font-size: 17px; margin-right: -1px;"></i></button></div></div></div>';

				form += '<div class="col-md-3"><input type="number" name="jumlah[]" id="jumlah'+i+'" placeholder="jumlah" class="form-control"></div>';

				form += '<div class="col-md-3" style="padding: 0 0;"><input type="text" name="dosis[]" placeholder="dosis" id="dosis'+i+'" class="form-control"></div>';

				form += '<div class="col-md-1" style="padding:0 0 24px 0;"><button type="button" name="remove" class="btn btn-danger btn-sm pull-right remove"><i class="fa fa-close"></i></button></div>';

				form += '</div>';
			}
			$('#form-item').append(form);			
		});
		$(document).on('click', '.remove', function() {
			$(this).closest('.form-group').remove();
		});
	});
	$(document).on('click', '#select1', function() {
		var kode_obat = $(this).data('kode_obat');
		var nama_obat = $(this).data('nama_obat');
		var harga_obat = $(this).data('harga_obat');

		$('#kode_obat1').val(kode_obat);
		$('#nama_obat1').val(nama_obat);
		$('#harga_obat1').val(harga_obat);

		$('#modal-obat1').modal('hide');
	});
	$(document).on('click', '#select2', function() {
		var kode_obat = $(this).data('kode_obat');
		var nama_obat = $(this).data('nama_obat');
		var harga_obat = $(this).data('harga_obat');

		$('#kode_obat2').val(kode_obat);
		$('#nama_obat2').val(nama_obat);
		$('#harga_obat2').val(harga_obat);

		$('#modal-obat2').modal('hide');
	});
	$(document).on('click', '#select3', function() {
		var kode_obat = $(this).data('kode_obat');
		var nama_obat = $(this).data('nama_obat');
		var harga_obat = $(this).data('harga_obat');

		$('#kode_obat3').val(kode_obat);
		$('#nama_obat3').val(nama_obat);
		$('#harga_obat3').val(harga_obat);

		$('#modal-obat3').modal('hide');
	});
	$(document).on('click', '#select4', function() {
		var kode_obat = $(this).data('kode_obat');
		var nama_obat = $(this).data('nama_obat');
		var harga_obat = $(this).data('harga_obat');

		$('#kode_obat4').val(kode_obat);
		$('#nama_obat4').val(nama_obat);
		$('#harga_obat4').val(harga_obat);

		$('#modal-obat4').modal('hide');
	});
	$(document).on('click', '#select5', function() {
		var kode_obat = $(this).data('kode_obat');
		var nama_obat = $(this).data('nama_obat');
		var harga_obat = $(this).data('harga_obat');

		$('#kode_obat5').val(kode_obat);
		$('#nama_obat5').val(nama_obat);
		$('#harga_obat5').val(harga_obat);

		$('#modal-obat5').modal('hide');
	});
	$(document).on('click', '#select6', function() {
		var kode_obat = $(this).data('kode_obat');
		var nama_obat = $(this).data('nama_obat');
		var harga_obat = $(this).data('harga_obat');

		$('#kode_obat6').val(kode_obat);
		$('#nama_obat6').val(nama_obat);
		$('#harga_obat6').val(harga_obat);

		$('#modal-obat6').modal('hide');
	});
	$(document).on('click', '#select7', function() {
		var kode_obat = $(this).data('kode_obat');
		var nama_obat = $(this).data('nama_obat');
		var harga_obat = $(this).data('harga_obat');

		$('#kode_obat7').val(kode_obat);
		$('#nama_obat7').val(nama_obat);
		$('#harga_obat7').val(harga_obat);

		$('#modal-obat7').modal('hide');
	});
	$(document).on('click', '#select8', function() {
		var kode_obat = $(this).data('kode_obat');
		var nama_obat = $(this).data('nama_obat');
		var harga_obat = $(this).data('harga_obat');

		$('#kode_obat8').val(kode_obat);
		$('#nama_obat8').val(nama_obat);
		$('#harga_obat8').val(harga_obat);

		$('#modal-obat8').modal('hide');
	});
	$(document).on('click', '#select9', function() {
		var kode_obat = $(this).data('kode_obat');
		var nama_obat = $(this).data('nama_obat');
		var harga_obat = $(this).data('harga_obat');

		$('#kode_obat9').val(kode_obat);
		$('#nama_obat9').val(nama_obat);
		$('#harga_obat9').val(harga_obat);

		$('#modal-obat9').modal('hide');
	});
	$(document).on('click', '#select10', function() {
		var kode_obat = $(this).data('kode_obat');
		var nama_obat = $(this).data('nama_obat');
		var harga_obat = $(this).data('harga_obat');

		$('#kode_obat10').val(kode_obat);
		$('#nama_obat10').val(nama_obat);

		$('#harga_obat10').val(harga_obat);

		$('#modal-obat10').modal('hide');
	});
	$(document).ready(function () {
		for (var i = 1; i <= 10; i++) {
			$('#obatId'+i+'').DataTable({
				"columnDefs" : [
	                {
	                   "targets" : [0, 1, 2, 3, 4],
	                   "orderable" : false
	                },
	                {
	                   "targets" : [4],
	                   "className" : 'text-center'
	                }
	            ]
			});
		}
	})
</script>