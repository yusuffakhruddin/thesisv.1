<?php
@session_start();
include "+koneksi.php";

if(!@$_SESSION['siswa']) {
    if(@$_GET['hal'] == 'daftar') {
        include "register.php";
    } else {
        include "login.php";
    }
} else { ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>E-Learning SMA</title>
    <link href="style/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="style/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="style/assets/css/style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../favicon.ico"> 
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    
<script src="js/modernizr.custom.js"></script>
<script src="style/assets/js/jquery-1.11.1.js"></script>
<script src="style/assets/js/bootstrap.js"></script>
</head>
<body>
    	<header>
        <div class="navbar-inverse navbar-fixed-top set-radius-zero">
            <div class="row">
                <div class="col-md-12">
                    <?php
$sql_terlogin = mysqli_query($db, "SELECT * FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_siswa = '$_SESSION[siswa]' AND tb_kelas.id_kelas = tb_siswa.id_kelas") or die ($db->error);
$data_terlogin = mysqli_fetch_array($sql_terlogin);
?>    
                    Selamat datang, <u><?php echo ucfirst($data_terlogin['username']); ?></u>. Jangan lupa <a href="inc/logout.php?sesi=siswa" class="btn btn-xs btn-danger">Logout</a>
                </div>
            </div>
            </div>
    </header>
			<div id="bl-main" class="bl-main">
				<section>
					<div class="bl-box">
						<h2 class="bl-icon bl-icon-about">Nilai</h2>
					</div>
					<div class="bl-content">
						<h2>About this layout</h2>
						<p><div class="panel-body">
					        <div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Nilai</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Data Nilai Ujian Anda</div>
            <div class="panel-body">
                <div class="table-responsive">
                	<table class="table table-striped table-bordered table-hover">
                		<tr>
                			<th></th>
                			<th>Mata Pelajaran</th>
                			<th>Judul Ujian</th>
                			<th>Presentase Nilai Pilihan Ganda</th>
                			<th>Presentase Nilai Essay</th>
                			<th>Nilai Total</th>
                		</tr>
                		<?php
                		$no = 1;
                		$sql_cek_nilai_pilgan = mysqli_query($db, "SELECT * FROM tb_nilai_pilgan JOIN tb_topik_quiz ON tb_nilai_pilgan.id_tq = tb_topik_quiz.id_tq JOIN tb_mapel ON tb_topik_quiz.id_mapel = tb_mapel.id WHERE id_siswa = '$_SESSION[siswa]'") or die ($db->error);
                		if(mysqli_num_rows($sql_cek_nilai_pilgan) > 0) {
                			while($data_nilai_pilgan = mysqli_fetch_array($sql_cek_nilai_pilgan)) { ?>
                				<tr>
	                				<td><?php echo $no++; ?></td>
                					<td><?php echo $data_nilai_pilgan['mapel']; ?></td>
                					<td><?php echo $data_nilai_pilgan['judul']; ?></td>
                					<td>
                                        Benar : <?php echo $data_nilai_pilgan['benar']; ?> soal<br />
                                        Salah : <?php echo $data_nilai_pilgan['salah']; ?> soal<br />
                                        Tidak dikerjakan : <?php echo $data_nilai_pilgan['tidak_dikerjakan']; ?> soal<br />
                                        Presentase : <?php echo $data_nilai_pilgan['presentase']; ?>
                                    </td>
                					<?php
                					$sql_cek_jawaban = mysqli_query($db, "SELECT * FROM tb_jawaban WHERE id_tq = '$data_nilai_pilgan[id_tq]' AND id_siswa = '$_SESSION[siswa]'") or die ($db->error);
                					$data_jawaban = mysqli_fetch_array($sql_cek_jawaban);
                					if(mysqli_num_rows($sql_cek_jawaban) > 0) {
                						$sql_cek_nilai_essay = mysqli_query($db, "SELECT * FROM tb_nilai_essay WHERE id_tq = '$data_nilai_pilgan[id_tq]' AND id_siswa = '$_SESSION[siswa]'") or die ($db->error);
                						$data_nilai_essay = mysqli_fetch_array($sql_cek_nilai_essay);
                						if(mysqli_num_rows($sql_cek_nilai_essay) > 0) { ?>
                							<td><?php  echo $data_nilai_essay['nilai']; ?></td>
                							<td><?php echo ($data_nilai_pilgan['presentase']+$data_nilai_essay['nilai'])/2; ?></td>
                							<?php
                						} else {
                							echo "<td>Soal essay belum dikoreksi</td>";
                							echo "<td>Menunggu soal essay dikoreksi</td>";
                						}
                					} else { ?>
										<td>Ujian ini tidak ada soal essay</td>
										<td><?php echo $data_nilai_pilgan['presentase']; ?></td>
                					<?php
                					} ?>
                				</tr>
                			<?php
	                		}
                		} else {
                            echo '<tr><td colspan="6" align="center">Tidak ada data nilai, mungkin Anda belum mengikuti ujian</td></tr>';
                        } ?>
                	</table>
               	</div>
            </div>
        </div>
    </div>
</div>
                            </div>
                                   </p>
						<p>
							<a href="http://tympanus.net/Development/ResponsiveMultiLevelMenu/"><strong>&laquo; Previous Demo</strong></a> |
							<a href="http://tympanus.net/codrops/?p=14783"><strong>Back to the Codrops Article</strong></a>
						</p>
					</div>
					<span class="bl-icon bl-icon-close"></span>
				</section>
				<section id="bl-work-section">
					<div class="bl-box">
						<h2 class="bl-icon bl-icon-works">Materi Pelajaran</h2>
					</div>
					<div class="bl-content">
						<h2>My Works</h2>
						<p>Mung bean maize dandelion sea lettuce catsear bunya nuts ricebean tatsoi caulie horseradish pea.</p>
						<ul id="bl-work-items">
							<li data-panel="panel-1"><a href="#"><img src="images/1.jpg" /></a></li>
							<li data-panel="panel-2"><a href="#"><img src="images/2.jpg" /></a></li>
							<li data-panel="panel-3"><a href="#"><img src="images/3.jpg" /></a></li>
							<li data-panel="panel-4"><a href="#"><img src="images/4.jpg" /></a></li>
                            <li data-panel="panel-5"><a href="#"><img src="images/1.jpg" /></a></li>
							<li data-panel="panel-6"><a href="#"><img src="images/2.jpg" /></a></li>
							<li data-panel="panel-7"><a href="#"><img src="images/3.jpg" /></a></li>
							<li data-panel="panel-8"><a href="#"><img src="images/4.jpg" /></a></li>
						</ul>
						<p> <a href="#">Yusuf Fakhruddin</a></p>
					</div>
					<span class="bl-icon bl-icon-close"></span>
				</section>
				<section>
					<div class="bl-box">
						<h2 class="bl-icon bl-icon-blog"><a href="?page=quiz"/></a>Quiz</h2>
					</div>
					<div class="bl-content">
						<h2>My Musings</h2>
					
                        
                        
                        
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
						<a href="?page=quiz" class="btn btn-primary">Kembali</a>
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
						<a href="?page=quiz" class="btn btn-primary">Kembali</a>
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
					<span class="bl-icon bl-icon-close"></span>
				</section>
				<section>
					<div class="bl-box">
						<h2 class="bl-icon bl-icon-contact">Video</h2>
					</div>
					<div class="bl-content">
						<h2>Get in touch</h2>
                        
                        <div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-default">
                <div class="panel-heading">Video Tutorial</div>
                
                <!--<div class="panel-heading"><a href="?page=materi" class="btn btn-primary">Kembali</a>-->
                <div class="panel-body">
                     
	                <div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover">
	                        <?php
	mysql_connect("localhost","root","");
	mysql_select_db("db_elearning");
	error_reporting(E_ALL ^ E_NOTICE);
?>


<label>List</label>
    </br>
 <?php
	 $query 	= mysql_query("SELECT * FROM tb_videos");
	 while($row =mysql_fetch_assoc($query))
	 {	 
		$id		=$row['id'];
		$name	=$row['name'];
		
		echo "<a href='?page=video&id=$id'>$name</a><br/>";
	 }
?>
    
    
    <?php
if (isset($_GET['id']))
{
	$id		=$_GET['id'];
	$query	=mysql_query("SELECT * FROM tb_videos WHERE id='$id'");
	while($row =mysql_fetch_assoc($query))
	{	 
		$name		=$row['name'];
		$url		=$row['url'];
	
		echo "</br><b>Kamu Sedang Melihat" .$name. "</b></br>";
		echo "<embed src='$url' width='800' height='600' autoplay='false' preload='none'></embed></br>";
		
	}
}else
{
	echo "";	
}

?>
	                       
	                    </table>
	                </div>
	            </div>
	        </div>
            
        
	    </div>
	</div>

						<!--<p>Pinterest semiotics single-origin coffee craft beer thundercats irony, tumblr bushwick intelligentsia pickled. Narwhal mustache godard master cleanse street art, occupy ugh selfies put a bird on it cray salvia four loko gluten-free shoreditch. Occupy american apparel freegan cliche. Mustache trust fund 8-bit jean shorts mumblecore thundercats. Pour-over small batch forage cray, banjo post-ironic flannel keffiyeh cred ethnic semiotics next level tousled fashion axe. Sustainable cardigan keytar fap bushwick bespoke.</p>-->
					</div>
					<span class="bl-icon bl-icon-close"></span>
				</section>
				<!-- Panel items for the works -->
				<div class="bl-panel-items" id="bl-panel-work-items">
					<div data-panel="panel-1">
                        <div class="bl-content">
						<div>
							
                            <h3>Microsoft Word 2007</h3>
						              <p>
                            Microsoft Office Word 2007 merupakan program aplikasi pengolah kata (word processor) yang yang biasa digunakan untuk membuat laporan, dokumen berbentuk surat, brosur, table, dan  masih banyak lagi dukumen-dokumen lain yang biasa dibuat dengan menggunakan Microsoft Office Word.
Microsoft  Office  Word  2007  merupakan  pengembangan  dari  versi  sebelumnya  yang mengalami banyak perubahan dan perbaikan, sehingga lebih fleksibel digunakan di masa kini. Microsof Office Word juga menyediakan fasilitas penuh terhadap apa yang kita perlukan. Dengan fasilitasnya yang lengkap lengkap ini telah menghantarkan Microsoft Office Word 2007 sebagai program aplikasi pengolah kata yang mutakhir saat ini.
Berbeda dari versi sebelumnya seperti seperti Word 2000, XP dan 2003, Word 2007 tidak lagi menyediakan menu bar dengan pull downnya beserta toolbar-toolbar seperti formating, standar dan drawing, tetapi terdiri dari beberapa tab (lihat gambar 1.2) yang terdiri dari beberapa grup yang masing-masing grup terdiri dari beberapa perintah singkat/icon.

                            
                            
                            </p>    
						</div>
					</div>
                    </div>
					<div data-panel="panel-2">
						 <div class="bl-content">
                             <div>
							<img src="images/2.jpg" />
							<h3>Chillwave mustache</h3>
							<p>Squid vinyl scenester literally pug, hashtag tofu try-hard typewriter polaroid craft beer mlkshk cardigan photo booth PBR. Chillwave 90's gentrify american apparel carles disrupt. Pinterest semiotics single-origin coffee craft beer thundercats irony, tumblr bushwick intelligentsia pickled. Narwhal mustache godard master cleanse street art, occupy ugh selfies put a bird on it cray salvia four loko gluten-free shoreditch.</p>
						</div>
					</div>
                    </div>
                    
					<div data-panel="panel-3">
						 <div class="bl-content">
                        <div>
							<img src="images/3.jpg" />
							<h3>Austin hella</h3>
							<p>Ethical cray wayfarers leggings vice, seitan banksy small batch ethnic master cleanse. Pug chillwave etsy, scenester meh occupy blue bottle tousled blog tonx pinterest selvage mixtape swag cosby sweater. Synth tousled direct trade, hella Austin craft beer ugh chambray.</p>
						</div>
					</div>
                        </div>
					<div data-panel="panel-4">
						 <div class="bl-content">
                        <div>
							<img src="images/4.jpg" />
							<h3>Brooklyn dreamcatcher</h3>
							<p>Fashion axe 90's pug fap. Blog wayfarers brooklyn dreamcatcher, bicycle rights retro YOLO. Wes anderson lomo 90's food truck 3 wolf moon, twee jean shorts. Iphone small batch twee wolf yr before they sold out. Brooklyn echo park cred, portland pug selvage flannel seitan tousled mcsweeney's.</p>
						</div>
                        </div>
                        </div>
                         <div data-panel="panel-5">
						 <div class="bl-content">
                             <div>
							<img src="images/4.jpg" />
							<h3>Brooklyn dreamcatcher</h3>
							<p>Fashion axe 90's pug fap. Blog wayfarers brooklyn dreamcatcher, bicycle rights retro YOLO. Wes anderson lomo 90's food truck 3 wolf moon, twee jean shorts. Iphone small batch twee wolf yr before they sold out. Brooklyn echo park cred, portland pug selvage flannel seitan tousled mcsweeney's.</p>
						</div>
                             </div>
                             </div>
                        <div data-panel="panel-6">
						 <div class="bl-content">
                             <div>
							<img src="images/4.jpg" />
							<h3>Brooklyn dreamcatcher</h3>
							<p>Fashion axe 90's pug fap. Blog wayfarers brooklyn dreamcatcher, bicycle rights retro YOLO. Wes anderson lomo 90's food truck 3 wolf moon, twee jean shorts. Iphone small batch twee wolf yr before they sold out. Brooklyn echo park cred, portland pug selvage flannel seitan tousled mcsweeney's.</p>
						</div>
                            </div>
                             </div>
                            <div data-panel="panel-7">
						 <div class="bl-content">
                             <div>
							<img src="images/4.jpg" />
							<h3>Brooklyn dreamcatcher</h3>
							<p>Fashion axe 90's pug fap. Blog wayfarers brooklyn dreamcatcher, bicycle rights retro YOLO. Wes anderson lomo 90's food truck 3 wolf moon, twee jean shorts. Iphone small batch twee wolf yr before they sold out. Brooklyn echo park cred, portland pug selvage flannel seitan tousled mcsweeney's.</p>
						</div>
                                </div>
                             </div>
                                       
                        <div data-panel="panel-8">
						 <div class="bl-content">
                             <div>
							<img src="images/4.jpg" />
							<h3>Brooklyn dreamcatcher</h3>
							<p>Fashion axe 90's pug fap. Blog wayfarers brooklyn dreamcatcher, bicycle rights retro YOLO. Wes anderson lomo 90's food truck 3 wolf moon, twee jean shorts. Iphone small batch twee wolf yr before they sold out. Brooklyn echo park cred, portland pug selvage flannel seitan tousled mcsweeney's.</p>
						</div>
                                    
					</div>
                             </div>
					<nav>
						<span class="bl-next-work">&gt; Next Project</span>
						<span class="bl-icon bl-icon-close"></span>
					</nav>
				</div>
			</div>
		<!-- /container -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/boxlayout.js"></script>
		<script>
			$(function() {
				Boxlayout.init();
			});
		</script>
	</body>
    
    
    
    <!--<header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    Selamat datang, <u><?php echo ucfirst($data_terlogin['username']); ?></u>. Jangan lupa <a href="inc/logout.php?sesi=siswa" class="btn btn-xs btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <!--<div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">
                   <!-- <img src="style/assets/img/logo.png" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="img/foto_siswa/<?php echo $data_terlogin['foto']; ?>" class="img-rounded" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo $data_terlogin['nama_lengkap']; ?></h4>
                                        <h5>Kelas : <?php echo $data_terlogin['nama_kelas']; ?></h5>
                                    </div>
                                </div>
                                <hr />
                                <center><a href="?hal=detailprofil" class="btn btn-info btn-sm">Detail Profile</a> <a href="?hal=editprofil" class="btn btn-primary btn-sm">Edit Profile</a></center>

                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>-->

    <!--<section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a <?php if(@$_GET['page'] == '') { echo 'class="menu-top-active"'; } ?> href="./">Beranda</a></li>
                            <li><a <?php if(@$_GET['page'] == 'quiz') { echo 'class="menu-top-active"'; } ?> href="?page=quiz">Tugas / Quiz</a></li>
                            <li><a <?php if(@$_GET['page'] == 'nilai') { echo 'class="menu-top-active"'; } ?> href="?page=nilai">Nilai</a></li>
                            <li><a <?php if(@$_GET['page'] == 'materi') { echo 'class="menu-top-active"'; } ?> href="?page=materi">Materi</a></li>
                            <li><a <?php if(@$_GET['page'] == 'video') { echo 'class="menu-top-active"'; } ?> href="?page=video">Video</a></li>
                            <li><a <?php if(@$_GET['page'] == 'watch') { echo 'class="menu-top-active"'; } ?> href="?page=watch="></a></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="content-wrapper">
        <div class="container" id="wadah">
        <?php
        if(@$_GET['page'] == '') {
            include "inc/beranda.php";
        } else if(@$_GET['page'] == 'quiz') {
            include "inc/quiz.php";
        } else if(@$_GET['page'] == 'nilai') {
            include "inc/nilai.php";
        } else if(@$_GET['page'] == 'materi') {
            include "inc/materi.php";
        } else if(@$_GET['page'] == 'video') {
            include "inc/video.php";
        } else if(@$_GET['page'] == 'watch') {
            include "inc/watch.php";
            }
            ?>
        </div>
    </div>

     <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2015 Yusuf Fakhruddin
                </div>

            </div>
        </div>
    </footer>
</body>
</html>
<?php
}
?>