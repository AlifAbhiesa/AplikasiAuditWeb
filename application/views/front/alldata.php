<?php $this->load->view('inc/heada'); ?>
<body class="fixed">
    <!-- Header -->
    <header>
        <a href="" class="logo"><i class="fa fa-users"></i> <span>WELCOME</span></a>
        <nav class="navbar navbar-static-top">
            <div class="navbar-right">

            </div>
        </nav>
    </header>
    <!-- /.header -->

    <!-- wrapper -->
    <div class="wrapper">
        <div class="leftside">
            <div class="sidebar">
                <ul class="sidebar-menu">
                    <li class="title">App Kecamatannn</li>

                    <li class="active">
                        <a href="<?php echo base_url(); ?>front">
                            <i class="fa fa-folder"></i> <span>Data</span>
                        </a>
                    </li>
                    <li class="">
                       <a href="<?php echo base_url(); ?>login"><i class="fa fa-power-off"></i>Login</a>
                    </li>
                </ul>
            </div>
        </div>
        
<!-- Javascript -->
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery-ui-1.10.4.min.js" type="text/javascript"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap/bootstrap.min.js" type="text/javascript"></script>

<!-- Interface -->
<script src="<?php echo base_url(); ?>assets/js/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js" type="text/javascript"></script>

<!-- Forms -->
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#example1").dataTable();
    $("#example3").dataTable();
    $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
    });
});
</script>
</body>
</html>