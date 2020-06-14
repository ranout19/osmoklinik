
<section class="content-header">
  <h1 style="font-family: semua;">
    Resep Obat
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Resep Obat</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="cantdelete" data-cantdelete="<?=$this->session->flashdata('cantdelete')?>"></div>
    <div class="flashdatawarning" data-flashdata="<?=$this->session->flashdata('warning')?>"></div>
    <div class="flashdata" data-flashdata="<?=$this->session->flashdata('success')?>"></div>
    <div class="box-header text-center" style="margin: 7px 0 -14px;">
      <h3 class="box-title" style="font-family: semua; ">Riwayat Resep Obat</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="resep" class="table table-striped">
        <thead>
            <tr>
              <th>No</th>
              <th>Nomor</th>
              <th>Tanggal</th>
              <th>Pasien</th>
              <th>Dokter</th>
              <th>Resep Obat</th>
              <th style="float: right; margin-right: 3px;">Proses</th>
            </tr>
        </thead>
        <tbody>
      <?php 
        $no = 1;
        foreach ($diagnosa->result() as $result) { ?>
        <tr>
              <td style="width: 5%;"><?=$no++?></td>
              <td><?=$result->nomor_resep?></td>
              <td><?=tanggal($result->tanggal_resep)?></td>
              <td><?=$result->nama_pasien?></td>
              <td><?=$result->nama_dokter?></td>
              <td style="line-height: 24px;">
                <?php 
                  $query = $this->db->query("SELECT * FROM detail INNER JOIN obat ON obat.kode_obat = detail.kode_obat WHERE nomor_resep = '$result->nomor_resep'"); 
                  foreach ($query->result() as $resep) { 
                    echo $resep->nama_obat.' '.$resep->dosis.',  jumlah '.$resep->jumlahObt.'<br>';
                  }
                ?>
              </td>
              <td align="right" style="width: 41px;">
                <?php if ($result->status == 0){ ?>
                  <a href="<?=site_url('pembayaran/resep/'.$result->nomor_resep)?>" class="btn btn-sm btn-success" style="font-family: semua;"><i class="fa fa-chevron-right"></i></a>
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
    $('#resep').DataTable({
      "columnDefs" : [
                {
                   "targets" : [0, 1, 2, 3, 4, 5, 6],
                   "orderable" : false
                },
                {
                   "targets" : [0, 6],
                   "className" : 'text-center'
                }
            ]
    })
  })
</script>
