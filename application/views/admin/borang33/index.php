<?php $this->load->view('inc/heada'); ?>
<body class="fixed">
    
	
        <div class="rightside">
            <div class="page-head">
                <h1>Data Borang 33 Jumlah Buku Ajar/Diktat/Buku Populer Yang Diterbitkan</h1>
            </div>

            <div class="content">
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-12">
					 <a href="<?php echo base_url(); ?>borang33/inputbrng33" class="btn btn-info no-radius dropdown-toggle">Tambah Data <i class="fa fa-plus"></i></a>
                        <div class="box">
                            <div class="box-title">
                                <h3>Data Borang 33</h3>
                            </div><!-- /.box-title -->
                            <div class="box-body">
                               <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Instansi</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>Awal Kerjasama</th>
                                        <th>Akhir Kerjasama</th>
										<th>Manfaat Yang Telah Diperoleh</th>
										<th>Dalam Negeri</th>
										<th>Luar Negri</th>
										
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; foreach($brng33 as $row) { $no++; ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['nama_instansi']; ?></td>
										<td><?php echo $row['jenis_kegiatan']; ?></td>
                                        <td><?php echo $row['awal_kerjasama']; ?></td>
                                        <td><?php echo $row['akhir_kerjasama']; ?></td>
                                        <td><?php echo $row['manfaat']; ?></td>
                                        <td><?php echo $row['dalam_negri']; ?></td>
										<td><?php echo $row['luar_negri']; ?></td>
										<td>
                                            <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>borang33/editbrng33/<?php echo $row['id_brng33']; ?>" data-toggle="tooltip" data-placement="top" title="EDIT">
                                                <i class="fa fa-edit "></i>  
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>borang33/hapusbrng33/<?php echo $row['id_brng33']; ?>" onclick="return confirm('Hapus')" data-toggle="tooltip" data-placement="top" title="HAPUS">
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