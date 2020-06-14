
<section class="content-header">
  <h1 style="font-family: semua;">
    Pendaftaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Pendaftaran</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
    <div class="cantdelete" data-cantdelete="<?=$this->session->flashdata('cantdelete')?>"></div>
    <div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
    <div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
    <div class="box-header text-center" style="margin: 7px 0 -14px;">
      <h3 class="box-title" style="font-family: semua; ">Riwayat Pendaftaran</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="pendaftaran" class="table table-striped">
        <thead>
            <tr>
              <th>No</th>
              <th>Nomor</th>
              <th>Tanggal</th>
              <th>Pasien</th>
              <th>Dokter</th>
              <th>Poliklinik</th>
              <th>Keluhan</th>
              <th style="float: right;margin-right: 2px;">Opsi</th>
            </tr>
        </thead>
        <tbody>
    	<?php 
    		$no = 1;
    		foreach ($pendaftaran->result() as $result) { ?>
    		<tr>
              <td style="width: 5%;"><?=$no++?></td>
              <td style="width: 17%;"><?=$result->nomor_pendaftaran?></td>
              <td><?=tanggal($result->tanggal_pendaftaran)?></td>
              <td><?=$result->nama_pasien?></td>
              <td><?=$result->nama_dokter?></td>
              <td><?=$result->nama_poliklinik?></td>
              <td><?=$result->keluhan?></td>
              <td align="right">
          		<a href="<?=site_url('pendaftaran/hapus/'.$result->nomor_pendaftaran)?>" class="btn btn-sm btn-danger hapus" style="font-family: semua;"><i class="fa fa-trash"></i></a>
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
		$('#pendaftaran').DataTable({
			"columnDefs" : [
                {
                   "targets" : [0, 1, 2, 3, 4, 5, 6, 7],
                   "orderable" : false
                },
                {
                	"targets" : [0],
                	"className" : 'text-center'
                }
            ]
		})
	})
</script>
