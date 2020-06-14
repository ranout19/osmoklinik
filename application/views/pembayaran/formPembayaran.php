<section class="content-header">
  <h1 style="font-family: semua;">
    Pembayaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Pembayaran</li>
    <li class="active"></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box" style="padding-bottom: 30px;">

    <div class="cantdelete" data-cantdelete="<?=$this->session->flashdata('cantdelete')?>"></div>
    <div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
    <div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua;">Tambah Pembayaran</h3>
          <a href="<?=site_url('pembayaran')?>" class="btn btn-md btn-flat btn-warning" style="float: right;"><i class="fa fa-undo"></i> Back</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="col-md-8 col-md-offset-2">
        		<form action="<?=site_url('pembayaran/process')?>" method="post">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nomor_pembayaran">Nomor Pembayaran</label>
                  <input type="hidden" class="form-control" value="<?=$row->kode_pasien?>" name="nomor_pendaftaran">
                  <input type="text" class="form-control" value="<?=$nomor?>" name="nomor_pembayaran" id="nomor_pembayaran" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <input type="date" class="form-control" value="<?=date('Y-m-d')?>" name="tanggal_pembayaran" id="tanggal" style="display: none;">
                  <input type="text" class="form-control" value="<?=tanggal(date('Y-m-d'))?>" id="tanggal" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
	                <label for="pasien">Pasien</label>
	                <input type="hidden" class="form-control" value="<?=$row->kode_pasien?>" id="pasien" name="kode_pasien">
                  <input type="text" class="form-control" value="<?=$row->nama_pasien?>" id="pasien" readonly>
	                </select>
		            </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="biaya">Biaya</label>
                  <input type="number" value="<?=$row->biaya_pendaftaran?>" onKeyUp="hitungKembali()" onKeyDown="hitungKembali()" onChange="hitungKembali()" class="form-control" name="biaya_pendaftaran" id="biaya" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="bayar">Bayar</label>
                  <input type="number" onKeyUp="hitungKembali()" onKeyDown="hitungKembali()" onChange="hitungKembali()" class="form-control" name="bayar_pendaftaran" id="bayar">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kembali">Kembali</label>
                  <input type="number" class="form-control" name="kembali" id="kembali" readonly>
                </div>
              </div>
              <div class="col-md-6">
	              	<button type="submit" name="tambah" class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
	              	<button type="reset" class="btn btn-sm btn-default"><i class="fa fa-refresh"></i> Batal</button>
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
      const biaya = document.getElementById('biaya').value;
      const bayar = document.getElementById('bayar').value;
      const hasil = bayar - biaya;
      document.getElementById('kembali').value = hasil;
  }
</script>