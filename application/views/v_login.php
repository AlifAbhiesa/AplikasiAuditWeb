<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Halaman Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate/animate.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />

  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
      
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <!-- <span><?php echo $id_user; ?></span> -->
       
		 <center><h3><b>SELAMAT DATANG DI APLIKASI AUDIT JURUSAN
		 <br>INSTITUT TEKNOLOGI NASIONAL BANDUNG
		 <div class="col-md-4 col-md-offset-4" class="span3">
		 <br>
		 <br>
		 <br>
		 <br>
		  
		 <div class="box">
		 <div class="box-title">
		 
                                <h3><center>LOGIN</center></h3>
                            </div>
		 <div class="box-body">

        <form action="<?php echo base_url(); ?>login" id="form-login" method="post" accept-charset="utf-8">
          <div class="form-group">
            <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Nama" required/>
            <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" value="" name="pass_user" id="pass_user" placeholder="Password" required/>
            <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
          </div>
          <div class="row">
            
            <div class="col-xs-4">
              <input type="submit" style="width:140px" name="login" value="Login" id="submit-login" class="btn btn-primary btn-block btn-flat" />
            </div><!-- /.col -->
			</div>
			</div>
			</div>
          </div>

        </form>
		
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    </body>
    <!-- jQuery 2.1.3 -->

  
</html>