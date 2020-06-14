<section class="content-header">
  <h1 style="font-family: semua;">
    Pengguna
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Pengguna</li>
    <li class="active">Tambah</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box" style="padding-bottom: 30px;">
        <div class="box-header">
          <h3 class="box-title" style="float: left; font-family: semua;">Add User</h3>
          <a href="<?=site_url('user')?>" class="btn btn-sm btn-flat btn-warning" style="float: right;"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="col-md-4 col-md-offset-4">
        		<form action="" method="post">
                <div class="form-group <?=form_error('namalengkap') ? 'has-error' : null;?>">
                  <label for="namalengkap">Nama Lengkap</label>
                  <input type="text" class="form-control" value="<?=set_value('namalengkap')?>" name="namalengkap" id="namalengkap" >
                  <span class="help-block"><?=form_error('namalengkap')?></span>
                </div>
                <div class="form-group <?=form_error('telepon') ? 'has-error' : null;?>">
                  <label for="telepon">Telepon</label>
                  <input type="number" class="form-control" value="<?=set_value('telepon')?>" name="telepon" id="telepon" >
                  <span class="help-block"><?=form_error('telepon')?></span>
                </div>
                <div class="form-group <?=form_error('level') ? 'has-error' : null;?>">
	                <label for="level">Level</label>
	                <select class="form-control select2" id="level" name="level">
                    <option disabled selected>- pilih -</option>
                    <option value="admin" <?=set_value('level') == 'admin' ? 'selected' : null ?>>Administrator</option>
                    <option value="receipt" <?=set_value('level') == 'receipt' ? 'selected' : null ?>>Receiptionist</option>
                    <option value="receipt" <?=set_value('level') == 'apotek' ? 'selected' : null ?>>Apoteker</option>
	                </select>
                  <span class="help-block"><?=form_error('level')?></span>
		            </div>
                <div class="form-group <?=form_error('username') ? 'has-error' : null;?>">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" value="<?=set_value('username')?>" name="username" id="username" >
                  <span class="help-block"><?=form_error('username')?></span>
                </div>
                <div class="form-group <?=form_error('password') ? 'has-error' : null;?>">
                  <label for="password">Password</label>
                  <input type="password" value="<?=set_value('password')?>" class="form-control" name="password" id="password">
                  <span class="help-block"><?=form_error('password')?></span>
                </div>
                <div class="form-group <?=form_error('passwordconf') ? 'has-error' : null;?>">
                  <label for="passwordconf">Confirm Password</label>
                  <input type="password" value="<?=set_value('passwordconf')?>" class="form-control" name="passwordconf" id="passwordconf">
                  <span class="help-block"><?=form_error('passwordconf')?></span>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="show"> Show password
                  </label>
                </div>
              	<button type="submit" name="add" class="btn btn-sm btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
              	<button type="reset" class="btn btn-sm btn-default"><i class="fa fa-refresh"></i> Batal</button>
	            </form>
        	</div>
     
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
</section>
<script type="text/javascript">
    $(document).ready(function(){       
        $('#show').click(function(){
            if($(this).is(':checked')){
                $('#password').attr('type','text');
                $('#passwordconf').attr('type','text');
            }else{
                $('#password').attr('type','password');
                $('#passwordconf').attr('type','password');
            }
        });
    });
</script>