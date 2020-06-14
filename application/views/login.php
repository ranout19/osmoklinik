
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>OSMO Klinik | Log in</title>
  <link rel="icon" href="<?=base_url()?>/assets/img/icon.png" type="image/x-icon" />
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/iCheck/square/blue.css">
  <script src="<?=base_url()?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?=base_url()?>/assets/bower_components/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <style type="text/css">
    @font-face{
        font-family: semua;
        src:url(<?=base_url()?>assets/font/Montserrat-Regular.ttf);
    }
    *{
      font-family: semua;
      font-weight: 100;
    }
    .login-box-body{
      padding: 30px !important;
    }
    .swal2-popup{
      font-family: semua !important;
      font-size: 1.6rem !important;
    }
  </style>
</head>
<body class="hold-transition login-page" style="margin-top: 140px;">
<div class="login-box" >
  <!-- /.login-logo -->
  <div class="loginfail" data-loginfail="<?=$this->session->flashdata('loginfail')?>"></div>
  <div class="login-box-body">
    <div class="login-logo">
      <img src="<?=base_url()?>/assets/img/logo.png" style="width: 140px;">
    </div>
    <form action="<?=site_url('auth/process')?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" name="login" class="btn btn-danger btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script type="text/javascript">
  const loginfail = $('.loginfail').data('loginfail');
  if (loginfail) {
    Swal.fire({
        type: 'error',
        title: 'Gagal!',
        text: loginfail,
        showConfirmButton: false,
        timer: 2000
      });
  }
</script>
<script src="<?=base_url()?>/assets/bower_components/sweetalert2/sweetalert.js"></script>
<script src="<?=base_url()?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url()?>/assets/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
