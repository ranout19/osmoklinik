 <section class="content-header">
  <h1 style="font-family: semua;">
    Pendaftaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Pendaftaran</li>
    <li class="active">Tambah</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box" style="padding-bottom: 24px;">
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua;">Tambah Pendaftaran</h3>
          <a href="<?=site_url('pasien')?>" class="btn btn-flat btn-sm btn-warning pull-right"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
     		<div class="col-md-12">
		        <form action="<?=site_url('pendaftaran/process')?>" method="post">
		        	<div class="col-md-4">
		        	  <div class="col-md-12">
			            <div class="form-group">
			              <label for="nomor_pendaftaran">Nomor Pendaftaran</label>
			              <input type="text" class="form-control" value="<?=$nomor?>" name="nomor_pendaftaran" id="nomor_pendaftaran" readonly>
			            </div>
			          </div>
			          <div class="col-md-12">
			            <div class="form-group">
			              <label for="Pasien">Tanggal </label>
			              <input type="date" class="form-control" value="<?=date('Y-m-d')?>" name="tanggal_pendaftaran" style="display: none;">
                          <input type="text" class="form-control" value="<?=tanggal(date('Y-m-d'))?>" id="tanggal_pendaftaran" readonly>
			            </div>
			          </div>
			          <div class="col-md-12">
			            <div class="form-group">
			              <label for="nama_pasien">Pasien</label>
			              <input type="hidden" value="<?=$pasien->kode_pasien?>" name="kode_pasien" id="kode_pasien">
			              <input type="text" class="form-control" value="<?=$pasien->nama_pasien?>" name="nama_pasien" id="nama_pasien" readonly>
			            </div>
			          </div>
		        	</div>
		        	<div class="col-md-4">
		        	  <div class="col-md-12">
			            <div class="form-group">
							<label for="dokter">Dokter</label>
							<div class="input-group">
								<input type="hidden" name="kode_dokter" id="kode_dokter">
							    <input type="text" id="nama_dokter" class="form-control" required readonly>
							    <div class="input-group-btn">
							        <button class="btn btn-info" type="button"data-toggle="modal" data-target="#modal-dokter"><i class="fa fa-search" style="font-weight: 1000; font-size: 17px; margin-right: -1px;"></i></button>
							    </div>
							</div>
						</div>
			          </div>
			          <div class="col-md-12">
			            <div class="form-group">
			              <label for="nama_poliklinik">Poliklinik </label>
			              <input type="hidden" name="kode_poliklinik" id="kode_poliklinik">
			              <input type="text" class="form-control" value="" name="nama_poliklinik" id="nama_poliklinik" readonly>
			            </div>
			          </div>
			          <div class="col-md-12">
			            <div class="form-group">
			              <label for="biaya_pendaftaran">Biaya</label>
			              <input type="text" class="form-control" value="" name="biaya_pendaftaran" id="biaya_pendaftaran" readonly>
			            </div>
			          </div>
		        	</div>
		          <div class="col-md-4">
		            <div class="form-group">
		              <label for="keluhan">Keluhan</label>
		              <textarea id="keluhan" name="keluhan" class="form-control" style="margin: 0px -3px 0px 0px; height: 131px; width: 324px;"></textarea>
		            </div>
		             <button type="submit" name="tambah" class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
		            <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-undo"></i> Batal</button>
		          </div>
		        </form>
		      </div>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
</section>

<div class="modal fade" id="modal-dokter" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="demoModalLabel" style="font-family: semua; font-size: 18px;">Dokter</h6>
            </div>
            <div class="modal-body table-responsive">
            <table id="stockInForm" class="table table-responsive" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="nosort" style="border:none;width: 70px;">Kode</th>
                        <th class="nosort" style="border:none;width: 180px;">Nama</th>
                        <th class="nosort" style="border:none;width: 80px;">Spesialis</th>
                        <th class="nosort" style="border:none;width: 120px;">Poliklinik</th>
                        <th class="nosort" style="border:none;">Pilih</th>
                    </tr>
                </thead>
                <tbody>
            	<?php
            		foreach ($dokter->result() as $i => $data) { ?>
            		<tr>
            			<td><?=$data->kode_dokter?></td>
            			<td><?=$data->nama_dokter?></td>
            			<td><?=$data->spesialis_dokter?></td>
            			<td><?=$data->nama_poliklinik?></td>
            			<td>
            				<button type="button" class="btn btn-xs btn-info" 
            				id="select" 
            				data-kode_dokter="<?=$data->kode_dokter?>"
            				data-nama_dokter="<?=$data->nama_dokter?>" 
            				data-kode_poliklinik="<?=$data->kode_poliklinik?>"
            				data-nama_poliklinik="<?=$data->nama_poliklinik?>"
            				data-tarif="<?php
            							$kode = $pasien->kode_pasien;
            							$query = $this->db->query("SELECT * FROM pendaftaran WHERE kode_pasien = '$kode'");
            							$cek = $query->num_rows();
            							if($cek > 0){
            								echo 4000;
            							}else{
            								echo $data->tarif_dokter + 4000;
            							}
            							?>">
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
	$(document).on('click', '#select', function() {
		var kode_dokter = $(this).data('kode_dokter');
		var nama_dokter = $(this).data('nama_dokter');
		var kode_poliklinik = $(this).data('kode_poliklinik');
		var nama_poliklinik = $(this).data('nama_poliklinik');
		var biaya_pendaftaran = $(this).data('tarif');

		$('#kode_dokter').val(kode_dokter);
		$('#nama_dokter').val(nama_dokter);
		$('#kode_poliklinik').val(kode_poliklinik);
		$('#nama_poliklinik').val(nama_poliklinik);
		$('#biaya_pendaftaran').val(biaya_pendaftaran);

		$('#modal-dokter').modal('hide');
	});
	$(document).ready(function () {
		$('#stockInForm').DataTable({
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
		})
	})
</script>

