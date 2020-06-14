
<section class="content-header">
  <h1 style="font-family: semua;">
    Dokter
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dokter</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">

        <div class="cantdelete" data-cantdelete="<?=$this->session->flashdata('cantdelete')?>"></div>
        <div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
        <div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua;">Data Dokter</h3>
          <a href="<?=site_url('dokter/tambah')?>" class="btn btn-sm btn-flat btn-primary" style="float: right;"><i class="fa fa-plus-circle"></i> Tambah</a>
          <a href="" class="btn btn-sm btn-flat btn-default" style="float: right; margin: 0 4px;"><i class="fa fa-refresh"></i></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="dokter" class="table table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Spesialis</th>
                  <th>Poliklinik</th>
                  <th>Tarif</th>
                  <th>Telepon</th>
                  <th>Alamat</th>
                  <th style="float: right; margin-right: 20px;">Opsi</th>
                </tr>
            </thead>
            <tbody>
        	<?php 
        		$no = 1;
        		foreach ($dokter->result() as $result) { ?>
        		<tr>
                  <td style="width: 5%;"><?=$no++?></td>
                  <td><?=$result->kode_dokter?></td>
                  <td><?=$result->nama_dokter?></td>
                  <td><?=$result->spesialis_dokter?></td>
                  <td><?=$result->nama_poliklinik?></td>
                  <td><?=idr($result->tarif_dokter)?></td>
                  <td><?=$result->telepon_dokter?></td>
                  <td><?=$result->alamat_dokter?></td>
                  <td align="right">
              		<a href="<?=site_url('dokter/edit/'.$result->kode_dokter)?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
              		<a href="<?=site_url('dokter/hapus/'.$result->kode_dokter)?>" class="btn btn-sm btn-danger hapus" style="font-family: semua;"><i class="fa fa-trash"></i></a>
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
		$('#dokter').DataTable({
			"columnDefs" : [
                {
                   "targets" : [0, 1, 2, 3, 4, 5, 6, 7, 8],
                   "orderable" : false
                },
                {
                   "targets" : [0],
                   "className" : 'text-center'
                },
                {
                   "targets" : [1, 2, 3, 4, 5, 6, 7],
                   "className" : 'text-left'
                }
            ]
		})
	})
</script>
