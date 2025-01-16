<?php
  $lat= 26.754347; //latitude
  $lng= 81.001640; //longitude
  $address= getaddress($lat,$lng);
  if($address)
  {
    echo $address;
  }
  else
  {
    echo "Not found";
  }
?>