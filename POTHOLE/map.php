<?php
include_once("conn.php");
?>
<?php
$id =$_REQUEST['id'];
	                    $res=mysqli_query($conn,"select * from reports where id='".$id."'");
						while($row=mysqli_fetch_array($res))
                        {
						$latitude = $row["latitude"];
						$longitude = $row["longitude"];
						//echo $column;
						}
  
       //$latitude = '14.0302894';
        //$longitude = '80.026599';
        ?>
 
        <iframe width="100%" height="100%" src="https://maps.google.com/maps?q=
		<?php echo $latitude; ?>,<?php echo $longitude; ?>&output=embed"></iframe>
 
        <?php
    
?>

