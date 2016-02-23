<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-default">
                <div class="panel-heading">Video Tutorial</div>
                
                <!--<div class="panel-heading"><a href="?page=materi" class="btn btn-primary">Kembali</a>-->
                <div class="panel-body">
                     
	                <div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover">
	                       <?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "db_elearning";
mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
mysql_select_db($dbname) or die('database selection problem');
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








