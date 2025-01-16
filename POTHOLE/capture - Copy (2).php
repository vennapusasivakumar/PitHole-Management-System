<?php
error_reporting( error_reporting() & ~E_NOTICE )
?>
<?php
 session_start();
 include_once "user_level.html";
 include_once("conn.php");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width" />
	<!-- Required library -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.24/webcam.js"></script>
	<!-- Bootstrap theme -->
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">!-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>How to capture image from webcam in Javascript and PHP?</title>
</head>
<body>
<div class="container">	
  <div class="row">
	<div class="col-lg-6" align="center">
	<br>
		<div id="my_camera" class="pre_capture_frame" ></div>
		<input type="hidden" name="captured_image_data" id="captured_image_data">
		<br>
		<input type="button" class="btn btn-info btn-round btn-file" value="Take Snapshot" onClick="take_snapshot()">
<!--<input type="button" class="btn btn-info btn-round btn-file" value="Refresh" onClick="document.location.reload(true)">!-->		
	</div>
<form action="" method="post" name="form1" id="form1">
	<div class="col-lg-6" align="center">
	
		<div id="results" name="results"></br>
			<!--<img style="width: 150px;" class="after_capture_frame" src="image_placeholder.jpg" />!-->
		</div>
<?php
session_start();
echo $_SESSION["latitude"];
if(isset($_POST["submit"]))
{
  		$img_id = $_SESSION['$file'];
		$cont = $_SESSION["contact"];
		$sql = mysqli_query($conn,"INSERT INTO reports(contact,img_id) VALUES('$cont','$img_id')");
		if($sql === TRUE)
		{
			echo "<br><center><strong>SUCCESSFULLY REGISTERED</strong>";
		}
		
          
}
?>		
		<br>
		<button type="submit" class="btn btn-success" name='submit' onclick="saveSnap()">Save Picture</button>
	</div>	
  </div>
</div>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</form>
<br>
</body>

<script language="JavaScript">
	 // Configure a few settings and attach camera 250x187
	 Webcam.set({
	  width: 300,
	  height: 287,
	  image_format: 'jpeg',
	  jpeg_quality: 2990,
	  constraints: {
					facingMode: 'environment'
				   }
	  }
	  
	  );	 
	 Webcam.attach( '#my_camera' );
	
	function take_snapshot() {
	 // play sound effect
	 //shutter.play();
	 // take snapshot and get image data
	 Webcam.snap( function(data_uri) {
	 // display results in page
	 document.getElementById('results').innerHTML = 
	  '<img class="after_capture_frame" src="'+data_uri+'"/>';
	 $("#captured_image_data").val(data_uri);
	 });	 
	}

	function saveSnap(){
	var base64data = $("#captured_image_data").val();
	 $.ajax({
			type: "POST",
			dataType: "json",
			url: "capture_image_upload.php",
			data: {image: base64data},
			success: function(data) { 
				alert(data);
			}
		});
	}
</script>
</html>