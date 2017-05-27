<?php $this->load->view('inc/heada'); ?>
<body class="fixed">
    
	
        <div class="rightside">
            <div class="page-head">
                <h1>Data Borang 35 - Rasio Keikutsertaan Dosen dalam Organisasi Profesi/Keilmuan Terhadap Jumlah Dosen Tetap</h1>
            </div>

            <div class="content">
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-12">
					 <a href="<?php echo base_url(); ?>borang35/inputbrng35" class="btn btn-info no-radius dropdown-toggle">Tambah Data <i class="fa fa-plus"></i></a>
                        <div class="box">
                            <div class="box-title">
                                <h3>Data Borang 35</h3>
                            </div><!-- /.box-title -->
                            <div class="box-body">
                               <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Dosen</th>
                                        <th>Nama Organisasi</th>
                                        <th>Kurun Waktu</th>
                                        <th>Tingkat Lokal</th>
										<th>Tingkat Nasional</th>
										<th>Tingkat Internasinal</th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; foreach($brng35 as $row) { $no++; ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['nama_dsn']; ?></td>
                                        <td><?php echo $row['nama_org']; ?></td>
                                        <td><?php echo $row['kurun_wkt']; ?></td>
                                        <td><?php echo $row['tk_lokal']; ?></td>
                                        <td><?php echo $row['tk_nasional']; ?></td>
                                        <td><?php echo $row['tk_internasional']; ?></td>
										<td>
                                            <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>borang35/editbrng35/<?php echo $row['id_brng35']; ?>" data-toggle="tooltip" data-placement="top" title="EDIT">
                                                <i class="fa fa-edit "></i>  
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>borang35/hapusbrng35/<?php echo $row['id_brng35']; ?>" onclick="return confirm('Hapus')" data-toggle="tooltip" data-placement="top" title="HAPUS">
                                                <i class="fa fa-trash-o "></i> 
                                            </a>
                                        </td>

                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            <!-- Main row -->
               
        </div>
    </div><!-- /.wrapper -->
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