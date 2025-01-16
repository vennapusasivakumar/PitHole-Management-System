<!DOCTYPE html>
<html>
<body>
<h1>HTML Geolocation</h1>
<p>Click the button to get your coordinates.</p>

<button onclick="take_snapshot()">Try It</button>
<?php

$lat = '<p id="lat"></p>';

echo $lat;
echo "<br>";
echo $lat;
?>
</br>


<script>
const x = document.getElementById("lat");

function take_snapshot() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}
</script>


</body>
</html>


