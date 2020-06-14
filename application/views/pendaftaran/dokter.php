
<section class="content-header">
  <h1 style="font-family: semua;">
    Pasien
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Pasien</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">

        <div class="cantdelete" data-cantdelete="<?=$this->session->flashdata('cantdelete')?>"></div>
        <div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
        <div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua;">Data Pasien</h3>
          <a href="" class="btn btn-sm btn-flat btn-default" style="float: right; margin: 0 4px;"><i class="fa fa-refresh"></i> Refresh</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="pasien" class="table table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Gender</th>
                  <th>Umur</th>
                  <th>Keluhan</th>
                  <th style="float: right; margin-right: 3px;">Proses</th>
                </tr>
            </thead>
            <tbody>
        	<?php 
        		$no = 1;
        		foreach ($pasien->result() as $result) { ?>
        		<tr>
                  <td style="width: 5%;"><?=$no++?></td>
                  <td><?=$result->kode_pasien?></td>
                  <td><?=$result->nama_pasien?></td>
                  <td>
                  	<?php if($result->gender_pasien == 'P'){
                            echo "Perempuan";
                        }else if ($result->gender_pasien == 'L') {
                            echo "Laki-laki";
                        }
                    ?>
                  </td>
                  <td><?=$result->umur_pasien?></td>
                  <td><?=$result->keluhan?></td>
                  <td align="right" style="width: 41px;">
                  <?php if ($result->status == 0){ ?>
              		  <a href="<?=site_url('pasien/diagnosa/'.$result->nomor_pendaftaran)?>" class="btn btn-sm btn-success" style="font-family: semua;"><i class="fa fa-chevron-right"></i></a>
                  <?php }else{ ?>
                    <span class="badge badge-sm" style="font-family: semua; background-color: #00c0ef;"><i class="fa fa-check"></i></span>
                  <?php } ?>
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
		$('#pasien').DataTable({
			"columnDefs" : [
                {
                   "targets" : [0, 1, 2, 3, 4, 5, 6],
                   "orderable" : false
                },
                {
                   "targets" : [0, 6],
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
