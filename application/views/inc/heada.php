<!DOCTYPE html>
<html>
<head>
<?php
mysql_connect("localhost", "root", "");
    mysql_select_db("audit");
?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Halaman</title>

    <!-- Maniac stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate/animate.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatables/dataTables.bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
	
	 <!-- Header -->
    <header>
        <a href="" class="logo"><i class="fa fa-users"></i> <span>WELCOME</span></a>
        <nav class="navbar navbar-static-top">
            <div class="navbar-right">
                <ul class="nav navbar-nav">                     
                    <li class="dropdown widget-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span><?php echo $this->session->userdata('nama')?> <i class="fa fa-caret-down"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="footer">
                  <a data-target="#myChange" data-toggle="modal"><i class="fa-address-card"></i>Change Password</a>  
<a href="<?php echo base_url(); ?>manageaccount"><i class="fa-address-card"></i>Manage Account</a>				  
									<a data-target="#myAbout" data-toggle="modal"><i class="fa-address-card"></i>About</a>

<a data-target="#myHelp" data-toggle="modal"><i class="fa-address-card"></i>Help</a>
<a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-power-off"></i>Keluar</a>
                            </li>
                        </ul>
                    </li>



                </ul>
            </div>


 <div class="navbar-left">
                <ul class="nav navbar-nav">                     
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span>Master<i class="fa fa-caret-down"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="footer">
							<a href="<?php echo base_url(); ?>jurusan" class="list-group-item">Jurusan</a>
							<a href="<?php echo base_url(); ?>dosen" class="list-group-item">Dosen</a>
							
                                <a href="<?php echo base_url(); ?>matakuliah" class="list-group-item">Matakuliah</a>
            
			<a href="<?php echo base_url(); ?>mahasiswa" class="list-group-item">Mahasiswa</a>
			<a href="<?php echo base_url(); ?>kegiatan" class="list-group-item">Kegiatan</a>
			<a href="<?php echo base_url(); ?>prestasi" class="list-group-item">Prestasi</a>
                            </li>
                        </ul>
                    </li>



                </ul>

 <ul class="nav navbar-nav">                     
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span>Audit<i class="fa fa-caret-down"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="footer">
            <a href="<?php echo base_url(); ?>jadwalaudit" class="list-group-item">Jadwal Audit</a>
            <a href="<?php echo base_url(); ?>auditor" class="list-group-item">Auditor</a>
			<a href="<?php echo base_url(); ?>indikator" class="list-group-item">Indikator</a>
			<a href="<?php echo base_url(); ?>masteraudit" class="list-group-item">Master Audit</a>
             
			<a href="<?php echo base_url(); ?>audit" class="list-group-item">Audit</a>
			<a href="<?php echo base_url(); ?>kesimpulan" class="list-group-item">Kesimpulan dan Reomendasi Audit</a>
			<a href="<?php echo base_url(); ?>nilaiaudit" class="list-group-item">Nilai Audit</a>
			
                            </li>
                        </ul>
                    </li>



                </ul>

<ul class="nav navbar-nav">                     
                    <li class="menu">
                        <a href="#" class="btn" data-target="#myInfo" data-toggle="modal">
                            <span>Info Session <i></i></span>
                        </a>
                        
                    </li>



                </ul>
            </div>
        </nav>
    </header>
    <!-- /.header -->



    <!-- wrapper -->
    <div class="wrapper">
        <div class="leftside">
            <div class="sidebar">
                <ul class="sidebar-menu scrollable-menu" role="sidebar-menu">
                    <li class="title">Menu</li>
<li class="list-group">
					<a data-target="#myModal" data-toggle="modal"><i class="fa fa-folder"></i>Set Jadwal Audit</a>
                  </li>
				
					
					<li class="list-group">
					<a href="#list2" data-toggle="collapse"><i class="fa fa-folder"></i>Borang 1-15 <i class="fa fa-caret-down"></i></a>
					<div class="collapse" id="list2">
		 
					<a href="<?php echo base_url(); ?>borang17" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 1-7</a>
					<a href="<?php echo base_url(); ?>borang810" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 8-10</a>
					<a href="<?php echo base_url(); ?>borang1113" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 11 dan 13</a>
					<a href="<?php echo base_url(); ?>borang1214" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 12 dan 14</a>
					<a href="<?php echo base_url(); ?>borang15" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 15</a>
					</div>
            
         
					</li>
					
					<li class="list-group">
					<a href="#list3" data-toggle="collapse"><i class="fa fa-folder"></i>Borang 15-23 <i class="fa fa-caret-down"></i></a>
					<div class="collapse" id="list3">
		 
					<a href="<?php echo base_url(); ?>borang1719" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 17,18a,19</a>
					<a href="<?php echo base_url(); ?>borang18b" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 18b</a>
					<a href="<?php echo base_url(); ?>borang20" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 20</a>
					<a href="<?php echo base_url(); ?>borang21" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 21</a>
					<a href="<?php echo base_url(); ?>borang2223" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 22 - 23</a>
					</div>
            
         
					</li>
					
					<li class="list-group">
					<a href="#list4" data-toggle="collapse"><i class="fa fa-folder"></i>Borang 24 -32 <i class="fa fa-caret-down"></i></a>
					<div class="collapse" id="list4">
		 
					<a href="<?php echo base_url(); ?>borang24" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 24</a>
					<a href="<?php echo base_url(); ?>borang25" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 25</a>
					<a href="<?php echo base_url(); ?>borang2629" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 26-29</a>
					<a href="<?php echo base_url(); ?>borang30" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 30</a>
					<a href="<?php echo base_url(); ?>borang3132" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 31-32</a>
					</div>
            
         
					</li>
					
					<li class="list-group">
					<a href="#list5" data-toggle="collapse"><i class="fa fa-folder"></i>Borang 33-35 <i class="fa fa-caret-down"></i></a>
					<div class="collapse" id="list5">
		 
					<a href="<?php echo base_url(); ?>borang33" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 33</a>
					<a href="<?php echo base_url(); ?>borang34" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 34</a>
					<a href="<?php echo base_url(); ?>borang35" class="list-group-item"><i class="fa fa-plus-circle"></i> Borang 35</a>
					
					</div>
            
         
					</li>
					
					
                </ul>
            </div>
        </div>


<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
	<!-- konten modal-->
	<div class="modal-content">
		<!-- heading modal -->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Pilih jadwal Audit</h4>
		</div>
		<!-- body modal -->
		<div class="modal-body">
	<form action="<?php echo base_url(); ?>savejadwal" method="post">
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
<br>
		 <button type="submit" class="btn btn-info">Set</button>
		</div>
		
		 
</form>
		 <!-- footer modal -->
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
   </div>
</div>

<div id="myAbout" class="modal fade" role="dialog">
   <div class="modal-dialog">
	<!-- konten modal-->
	<div class="modal-content">
		<!-- heading modal -->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">About</h4>
		</div>
		<!-- body modal -->
		<div class="modal-body">
	<form action="<?php echo base_url(); ?>savejadwal" method="post">
		<center><h2> APLIKASI AUDIT BERBASIS WEB </h2>
<br><h4> Audit atau pemeriksaan dalam arti luas bermakna evaluasi terhadap suatu organisasi, sistem, proses, atau produk. Audit dilaksanakan oleh pihak yang kompeten, objektif, dan tidak memihak, yang disebut auditor.
Aplikasi ini dirancang untuk memudahkan proses auditing dengan data yang terintegrasi dan proses yang lebih mudah serta organisir data yang baik.

</h4></center>
		</div>
		
		 
</form>
		 <!-- footer modal -->
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
   </div>
</div>

<div id="myHelp" class="modal fade" role="dialog">
   <div class="modal-dialog">
	<!-- konten modal-->
	<div class="modal-content">
		<!-- heading modal -->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Help</h4>
		</div>
		<!-- body modal -->
		<div class="modal-body">
	<form action="<?php echo base_url(); ?>savejadwal" method="post">
		<center><h4>Team:
<br> Desainer Database : Moch Farddan
<br> Desainer Sistem : Dhanil Hidayat
<br> Database Administrator : Adhyaksa Pradesta
<br> UI & Programming : M. Alif Abhiesa Al kautsar
<br></h4>
<br><h3><b> Contact us : unixman@linux.org
<br> Official : www.noobsgnu.com</h3></b></center>
		</div>
		
		 
</form>
		 <!-- footer modal -->
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
   </div>
</div>

<?php

$q1 = mysql_query("select nama_jrsn from tbl_jrsn where id_jrsn = '".$this->session->userdata('id_jrsn')."'");

?>

<div id="myInfo" class="modal fade" role="dialog">
   <div class="modal-dialog">
	<!-- konten modal-->
	<div class="modal-content">
		<!-- heading modal -->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">INFO SESSION</h4>
		</div>
		<!-- body modal -->
		<div class="modal-body">


	<center><h5><b>ANDA SEDANG BERADA DI SESI AUDIT
	<br>JURUSAN : <?php error_reporting(0); $res = mysql_result($q1, 0); echo $res; ?>
	<br>JADWAL : <?php echo $this->session->userdata('id_jadwal');?>
</center></h5></b>
		 <!-- footer modal -->
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
   </div>
</div>
</div>


<div id="myChange" class="modal fade" role="dialog">
   <div class="modal-dialog">
	<!-- konten modal-->
	<div class="modal-content">
		<!-- heading modal -->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Ubah Password</h4>
		</div>
		<!-- body modal -->
		<div class="modal-body">
	 <form role="form" id="" action="<?php echo base_url(); ?>manageaccount/changepass" method="post">
                                <input type="hidden" value ="<?php echo $this->session->userdata('admin'); ?>" name="id_user">
								
								<div class="form-group">
                                    <label>Username</label>
                                    <input name="nama_user" value="<?php echo $this->session->userdata('nama'); ?>" type="text" class="form-control" readonly>
                                  </div>
								  
								 <div class="form-group">
                                    <label>Password</label>
                                    <input name="pass_user" type="text" class="form-control">
                                  </div>
                                  
                                  <button type="submit" class="btn btn-info">Simpan</button>
                                </form>
		 <!-- footer modal -->
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
   </div>
</div>	</div>	