
<section class="content-header">
  <h1 style="font-family: semua;">
    Stok
    <small>Masuk</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Stock</li>
    <li class="active">Masuk</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">

        <div class="cantdelete" data-cantdelete="<?=$this->session->flashdata('cantdelete')?>"></div>
        <div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
        <div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua; font-size: 22px;">Data Stok Masuk</h3>
          <a href="<?=site_url('stok/masuk/tambah')?>" class="btn btn-sm btn-flat btn-primary" style="float: right;"><i class="fa fa-plus-circle"></i> Tambah</a>
          <a href="" class="btn btn-sm btn-flat btn-default" style="float: right; margin: 0 4px;"><i class="fa fa-refresh"></i></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="masuk" class="table table-striped ">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Obat</th>
                  <th>Qty</th>
                  <th>Keterangan</th>
                  <th>User</th>
                  <th style="float: right; margin-right: 3px;">Opsi</th>
                </tr>
            </thead>
            <tbody>
        	<?php 
        		$no = 1;
        		foreach ($row->result() as $result) { ?>
        		<tr>
                  <td style="width: 5%;"><?=$no++?></td>
                  <td><?=tanggal($result->tanggal)?></td>
                  <td><?=$result->nama_obat?></td>
                  <td><?=$result->qty?></td>
                  <td><?=$result->keterangan?></td>
                  <td><?=$result->nama?></td>
                  <td align="right">
              		<a href="<?=site_url('stok/masuk/hapus/'.$result->id.'/'.$result->kode_obat)?>" class="btn btn-sm btn-danger hapus" style="font-family: semua;"><i class="fa fa-trash"></i></a>
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
		$('#masuk').DataTable({
			"columnDefs" : [
                {
                   "targets" : [0, 1, 2, 3, 4, 5, 6],
                   "orderable" : false
                },
                {
                   "targets" : [0],
                   "className" : 'text-center'
                },
                {
                   "targets" : [1, 2, 3, 4, 5],
                   "className" : 'text-left'
                }
            ]
		})
	})
</script>
