<?php
error_reporting( error_reporting() & ~E_NOTICE )
?>
<?php
 session_start();
 include_once "user_level.html";
 include_once("conn.php");
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHMS</title>
<style>
    /* Base styles for the table */
    table {
        width: 88%;
        border-collapse: collapse;
		margin-left: auto;  
		margin-right: auto;  
    }
    th, td {
        border: 4px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }

    /* Responsive styles */
    @media only screen and (max-width: 600px) {
        /* Make table rows stack on top of each other */
        table, thead, tbody, th, td, tr {
            display: block;
        }
        /* Hide table headers (except the first row) */
        thead tr {
            display: none;
        }
        /* Add border to bottom of table cells */
        td {
            border-bottom: 1px solid #ddd;
        }
        /* Style table cells */
        td:before {
            content: attr(data-label);
            float: left;
            font-weight: bold;
        }
    }
</style>
</head>

<body>

	<?php
	$contact = $_SESSION["contact"];
			$i=1;
            $sql = "SELECT * FROM reports where contact='$contact'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            ?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>DATE</th>
			<th>LATITUDE</th>
			<th>LONGITUDE</th>
			<th>IMAGE ID</th>
			<th>IMAGE</th>
			<th>STATUS</th>
        </tr>
    </thead>
<?php      
    while ($row = mysqli_fetch_array($result)) {
		
?>
    <tbody>
        <tr>
		
<?php

$inputString = $row['img_id'];
$startPosition = 15; 
$length = 13;
$substring = substr($inputString, $startPosition, $length);
//echo $substring;

?>
		
		
            <td data-label="ID : "><?php  echo $i; ?></td>
			<td data-label="DATE : "><?php  echo $row['date']; ?></td>
			<td data-label="LATITUTE : "><?php  echo $row['latitude']; ?></td>
			<td data-label="LONGITUDE : "><?php  echo $row['longitude']; ?></td>
            <td data-label="IMG ID : "><?php  echo $substring; ?></td>
			<td ><a href="map.php?id=<?php echo $row['id']; ?>"target="_blank"><?php echo "<center><img src='capture_images/$substring.png' width='50' height='50'>".""; ?> </a></td>
            <td data-label="WORK STATUS : "><?php  //echo $row['status']; 
			switch($row['status'])
			{
				case 0: echo"<strong><font color='red'>Pending";
				break;
				case 1: echo"<strong><font color='green'>Complete";
				break;
			}
			
			?></td>
			
        </tr>
        <?php 
				$i++;
				}
				} 
				
				?>
        <!-- Add more rows as needed -->
    </tbody>
</table>

</body>
</html>
