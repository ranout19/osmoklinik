
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
  <div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
	<div class="box">
    <div class="box-header" style="margin-bottom: -17px;">
      <h3 class="box-title" style="float: left; font-family: semua;">Data Pendaftaran</h3><br>
      <small><?=$detail?></small>
      <form class="pull-right" action="<?=site_url('report/pendaftaran')?>" method="post">
        <div class="form-group pull-left" style="margin-right: 4px;">
          <div class="input-group">
            <button type="button" class="btn btn-sm btn-default pull-right" id="daterange-btn">
              <span>Pilih Tanggal </span>
              <i class="fa fa-calendar"></i>
              <input type="hidden" name="awalin" id="awal">
              <input type="hidden" name="akhirin" id="akhir">
            </button>
          </div>
        </div>
        <div class="form-group pull-right">
            <button type="submit" name="cari" class="btn btn-sm btn-info"><i class="fa fa-search"></i></button>
        </div>
      </form>
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
    $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Hari ini'       : [moment(), moment()],
        'Kemarin'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        '7 hari lalu' : [moment().subtract(6, 'days'), moment()],
        'Bulan ini'  : [moment().startOf('month'), moment().endOf('month')],
        'Bulan lalu'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('D, MMMM YYYY') + ' - ' + end.format('D, MMMM YYYY'))
        $('#awal').val(start.format('Y-M-D'))
        $('#akhir').val(end.format('Y-M-D'))
      }
    ),
		$('#pendaftaran').DataTable({
			"columnDefs" : [
                {
                   "targets" : [0, 1, 2, 3, 4, 5, 6],
                   "orderable" : false
                }
            ]
		})
	})
</script>
