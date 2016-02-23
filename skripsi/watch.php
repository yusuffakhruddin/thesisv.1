<?php
	mysql_connect("localhost","root","");
	mysql_select_db("db_elearning");
	error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Watch</title>
</head>

<body>
<?php
if (isset($_GET['id']))
{
	$id		=$_GET['id'];
	$query	=mysql_query("SELECT * FROM tb_videos WHERE id='$id'");
	while($row =mysql_fetch_assoc($query))
	{	 
		$name		=$row['name'];
		$url		=$row['url'];
	
		echo "You are watching".$name."</br>";
		echo "<embed src='$url' width='1024' height='768'></embed></br>";
		
	}
}else
{
	echo "Error!";	
}

?>
</body>
</html>