
<section class="content-header">
  <h1 style="font-family: semua;">
    Poliklinik
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Poliklinik</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">

        <div class="cantdelete" data-cantdelete="<?=$this->session->flashdata('cantdelete')?>"></div>
        <div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
        <div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua;">Data Poliklinik</h3>
          <a href="<?=site_url('poliklinik/tambah')?>" class="btn btn-sm btn-flat btn-primary" style="float: right;"><i class="fa fa-plus-circle"></i> Tambah</a>
          <a href="" class="btn btn-sm btn-flat btn-default" style="float: right; margin: 0 4px;"><i class="fa fa-refresh"></i></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="poliklinik" class="table table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th style="float: right; margin-right: 20px;">Opsi</th>
                </tr>
            </thead>
            <tbody>
        	<?php 
        		$no = 1;
        		foreach ($poliklinik->result() as $result) { ?>
        		<tr>
                  <td style="width: 5%;"><?=$no++?></td>
                  <td style="width: 20%;"><?=$result->kode_poliklinik?></td>
                  <td><?=$result->nama_poliklinik?></td>
                  <td align="right">
              		<a href="<?=site_url('poliklinik/edit/'.$result->kode_poliklinik)?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
              		<a href="<?=site_url('poliklinik/hapus/'.$result->kode_poliklinik)?>" class="btn btn-sm btn-danger hapus" style="font-family: semua;"><i class="fa fa-trash"></i></a>
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
		$('#poliklinik').DataTable({
			"columnDefs" : [
                {
                   "targets" : [0, 1, 2, 3],
                   "orderable" : false
                },
                {
                   "targets" : [0],
                   "className" : 'text-center'
                },
                {
                   "targets" : [1, 2],
                   "className" : 'text-left'
                }
            ]
		})
	})
</script>
