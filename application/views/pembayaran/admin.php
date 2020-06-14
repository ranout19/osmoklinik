
<section class="content-header">
  <h1 style="font-family: semua;">
    Pembayaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Pembayaran</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">

        <div class="cantdelete" data-cantdelete="<?=$this->session->flashdata('cantdelete')?>"></div>
        <div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
        <div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
        
      <div class="box-header text-center" style="margin: 7px 0 -14px;">
        <h3 class="box-title" style="font-family: semua; ">Riwayat Pembayaran</h3>
      </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="pembayaran" class="table table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor</th>
                  <th>Tanggal</th>
                  <th>Pasien</th>
                  <th>Biaya</th>
                  <th>Bayar</th>
                  <th>Kembali</th>
              		<th style="float: right;margin-right: 2px;">Opsi</th>
                </tr>
            </thead>
            <tbody>
        	<?php 
        		$no = 1;
        		foreach ($pembayaran->result() as $result) { ?>
        		<tr>
                  <td style="width: 5%;"><?=$no++?></td>
                  <td style="width: 17%;"><?=$result->nomor_pembayaran?></td>
                  <td><?=tanggal($result->tanggal_pembayaran)?></td>
                  <td><?=$result->nama_pasien?></td>
                  <td><?=idr($result->jumlah_pembayaran)?></td>
                  <td><?=idr($result->bayar)?></td>
                  <td><?=idr($result->kembali)?></td>
                  <td align="right">
              		<a href="<?=site_url('pembayaran/hapus/'.$result->nomor_pembayaran)?>" class="btn btn-sm btn-danger hapus" style="font-family: semua;"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
        	<?php
        		}
        	 ?>
                
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

</section>
<!-- /.content -->
<script>
	$(document).ready(function () {
		$('#pembayaran').DataTable({
			"columnDefs" : [
                {
                   "targets" : [0, 1, 2, 3, 4, 5, 6, 7],
                   "orderable" : false
                },
                {
                   "targets" : [0],
                   "className" : 'text-center'
                },
                {
                   "targets" : [1, 2, 3, 4, 5, 6],
                   "className" : 'text-left'
                }
            ]
		})
	})
</script>
