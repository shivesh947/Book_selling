<?php
 $con = mysqli_connect('localhost','root','','ekarts');
  if($con)
  {
  	echo "<script>console.log('connect');</script>";
  }
  else echo "<script>console.log('not connect');</script>";;
?>