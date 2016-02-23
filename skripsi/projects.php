<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Lora:400,700|Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
  	
	<title>3D Bold Navigation | CodyHouse</title>
</head>
<body>
	<a href="#cd-nav" class="cd-nav-trigger">
		Menu<span><!-- used to create the menu icon --></span>
	</a> <!-- .cd-nav-trigger -->
	
	<main>
		<section class="cd-section projects cd-selected">
			<header>
				<div class="cd-title">
					<h2>Projects</h2>
					
					<a href="http://codyhouse.co/?p=667">
						<span>
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
								<polygon fill="#FFFFFF" points="15,7 4.4,7 8.4,3 7,1.6 0.6,8 0.6,8 0.6,8 7,14.4 8.4,13 4.4,9 15,9 "/>
							</svg>
						</span>
						Article &amp; Download
					</a>
				</div> <!-- .cd-title -->
			</header>

			<div class="cd-content">
				<?php
$id = @$_GET['id'];
$no = 1;

if(@$_GET['action'] != 'kerjakansoal') { ?>
<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Tugas / Quiz</h4>
    </div>
</div>
<?php
}

if(@$_GET['action'] == '') { ?>

	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">Data Tugas / Quiz Setiap Mata Pelajaran</div>
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
	                        $sql_mapel = mysqli_query($db, "SELECT * FROM tb_mapel") or die ($db->error);
	                        while($data_mapel = mysqli_fetch_array($sql_mapel)) { ?>
	                            <tr>
	                                <td width="40px" align="center"><?php echo $no++; ?></td>
	                                <td><?php echo $data_mapel['mapel']; ?></td>
	                                <td width="200px" align="center">
	                                	<a href="?page=quiz&action=daftartopik&id_mapel=<?php echo $data_mapel['id']; ?>" class="btn btn-primary btn-xs">Lihat Quiz</a>
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
} else if(@$_GET['action'] == 'daftartopik') { ?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">Data Tugas / Quiz Setiap Mata Pelajaran</div>
	            <div class="panel-body">
					<div class="table-responsive">
					<?php
					$id_mapel = @$_GET['id_mapel'];
					$sql_tq = mysqli_query($db, "SELECT * FROM tb_topik_quiz WHERE id_mapel = '$id_mapel' AND id_kelas = '$data_terlogin[id_kelas]' AND status = 'aktif'") or die ($db->error);
					if(mysqli_num_rows($sql_tq) > 0) {
						while($data_tq = mysqli_fetch_array($sql_tq)) { ?>
						<table width="100%">
							<tr>
								<td valign="top">No. ( <?php echo $no++; ?> )</td>
								<td>
									<table class="table">
									    <thead>
									        <tr>
									            <td width="20%"><b>Judul</b></td>
									            <td>:</td>
									            <td width="65%"><?php echo $data_tq['judul']; ?></td>
									        </tr>
									    </thead>
									    <tbody>
									        <tr>
									            <td>Tanggal Pembuatan</td>
									            <td>:</td>
									            <td><?php echo tgl_indo($data_tq['tgl_buat']); ?></td>
									        </tr>
									        <tr>
									            <td>Pembuat</td>
									            <td>:</td>
									            <td>
									            	<?php
									            	if($data_tq['pembuat'] != 'admin') {
									            		$sql_peng = mysqli_query($db, "SELECT * FROM tb_pengajar WHERE id_pengajar = '$data_tq[pembuat]'") or die ($db->error);
									            		$data_peng = mysqli_fetch_array($sql_peng);
									            		echo $data_peng['nama_lengkap'];
									            	} else {
									            		echo $data_tq['pembuat'];
									            	} ?>
									            </td>
									        </tr>
									        <tr>
									            <td>Waktu Pengerjaan</td>
									            <td>:</td>
									            <td><?php echo $data_tq['waktu_soal'] / 60 ." menit"; ?></td>
									        </tr>
									        <tr>
									            <td>Info</td>
									            <td>:</td>
									            <td><?php echo $data_tq['info']; ?></td>
									        </tr>
									        <tr>
									        	<td></td>
									        	<td></td>
									        	<td>
									        		<a href="?page=quiz&action=infokerjakan&id_tq=<?php echo $data_tq['id_tq']; ?>" class="btn btn-primary btn-xs">Kerjakan Soal</a>
									        	</td>
									        </tr>
									    </tbody>
									</table>
								</td>
							</tr>
						</table>
						<?php
						}
					} else { ?>
						<div class="alert alert-danger">Data quiz yang berada di kelas ini dengan mapel tersebut tidak ada</div>
						<?php
					} ?>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
	<?php
} else if(@$_GET['action'] == 'infokerjakan') { ?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">Informasi Tugas / Quiz</div>
	            <div class="panel-body">
	            <?php
	            $sql_nilai = mysqli_query($db, "SELECT * FROM tb_nilai_pilgan WHERE id_tq = '$_GET[id_tq]' AND id_siswa = '$_SESSION[siswa]'") or die ($db->error);
	            $sql_jwb = mysqli_query($db, "SELECT * FROM tb_jawaban WHERE id_tq = '$_GET[id_tq]' AND id_siswa = '$_SESSION[siswa]'") or die ($db->error);
	            if(mysqli_num_rows($sql_nilai) > 0 || mysqli_num_rows($sql_jwb) > 0) {
	            	echo "Anda sudah mengerjakan ujian / test ini, silahkan lihat nilai Anda di halaman nilai.";
	            } else { ?>
					1. Baca dengan seksama dan teliti sebelum mengerjakan Tugas / Quiz.<br />
					2. Pastikan koneksi anda terjamin dan bagus.<br />
					3. Pilih browser yang versi terbaru.<br />
					4. Jika mati lampu hubungi pengajar mata pelajaran terkait untuk melakukan jian ulang.
					<?php
				} ?>
	            </div>
	            <div class="panel-footer">
					<?php
					if(mysqli_num_rows($sql_nilai) > 0 || mysqli_num_rows($sql_jwb) > 0) { ?>
						<a href="index.php" class="btn btn-primary">Kembali</a>
						<?php
					} else {
						$sql_cek_soal_pilgan = mysqli_query($db, "SELECT * FROM tb_soal_pilgan WHERE id_tq = '$_GET[id_tq]'") or die ($db->error);
						$sql_cek_soal_essay = mysqli_query($db, "SELECT * FROM tb_soal_essay WHERE id_tq = '$_GET[id_tq]'") or die ($db->error);
						if(mysqli_num_rows($sql_cek_soal_pilgan) > 0 || mysqli_num_rows($sql_cek_soal_essay) > 0) { ?>
							<a href="soal.php?id_tq=<?php echo @$_GET['id_tq']; ?>" class="btn btn-primary">Mulai Mengerjakan</a>
						<?php
						} else { ?>
							<a onclick="alert('Data soal tidak ditemukan, mungkin karena belum dibuat. Silahkan hubungi guru yang bersangkutan');" class="btn btn-primary">Mulai Mengerjakan</a>
						<?php
						} ?>
						<a href="index.php" class="btn btn-primary">Kembali</a>
					<?php
					} ?>
				</div>
	        </div>
	    </div>
	</div>
	<?php
} 
?>
                
                
                
			</div>
		</section> <!-- .cd-section -->
	</main>
	
	<nav class="cd-nav-container" id="cd-nav">
		<header>
			<h3>Navigation</h3>
			<a href="#0" class="cd-close-nav">Close</a>
		</header>

		<ul class="cd-nav">
			<li data-menu="index">
				<a href="index.html">
					<span>
						<svg class="nc-icon outline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64"><g transform="translate(0, 0)"> <polyline data-cap="butt" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" points="10,24.9 10,60 26,60 26,44 38,44 38,60 54,60 54,24.9 " stroke-linejoin="square" stroke-linecap="butt"></polyline> <polyline data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" points=" 4,30 32,6 60,30 " stroke-linejoin="square"></polyline> <rect data-color="color-2" x="26" y="24" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" width="12" height="10" stroke-linejoin="square"></rect> </g></svg>
					</span>

					<em>Intro</em>
				</a>
			</li>

			<li class="cd-selected" data-menu="projects">
				<a href="projects.php">
					<span>
						<svg class="nc-icon outline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64"> <g transform="translate(0, 0)"> <polyline data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" points=" 22,12 22,4 42,4 42,12 " stroke-linejoin="square"></polyline> <line fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" x1="44" y1="44" x2="20" y2="44" stroke-linejoin="square"></line> <polyline fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" points="12,44 2,44 2,12 62,12 62,44 52,44 " stroke-linejoin="square"></polyline> <polyline fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" points="58,44 58,60 6,60 6,44 " stroke-linejoin="square"></polyline> <rect data-color="color-2" x="22" y="22" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" width="20" height="10" stroke-linejoin="square"></rect> <rect data-color="color-2" x="12" y="40" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" width="8" height="8" stroke-linejoin="square"></rect> <rect data-color="color-2" x="44" y="40" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" width="8" height="8" stroke-linejoin="square"></rect> </g> </svg>
					</span>

					<em>Projects</em>
				</a>
			</li>

			<li data-menu="about">
				<a href="about.html">
					<span>
						<svg class="nc-icon outline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64"> <g transform="translate(0, 0)"> <polyline data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" points=" 38,16 62,16 62,58 2,58 2,16 26,16 " stroke-linejoin="square"></polyline> <path fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M38,20H26V8 c0-3.3,2.7-6,6-6h0c3.3,0,6,2.7,6,6V20z" stroke-linejoin="square"></path> <path fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M20,38L20,38 c-2.2,0-4-1.8-4-4v-2c0-2.2,1.8-4,4-4h0c2.2,0,4,1.8,4,4v2C24,36.2,22.2,38,20,38z" stroke-linejoin="square"></path> <line fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" x1="38" y1="36" x2="54" y2="36" stroke-linejoin="square"></line> <line fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" x1="38" y1="44" x2="48" y2="44" stroke-linejoin="square"></line> <path fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M30,48H10v0 c0-3.3,2.7-6,6-6h8C27.3,42,30,44.7,30,48L30,48z" stroke-linejoin="square"></path> <line fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" x1="32" y1="12" x2="32" y2="10" stroke-linejoin="square"></line> </g> </svg>
					</span>

					<em>About</em>
				</a>
			</li>

			<li data-menu="services">
				<a href="services.html">
					<span>
						<svg class="nc-icon outline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64"><g transform="translate(0, 0)"> <line data-cap="butt" data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" x1="46" y1="56" x2="58" y2="44" stroke-linejoin="square" stroke-linecap="butt"></line> <line data-cap="butt" data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" x1="24" y1="10" x2="12" y2="22" stroke-linejoin="square" stroke-linecap="butt"></line> <polyline data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" points=" 19,29 6,16 18,4 31,17 " stroke-linejoin="square"></polyline> <polyline data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" points=" 45,31 58,44 60,58 46,56 33,43 " stroke-linejoin="square"></polyline> <rect x="21.1" y="2.7" transform="matrix(0.7071 0.7071 -0.7071 0.7071 31 -12.8406)" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" width="19.8" height="56.6" stroke-linejoin="square"></rect> <line fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" x1="24" y1="24" x2="30" y2="30" stroke-linejoin="square"></line> <line fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" x1="18" y1="30" x2="22" y2="34" stroke-linejoin="square"></line> <line fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" x1="36" y1="12" x2="42" y2="18" stroke-linejoin="square"></line> <line fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" x1="30" y1="18" x2="34" y2="22" stroke-linejoin="square"></line> <line fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" x1="12" y1="36" x2="18" y2="42" stroke-linejoin="square"></line> </g></svg>
					</span>

					<em>Services</em>
				</a>
			</li>

			<li data-menu="careers">
				<a href="careers.html">
					<span>
						<svg class="nc-icon outline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64"> <g transform="translate(0, 0)"> <polyline data-cap="butt" data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" points="24,40 28,48 36,48 40,40 " stroke-linejoin="square" stroke-linecap="butt"></polyline> <line data-cap="butt" data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" x1="24" y1="62" x2="28" y2="48" stroke-linejoin="square" stroke-linecap="butt"></line> <line data-cap="butt" data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" x1="36" y1="48" x2="40" y2="62" stroke-linejoin="square" stroke-linecap="butt"></line> <path data-cap="butt" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" d="M39.7,40H40c12.2,0,22,9.8,22,22v0H2 v0c0-12.2,9.8-22,22-22h0.3" stroke-linejoin="square" stroke-linecap="butt"></path> <path data-cap="butt" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" d="M47.9,27.5C47.2,35.7,40.3,42,32,42 h0c-8.3,0-15.2-6.4-15.9-14.5" stroke-linejoin="square" stroke-linecap="butt"></path> <path fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M16,18c0-8.8,7.2-16,16-16 h0c8.8,0,16,7.2,16,16" stroke-linejoin="square"></path> <path data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M12.1,18 c0,0.3-0.1,0.7-0.1,1c0,6.1,4.9,11,11,11c3.7,0,7-1.9,9-4.7c2,2.8,5.3,4.7,9,4.7c6.1,0,11-4.9,11-11c0-0.3,0-0.7-0.1-1H12.1z" stroke-linejoin="square"></path> </g> </svg>
					</span>

					<em>Careers</em>
				</a>
			</li>
			<li data-menu="contact">
				<a href="contact.html">
					<span>
						<svg class="nc-icon outline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64"><g transform="translate(0, 0)"> <polyline data-cap="butt" data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" points="10,18 32,36 54,18 " stroke-linejoin="square" stroke-linecap="butt"></polyline> <rect x="2" y="10" fill="none" stroke="#9e85d0" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" width="60" height="44" stroke-linejoin="square"></rect> <line data-cap="butt" data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" x1="10" y1="44" x2="18" y2="34" stroke-linejoin="square" stroke-linecap="butt"></line> <line data-cap="butt" data-color="color-2" fill="none" stroke="#9e85d0" stroke-width="2" stroke-miterlimit="10" x1="54" y1="44" x2="46" y2="34" stroke-linejoin="square" stroke-linecap="butt"></line> </g></svg>
					</span>

					<em>Contact</em>
				</a>
			</li>
		</ul> <!-- .cd-3d-nav -->
	</nav>

	<div class="cd-overlay"><!-- shadow layer visible when navigation is visible --></div>
	
<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>