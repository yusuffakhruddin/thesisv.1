
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="Blueprint: Blueprint: Google Grid Gallery" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
        <link rel="stylesheet" type="text/css" href="css/default.css" />
		<script src="js/modernizr.custom.js"></script>
		
	</head>
	<body>

<!--<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Materi Pelajaran</h4>
    </div>
    
</div>-->

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
	                                	<a href="?page=materi&action=lihatmateri&id_materi=<?php echo $data_materi['id_materi']; ?>" class="btn btn-primary btn-xs">Lihat Materi</a>
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
        <div class="container">
			
			<div id="grid-gallery" class="grid-gallery">
				<section class="grid-wrap">
					<ul class="grid" >
						<li class="grid-sizer"></li>
						<li>
							<figure>
								<img src="img/thumb/1.jpg"  alt="img01"/>
								<!--<figcaption><h3>Letterpress asymmetrical</h3><p>Chillwave hoodie ea gentrify aute sriracha consequat.</p></figcaption>-->
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/2.jpg" alt="img01"/>
								<!--<figcaption><h3>Vice velit chia</h3><p>Laborum tattooed iPhone, Schlitz irure nulla Tonx retro 90's chia cardigan quis asymmetrical paleo. </p></figcaption>-->
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/3.jpg" alt="img01"/>
								<!--<figcaption><h3>Brunch semiotics</h3><p>Ex disrupt cray yr, butcher pour-over magna umami kitsch before they sold out commodo.</p></figcaption>-->
							</figure>
						</li>
						<li>
							<figure>
								<img src="img/thumb/4.jpg" alt="img01"/>
								<!--<figcaption><h3>Chillwave nihil occupy</h3><p>In post-ironic gluten-free deserunt, PBR&amp;B non pork belly cupidatat polaroid. </p></figcaption>-->
							</figure>
						</li>
						<li>
							<figure>
								<!--<img src="img/thumb/5.png" alt="img05"/>
								<figcaption><h3>Kale chips lomo biodiesel</h3><p>Pariatur food truck street art consequat sustainable, et kogi beard qui paleo. </p></figcaption>-->
							</figure>
						</li>
						<li>
							<figure>
								<!--<img src="img/thumb/6.png" alt="img06"/>
								<figcaption><h3>Exercitation occaecat</h3><p>Street chillwave hoodie ea gentrify.</p></figcaption>-->
							</figure>
						</li>
						<li>
							<figure>
								<!--<img src="img/thumb/1.png" alt="img01"/>
								<figcaption><h3>Selfies viral four</h3><p>Raw denim duis Tonx Shoreditch labore swag artisan High Life cred, stumptown Schlitz quinoa flexitarian mollit fanny pack.</p></figcaption>-->
							</figure>
						</li>
						<li>
							<figure>
								<!--<img src="img/thumb/2.png" alt="img02"/>
								<figcaption><h3>Photo booth skateboard</h3><p>Vinyl squid ex High Life. Paleo Neutra nulla master cleanse, Helvetica et enim nesciunt esse.</p></figcaption>-->
							</figure>
						</li>
						<li>
							<figure>
								<!--<img src="img/thumb/3.png" alt="img03"/>
								<figcaption><h3>Ex fashion axe</h3><p>Qui nesciunt et, in chia cliche irure. Eu YOLO nihil mollit twee locavore, tempor keytar asymmetrical irure aute sriracha consequat.</p></figcaption>-->
							</figure>
						</li>
						<li>
							<figure>
								<!--<img src="img/thumb/4.png" alt="img04"/>
								<figcaption><h3>Thundercats next level</h3><p>Portland nulla butcher ea XOXO, consequat Bushwick Pinterest elit twee pickled direct trade vero. </p></figcaption>-->
							</figure>
						</li>
						
					</ul>
				</section><!-- // grid-wrap -->
				<section class="slideshow">
					<ul>
						<li>
							<figure>
								<figcaption><h2>Pencipta WWW</h2>
									<p>Tim Berners-Lee atau Sir Timothy John "Tim" Berners-Lee, KBE (TimBL atau TBL) (lahir di London, Inggris, 8 Juni 1955) adalah penemu World Wide Web biasa disebut dengan WWW dan ketua World Wide Web Consortium, yang mengatur perkembangannya.</p>
								</figcaption>
								<img src="img/large/1.jpg" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h2>Penemu Komputer</h2>
									<p>Ia adalah orang yang pertama kali menemukan sebuah benda yang kini sangat bermanfaat bagi manusia dikehidupan sehari-hari yaitu komputer. Charles Babbage dikenal dunia sebagai penemu dari komputer .Charles Babbage yang lahir 26 Desember 1792, daerah yang sekarang dikenal dengan nama Southwark, London, anak dari Benjamin Babbage, seorang Banker. </p>
								</figcaption>
								<img src="img/large/2.jpg" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>KOmputer Generasi Pertama</h3>
									<p>Electronic Numerical Integrator and Calculator (ENIAC) merupakan generasi pertama komputer digital elektronik yang digunakan untuk kebutuhan umum. Pgamroposal ENIAC dirancang oada tahun 1942, dan mulai dibuat pada tahun 1943 oleh Dr. John W. Mauchly dan John Presper Eckert di Moore School of Electrical Engineering (University of Pennsylvania) dan baru selesai pada tahun 1946.</p>
								</figcaption>
								<img src="img/large/3.jpg" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h2>Penemu Macintosh</h2>
									<p>Steven Paul Jobs lahir di San Francisco, California, Amerika Serikat, 24 Februari 1955 adalah pemimpin perusahaan Apple Computer bersama Steve Wozniak dan tokoh utama di industri komputer dikenal sebagai pendiri (dengan Steve Wozniak) Apple Computer di tahun 1976.</p>
								</figcaption>
								<img src="img/large/4.jpg" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h2>Penemu Microsoft</h2>
									<p>Penemu Microsoft tidak lepas dari jasa dua orang yang saling bersahabat sejak kecil. Kedua sahabat ini yaitu Bill Gates dan Paul Allen, sesama teman masa kecil yang menggemari pemrograman komputer, berusaha membuat bisnis yang sukses dengan memanfaatkan kemampuan mereka. </p>
								</figcaption>
								<img src="img/large/5.jpg" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Penemu Microsoft</h3>
									<p>Cosby sweater hella lomo Thundercats VHS occupy High Life. Synth pop-up readymade single-origin coffee, fanny pack tousled retro. Fingerstache mlkshk ugh hashtag, church-key ethnic street art pug yr.</p>
								</figcaption>
								<img src="img/large/6.png" alt="img06"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Selfies viral four</h3>
									<p>Ethnic readymade pug, small batch XOXO Odd Future normcore kogi food truck craft beer single-origin coffee banh mi photo booth raw denim. XOXO messenger bag pug VHS. Forage gluten-free polaroid, twee hoodie chillwave Helvetica.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Photo booth skateboard</h3>
									<p>Thundercats pour-over four loko skateboard Brooklyn, Etsy sriracha leggings dreamcatcher narwhal authentic 3 wolf moon synth Portland. Shabby chic photo booth Blue Bottle keffiyeh, McSweeney's roof party Carles.</p>
								</figcaption>
								<img src="img/large/2.png" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Ex fashion axe</h3>
									<p>Ennui Blue Bottle shabby chic, organic butcher High Life tattooed meggings jean shorts Brooklyn sartorial polaroid. Cray raw denim +1, bespoke High Life Odd Future banh mi chillwave Marfa kogi disrupt paleo direct trade 90's Godard. </p>
								</figcaption>
								<img src="img/large/3.png" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Thundercats next level</h3>
									<p>Typewriter authentic PBR, iPhone mixtape fixie post-ironic fingerstache Pitchfork artisan. Wayfarers master cleanse occupy, Tonx lo-fi swag Truffaut irony whatever Blue Bottle readymade PBR gluten-free. Lomo Pinterest Banksy fap. Retro ennui you probably haven't heard of them iPhone, PBR fashion axe polaroid.</p>
								</figcaption>
								<img src="img/large/4.png" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bushwick selvage synth</h3>
									<p>Schlitz deserunt pour-over consectetur. Selfies plaid asymmetrical farm-to-table, cred gastropub photo booth narwhal non roof party velit raw denim slow-carb meggings pug. Tempor post-ironic seitan cliche bicycle rights. Meh viral Williamsburg, quinoa 8-bit kale chips YOLO Marfa accusamus.</p>
								</figcaption>
								<img src="img/large/5.png" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bottle wayfarers locavore</h3>
									<p>Aliqua High Life art party fixie farm-to-table. Kitsch Echo Park shabby chic, narwhal fugiat Cosby sweater asymmetrical gastropub tofu. Authentic minim Pinterest Blue Bottle beard, aliqua chia XOXO dolor freegan banh mi vegan fugiat.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Letterpress asymmetrical</h3>
									<p>Pickled hoodie Pinterest 90's proident church-key chambray. Salvia incididunt slow-carb ugh skateboard velit, flannel authentic hoodie lomo fixie photo booth farm-to-table. Minim meggings Bushwick, semiotics Vice put a bird.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Vice velit chia</h3>
									<p>Tattooed assumenda chambray cray officia. 90's mollit ethnic church-key ex eu pop-up gentrify. Tonx raw denim eu, bitters nesciunt distillery Neutra pop-up. Drinking vinegar Helvetica Truffaut tattooed.</p>
								</figcaption>
								<img src="img/large/2.png" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Brunch semiotics</h3>
									<p>Gentrify High Life adipisicing, duis slow-carb kogi Tumblr raw denim freegan Echo Park. Fingerstache laboris pork belly messenger bag, you probably haven't heard of them vegan twee Intelligentsia Vice Etsy pickled put a bird on it Godard roof party. Meggings small batch dreamcatcher velit.</p>
								</figcaption>
								<img src="img/large/3.png" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Chillwave nihil occupy</h3>
									<p>Marfa exercitation non, beard +1 hashtag cardigan gluten-free mixtape church-key ugh eu Portland leggings. Ennui farm-to-table fingerstache keytar Echo Park tattooed. Seitan qui artisan, aliquip cupidatat sunt Portland wayfarers duis.</p>
								</figcaption>
								<img src="img/large/4.png" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Kale chips lomo biodiesel</h3>
									<p>Lomo church-key whatever, seitan laborum drinking vinegar lo-fi semiotics nihil meh. Skateboard irure before they sold out Banksy. Narwhal High Life lomo aliqua drinking vinegar. PBR&B placeat proident, craft beer forage DIY nostrud meh flexitarian keytar Helvetica.</p>
								</figcaption>
								<img src="img/large/5.png" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Exercitation occaecat</h3>
									<p>Skateboard Truffaut bicycle rights seitan normcore. Culpa lo-fi ennui, Pinterest before they sold out Echo Park roof party sapiente aesthetic consequat Truffaut freegan voluptate. Kogi banh mi vero nihil, freegan gluten-free cliche. Forage Etsy laboris anim normcore, McSweeney's ex.</p>
								</figcaption>
								<img src="img/large/6.png" alt="img06"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Selfies viral four</h3>
									<p>Viral roof party locavore flexitarian nihil fanny pack actually Odd Future anim commodo. Sunt yr aute, enim quis plaid sartorial duis leggings lo-fi gluten-free. Tote bag flexitarian pug stumptown, Cosby sweater try-hard ethnic scenester. Mumblecore +1 hoodie accusamus skateboard slow-carb, Thundercats Godard placeat craft beer meh enim trust fund.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Photo booth skateboard</h3>
									<p>Culpa pour-over cray nesciunt dreamcatcher. Meggings distillery cillum raw denim voluptate, single-origin coffee lo-fi ethical iPhone four loko nihil salvia. Biodiesel ea Intelligentsia quis deep v, American Apparel trust fund slow-carb synth semiotics quinoa Brooklyn pour-over nulla Godard.</p>
								</figcaption>
								<img src="img/large/2.png" alt="img02"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Ex fashion axe</h3>
									<p>Bespoke irony tousled nihil flexitarian, salvia tempor nostrud Bushwick hashtag Austin ethnic disrupt. Beard Helvetica nihil, chia craft beer Wes Anderson keytar dolore. Irure incididunt flexitarian photo booth cillum, YOLO deserunt Brooklyn artisan. Brunch assumenda irony, Blue Bottle roof party DIY ullamco quis.</p>
								</figcaption>
								<img src="img/large/3.png" alt="img03"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Thundercats next level</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>
								</figcaption>
								<img src="img/large/4.png" alt="img04"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bushwick selvage synth</h3>
									<p>Ethical Truffaut tofu food truck cred cornhole. Irure umami Austin cornhole blog ethical. Aliqua yr Truffaut, adipisicing hashtag Shoreditch eiusmod tempor literally vinyl.</p>
								</figcaption>
								<img src="img/large/5.png" alt="img05"/>
							</figure>
						</li>
						<li>
							<figure>
								<figcaption>
									<h3>Bottle wayfarers locavore</h3>
									<p>Pork belly irony Shoreditch fashion axe DIY. Portland banjo irony, squid gentrify Austin fixie church-key magna. Marfa artisan Echo Park, McSweeney's banjo sunt keytar tofu. Brooklyn PBR single-origin coffee disrupt polaroid ut, gluten-free XOXO plaid magna.</p>
								</figcaption>
								<img src="img/large/1.png" alt="img01"/>
							</figure>
						</li>
					</ul>
					<nav>
						<span class="icon nav-prev"></span>
						<span class="icon nav-next"></span>
						<span class="icon nav-close"></span>
					</nav>
					<div class="info-keys icon">Navigate with arrow keys</div>
				</section><!-- // slideshow -->
			</div><!-- // grid-gallery -->
		</div>
		<script src="js/imagesloaded.pkgd.min.js"></script>
		<script src="js/masonry.pkgd.min.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/cbpGridGallery.js"></script>
		<script>
			new CBPGridGallery( document.getElementById( 'grid-gallery' ) );
		</script>
        <script src="js/classie.js"></script>
		<script src="js/modalEffects.js"></script>

		<!-- for the blur effect -->
		<!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '/js/';
		</script>
		<script src="js/cssParser.js"></script>
		<script src="js/css-filters-polyfill.js"></script>
	<div class="row">
        
	    <div class="col-md-12">
             <a href="?page=materi" class="btn btn-primary">Kembali</a>
	        <div class="panel panel-default">
	        	<div class="panel-heading"></div>
               <div class="panel-body">
					<div class="table-responsive">

						<table class="table table-striped table-bordered table-hover">
						    <thead>
                                <?php
                                 $sql_materi = mysqli_query($db, "SELECT * FROM tb_materi WHERE id_materi = '$_GET[id_materi]'") or die($db->error);
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
	</body>
</html>
