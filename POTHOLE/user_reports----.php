<?php
error_reporting( error_reporting() & ~E_NOTICE )
?>
<?php
 session_start();
 include_once "user_level.html";
 include_once("conn.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
table {
  font-family: cambria, sans-serif;
  border-collapse: collapse;
 
}


</style>
</head>
<body>
<table>
  <tr>
    <th>Sl.</th>
    <th>Date</th>
    <th>Status</th>
  </tr>
  <tr>
    <td>1</td>
    <td>20-12-2023</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>2</td>
    <td>20-12-2023</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>3</td>
    <td>20-12-2023</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>4</td>
    <td>20-12-2023</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>5</td>
    <td>20-12-2023</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>6</td>
    <td>20-12-2023</td>
    <td>Italy</td>
  </tr>
</table>

</body>
</html>

