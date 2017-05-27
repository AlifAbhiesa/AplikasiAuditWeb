<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>asset/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>asset/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Silahkan Masuk</div>
            <p class="login-box-msg" class="uppercase"><?php echo $info; ?></p>
            <form action="<?php echo base_url();?>login" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="user" class="form-control" placeholder="User"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="Password"/>
                    </div> 
                    <input type="submit" class="btn bg-olive btn-block" value="masuk" style="width:100px"></input>           
                </div>

            </form>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>/asset/js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>