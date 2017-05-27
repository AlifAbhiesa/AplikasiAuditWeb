<?php $this->load->view('inc/heada'); ?>
<body class="fixed">
    
	
        <div class="rightside">
            <div class="page-head">
                <h1>Data Borang 17 - Kesesuaian RKPSS dalam BAP, Pengembalian Tugas, Solusi UTS dan UAS, Pengembalian Berkas  Ujian, Pemasukan Nilai Ujian</h1>
            </div>

            <div class="content">
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-12">
					 <a href="<?php echo base_url(); ?>borang17/inputbrng17" class="btn btn-info no-radius dropdown-toggle">Tambah Data <i class="fa fa-plus"></i></a>
                    
                        <div class="box">
                            <div class="box-title">
                                <h3>Data Borang 17</h3>
							<?php echo $this->session->userdata('id_jadwal'); ?>
                            </div><!-- /.box-title -->
                            <div class="box-body">
                               <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>kelas</th>
                                        <th>RKPSS</th>
                                        <th>Kembali Tugas Kuis</th>
                                        <th>Solusi UTS</th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; foreach($brng17 as $row) { $no++; ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['nama_mtk']; ?></td>
                                        <td><?php echo $row['kelas']; ?></td>
                                        <td><?php echo $row['kmbl_tgs_kuis']; ?></td>
                                        <td><?php echo $row['sol_uts']; ?></td>
										<td>
                                            <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>borang17/editbrng17/<?php echo $row['id_brng17']; ?>" data-toggle="tooltip" data-placement="top" title="EDIT">
                                                <i class="fa fa-edit "></i>  
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>borang17/hapusbrng17/<?php echo $row['id_brng17']; ?>" onclick="return confirm('Hapus')" data-toggle="tooltip" data-placement="top" title="HAPUS">
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