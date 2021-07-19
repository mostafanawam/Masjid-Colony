<?php
  $link= @mysqli_connect("localhost", "root", "","colony");
  if($link == false)
    die(mysqli_connect_error());
?>
