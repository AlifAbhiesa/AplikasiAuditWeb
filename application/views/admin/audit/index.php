<?php $this->load->view('inc/heada'); ?>
<body class="fixed">
    
	
        <div class="rightside">
            <div class="page-head">
                <h1>Data Audit</h1>
            </div>

            <div class="content">
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-12">
					<a href="<?php echo base_url(); ?>audit/inputaudit" class="btn btn-info no-radius dropdown-toggle">Tambah Data <i class="fa fa-plus"></i></a>
                   
                        <div class="box">
                            <div class="box-title">
                                <h3>Data Audit</h3>
                            </div><!-- /.box-title -->
                            <div class="box-body">
                               <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Target Genap</th>
                                        <th>Pelaksanaan Kegiatan Tindak Lanjut</th>
                                        <th>Permasalahan Yang Dihadapi</th>
                                        <th>Rencana  Kegiatan Tindak Lanjut</th>
										
										<th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; foreach($audit as $row) { $no++; ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['target_genap']; ?></td>
                                        <td><?php echo $row['pelaksanaan_kegiatan']; ?></td>
                                        <td><?php echo $row['permasalahan']; ?></td>
                                        <td><?php echo $row['rencana_kegiatan_audit']; ?></td>
										
                                      
										<td>
                                            <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>audit/editaudit/<?php echo $row['id_master_audit']; ?>" data-toggle="tooltip" data-placement="top" title="EDIT">
                                                <i class="fa fa-edit "></i>  
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>audit/hapusaudit/<?php echo $row['id_master_audit']; ?>" onclick="return confirm('Hapus')" data-toggle="tooltip" data-placement="top" title="HAPUS">
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
<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
	<!-- konten modal-->
	<div class="modal-content">
		<!-- heading modal -->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Pilih Periode Audit</h4>
		</div>
		<!-- body modal -->
		<div class="modal-body">
	<form action="<?php echo base_url(); ?>audit/inputaudit" method="post">
		<label>Jadwal Audit</label>
                                     <select class="form-control" name="id_jadwal">
    <option>---- JADWAL ----</option>
    <?php
    
    $sql = mysql_query("SELECT distinct id_jadwal FROM tbl_jadwal ORDER BY id_jadwal ASC");
    if(mysql_num_rows($sql) != 0){
        while($data = mysql_fetch_assoc($sql)){
            echo '<option value="'.$data['id_jadwal'].'">'.$data['id_jadwal'].'</option>';
        }
    }
    ?>
</select>
		
		</div>
		 <button type="submit" class="btn btn-info">Tambah</button>
		 
</form>
		 <!-- footer modal -->
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
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