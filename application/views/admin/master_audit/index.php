<?php $this->load->view('inc/heada'); ?>
<body class="fixed">
    
	
        <div class="rightside">
            <div class="page-head">
                <h1>Data Master Audit</h1>
            </div>

            <div class="content">
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-12">
					 <a href="<?php echo base_url(); ?>masteraudit/inputmaster_audit" class="btn btn-info no-radius dropdown-toggle">Tambah Data <i class="fa fa-plus"></i></a>
                   
                        <div class="box">
                            <div class="box-title">
                                <h3>Data Master Audit</h3>
                            </div><!-- /.box-title -->
                            <div class="box-body">
                               <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
<th>Kode Indikator</th>
                                        <th>Baseline (Hasil Genap)</th>
                                        <th>Target Genap</th>
                                        <th>Capaian Genap</th>
                                        <th>Rencana  Kegiatan Tindak Lanjut</th>
										<th> Periode </th>
										<th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; foreach($master_audit as $row) { $no++; ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
 <td><?php echo $row['kode_indikator']; ?></td>
                                        <td><?php echo $row['hasil_genap']; ?></td>
                                        <td><?php echo $row['target_genap']; ?></td>
                                        <td><?php echo $row['capaian_genap']; ?></td>
                                        <td><?php echo $row['rencana_kegiatan']; ?></td>
                                        <td><?php echo $row['id_jadwal']; ?></td>
                                        
										<td>
                                            <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>masteraudit/editmaster_audit/<?php echo $row['id_master']; ?>" data-toggle="tooltip" data-placement="top" title="EDIT">
                                                <i class="fa fa-edit "></i>  
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>masteraudit/hapusmaster_audit/<?php echo $row['id_master']; ?>" onclick="return confirm('Hapus')" data-toggle="tooltip" data-placement="top" title="HAPUS">
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