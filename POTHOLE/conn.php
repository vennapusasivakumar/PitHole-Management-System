<?php
$servername="localhost";
$username="root";
$password="";
$db="pothole";
$conn = new mysqli($servername,$username,$password,$db);
if(!$conn)
{
die("Eroor on Connection" .$conn->connect_error);
}
?>                                                                                                                                                                                                                           