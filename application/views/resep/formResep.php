<section class="content-header">
  <h1 style="font-family: semua;">
    Resep
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Resep</li>
    <li class="active">Pembayaran</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box" style="padding-bottom: 30px;">
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua;">Pembayaran Resep</h3>
          <a href="<?=site_url('resep')?>" class="btn btn-sm btn-flat btn-warning" style="float: right;"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
     		<div class="col-md-8 col-md-offset-2">
		        <form action="<?=site_url('resep/process')?>" method="post">
		          <div class="col-md-6">
		            <div class="form-group">
		              <label for="nomor_resep">Nomor resep</label>
		              <input type="text" class="form-control" value="<?=$resep->nomor_resep?>" name="nomor_resep" id="nomor_resep" readonly>
		            </div>
		          </div>
		          <div class="col-md-6">
		            <div class="form-group">
		              <label for="tanggal_resep">Tanggal</label>
		              <input type="text" class="form-control" value="<?=tanggal($resep->tanggal_resep)?>" name="tanggal_resep" id="tanggal_resep" readonly>
		            </div>
		          </div>
		          <div class="col-md-6">
		            <div class="form-group">
		              <label for="pasien">Pasien</label>
		              <input type="text" class="form-control" value="<?=$resep->nama_pasien?>" name="nama_pasien" id="pasien" readonly>
		            </div>
		          </div>
		          <div class="col-md-6">
		            <div class="form-group">
		              <label for="dokter">Dokter</label>
		              <input type="text" class="form-control" value="<?=$resep->nama_dokter?>" name="nama_dokter" id="dokter" readonly>
		            </div>
		          </div>
		          <div class="col-md-12">
		            <table class="table table-bordered">
				        <thead>
				            <tr>
				              <th>Obat</th>
				              <th>Jumlah</th>
				              <th>Dosis</th>
				              <th>Harga</th>
				            </tr>
				        </thead>
				        <tbody>
				      	<?php 
				        	$query = $this->db->query("SELECT * FROM detail INNER JOIN obat ON obat.kode_obat = detail.kode_obat WHERE nomor_resep = '$resep->nomor_resep'"); 
                  			foreach ($query->result() as $resep) { ?>
				        	<tr>
				              <td><?=$resep->nama_obat?></td>
				              <td><?=$resep->jumlahObt?></td>
				              <td><?=$resep->dosis?></td>
				              <td><?=idr($resep->hargaObt)?></td>
				          	</tr>
				      	<?php } ?>
				            <tr>
				            	<td align="center" colspan="3"><b>Subtotal</b></td>
				            	<td><b>
				            	<?php $query = $this->db->query("SELECT * FROM detail INNER JOIN obat ON obat.kode_obat = detail.kode_obat WHERE nomor_resep = '$resep->nomor_resep' LIMIT 1")->row();
				            		echo idr($query->subtotal);
				            	?></b>
				            	</td>
				            </tr>
				        </tbody>
				    </table>
		          </div>
		          <div class="col-md-6">
		            <div class="form-group">
		              <label for="bayar">Bayar</label>
		              <input type="hidden" onKeyUp="hitungKembali()" onKeyDown="hitungKembali()" onChange="hitungKembali()" value="<?=$query->subtotal?>" class="form-control" name="totalHarga" id="totalHarga">
		              <input type="number" onKeyUp="hitungKembali()" onKeyDown="hitungKembali()" onChange="hitungKembali()" value="" class="form-control" name="bayar" id="bayar">
		            </div>
		          </div>
		          <div class="col-md-6">
		            <div class="form-group">
		              <label for="kembali">Kembali</label>
		              <input type="number" onKeyUp="hitungKembali()" onKeyDown="hitungKembali()" onChange="hitungKembali()" value="" class="form-control" name="kembali" id="kembali">
		            </div>
		          </div>
		          <div class="col-md-12">
		            <button type="submit" name="edit" class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
		            <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-undo"></i> Batal</button> 
		          </div>
		        </form>
		      </div>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

</section>
<script type="text/javascript">
	function hitungKembali()
    {
        const totalHarga = document.getElementById('totalHarga').value;
        const bayar = document.getElementById('bayar').value;
        const hasil = bayar - totalHarga;
        document.getElementById('kembali').value = hasil;
    }
</script>