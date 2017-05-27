<?php $this->load->view('inc/heada'); ?>
<body class="fixed">
    
	
        <div class="rightside">
            <div class="page-head">
                <h1>Data Borang 26-29 Publikasi (Lokal/Nasional, Internasional), Penelitian, dan Hibah Penelitan Dosen Tetap</h1>
            </div>

            <div class="content">
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-12">
					 <a href="<?php echo base_url(); ?>borang2629/inputbrng2629" class="btn btn-info no-radius dropdown-toggle">Tambah Data <i class="fa fa-plus"></i></a>
                        <div class="box">
                            <div class="box-title">
                                <h3>Data Borang 2629</h3>
                            </div><!-- /.box-title -->
                            <div class="box-body">
                               <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Judul</th>
                                        <th>Nama Dosen</th>
                                        <th>Dihasilkan/Dipublikasikan pada</th>
                                        <th>Bulan & Tahun Penyajian</th>
										
										<th>Penelitian </th>
										<th>Hibah Penelitian  </th>
										<th>Dana Pribadi (Rp.) </th>
										<th>Dana Lokal/Nasional (Rp.)</th>
										<th>Dana Internasional (Rp.) </th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; foreach($brng2629 as $row) { $no++; ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['judul']; ?></td>
                                        <td><?php echo $row['nama_dsn']; ?></td>
                                        <td><?php echo $row['publikasi']; ?></td>
                                        <td><?php echo $row['bln_thn'] ?></td>
                                        
										<td><?php echo $row['penelitian']; ?></td>
										<td><?php echo $row['hibah_penelitian']; ?></td>
										<td><?php echo $row['dana_pribadi']; ?></td>
										<td><?php echo $row['dana_lokal']; ?></td>
										<td><?php echo $row['dana_internasional']; ?></td>
										<td>
                                            <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>borang2629/editbrng2629/<?php echo $row['id_brng2629']; ?>" data-toggle="tooltip" data-placement="top" title="EDIT">
                                                <i class="fa fa-edit "></i>  
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>borang2629/hapusbrng2629/<?php echo $row['id_brng2629']; ?>" onclick="return confirm('Hapus')" data-toggle="tooltip" data-placement="top" title="HAPUS">
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