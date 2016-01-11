<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Materi Pelajaran</h4>
    </div>
    
</div>

<?php
$db = mysqli_connect("localhost", "root", "", "db_elearning");
if(@$_GET['action'] == '') { ?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-default">
                <div class="panel-heading">Data Materi Pelajaran</div>
                
                <!--<div class="panel-heading"><a href="?page=materi" class="btn btn-primary">Kembali</a>-->
                <div class="panel-body">
                     
	                <div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover">
	                        <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Mata Pelajaran</th>
	                                <th>Aksi</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        <?php
	                        $no = 1;
	                        $sql_materi = mysqli_query($db, "SELECT * FROM tb_materi") or die ($db->error);
	                        while($data_materi = mysqli_fetch_array($sql_materi)) { ?>
	                            <tr>
	                                <td width="40px" align="center"><?php echo $no++; ?></td>
	                                <td><?php echo $data_materi['judul']; ?></td>
	                                <td width="200px" align="center">
	                                	<a href="?page=materi&action=lihatmateri&id_materi=<?php echo $data_materi['judul']; ?>" class="btn btn-primary btn-xs">Lihat Materi</a>
	                                </td>
	                            </tr>
	                        	<?php
	                        } ?>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
<?php
} else if(@$_GET['action'] == 'lihatmateri') { ?>
	<div class="row">
	    <div class="col-md-12">
             <a href="?page=materi" class="btn btn-primary">Kembali</a>
	        <div class="panel panel-default">
                
	            <div class="panel-heading">Lihat Data Materi Pelajaran</div>
	            <div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
						    <thead>
                                <?php
                                 $sql_materi = mysqli_query($db, "SELECT * FROM tb_materi") or die($db->error);
                                while($data_materi = mysqli_fetch_array($sql_materi)) { ?>
						          
                                    
						            <td><?php echo $data_materi['materi']; ?></td>
						            <!--<th>Judul Materi</th>
						            <th>Nama File</th>
						            <th>Tanggal Posting</th>
						            <th>Pembuat</th>
						            <th>Dilihat</th>
						            <th>Opsi</th>-->
						    </thead><?php } ?>
						    <!--<tbody id="materi">
						    <?php
						    $sql_siswa = mysqli_query($db, "SELECT * FROM tb_siswa WHERE id_siswa = '$_SESSION[siswa]'") or die($db->error);
						    $data_siswa = mysqli_fetch_array($sql_siswa);
						    $no = 1;
						    $sql_materi = mysqli_query($db, "SELECT * FROM tb_materi WHERE id_materi = '$_GET[id_materi]' AND id_kelas = '$data_siswa[id_kelas]'") or die ($db->error);
						    if(mysqli_num_rows($sql_materi) > 0) {
							    while($data_materi = mysqli_fetch_array($sql_materi)) { ?>
							        <tr>
							            <td width="40px" align="center"><?php echo $no++; ?></td>
							            <td id="judul"><?php echo $data_materi['judul']; ?></td>
							            <td><?php echo $data_materi['nama_file']; ?></td>
							            <td><?php echo $data_materi['tgl_posting']; ?></td>
							            <td>
							            	<?php
											if($data_materi['pembuat'] == 'admin') {
												echo "Admin";
											} else {
												$sql_pengajar = mysqli_query($db, "SELECT * FROM tb_pengajar WHERE id_pengajar = '$data_materi[pembuat]'") or die($db->error);
												$data_pengajar = mysqli_fetch_array($sql_pengajar);
												echo $data_pengajar['nama_lengkap'];
											} ?>
							            </td>
							            <td><?php echo $data_materi['hits']." kali"; ?></td>
							            <td align="center">
							            	<a href="./admin/file_materi/<?php echo $data_materi['nama_file']; ?>" id="klik" isi="<?php echo $data_materi['id_materi']; ?>" class="btn btn-info btn-xs">Lihat / Download</a>
							            </td>
							        </tr>
							    	<?php
							    } 
							    } else {
							    	echo '<tr><td colspan="7" align="center">Data tidak ditemukan</td></tr>';
						    	} ?>
						    </tbody>-->
						</table>
					</div>
                    <script type="text/javascript">
                    $("#materi").on("click", "#klik", function() {
                    	var id = $(this).attr("isi");
						$.ajax({
							url : 'inc/prosesklik.php',
							type : 'POST',
							data : 'id='+id,
							success : function(msg) {
								window.location='?page=materi&action=lihatmateri&id_mapel=<?php echo @$_GET["id_mapel"]; ?>';
							}
						});
                    });
                    </script>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>