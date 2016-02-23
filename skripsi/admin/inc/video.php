 <?php 
	mysql_connect("localhost","root","");
	mysql_select_db("db_elearning");
	error_reporting(E_ALL ^ E_NOTICE);
	if(isset($_POST['submit']))
	{
		$name	=$_FILES['file']['name'];	
		$temp	=$_FILES['file']['tmp_name'];
		
		//move_uploaded_file($_FILES[foto][tmp_name],$dir.$foto);
		move_uploaded_file($temp,"uploaded/".$name);
		$url	="localhost/skripsi/admin/uploaded/$name";
		
		mysql_query("INSERT INTO tb_videos VALUE ('','$name','$url')");
	}
?>

<!--<a href="videos.php">Uploaded Video List</a>-->
                    <label><b>Upload Video Materi</b></label>
<form action="video.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file" />
    <input type="submit" name="submit" value="Upload!" />
</form>
<?php	
if(isset($_POST['submit']))
{
	echo"<br/>" .$name. "has been uploaded ^_^";
}
?>