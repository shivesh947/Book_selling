<?php
include('phpaddition/dbconnect.php');
?>
<?php

    error_reporting(0);
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    error_reporting(E_ALL);
    ini_set("error_reporting", E_ALL);
    error_reporting(E_ALL & ~E_NOTICE);

session_start();
if($_SESSION['uid'])
{
$dp=$_SESSION['uid'];
$query="SELECT `Names`, `Mnums`, `Emails`, `Pass` FROM `loginstore` WHERE Emails='$dp'";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);
}
?>

<link rel="stylesheet" type="text/css" href="phpaddition/css/navstyle.css">
<script type="text/javascript" src="phpaddition/js/nav.js"></script>
<style type="text/css">
	#searchbox
	{
	width: 40vw;
    height: 40px;
    border-color: orange;
    margin: 22px;
    padding: 0px;
    position: absolute;

	}
</style>


<div>
 <a href="index.php"><img src="images/logo.png"></a>
 <input type="text" name="" id="searchbox" onkeyup="mysearch()"  placeholder="Search from millions of products">	

 <script type="text/javascript">
  function mysearch()
  {
    var txtValue;
    var a=document.getElementById('searchbox').value.toUpperCase();
    var arr=document.getElementsByClassName('itemname');
    for(var i=0;i<arr.length;i++)
    {
      var val=arr[i].innerHTML;
      console.log(val);
      if(val.toUpperCase().indexOf(a) > -1)
      {
        arr[i].parentNode.parentNode.style.display="";
      }
      else
        arr[i].parentNode.parentNode.style.display="none";
    }
  }
</script>
</div>
<br>
<div class="topnav" id="myTopnav">
  <a href="home.php">Home</a>
  
  <a href="#foot">Contact</a>
  <a href="index.php">Categories</a>

  <a href="#about">About</a>
    <a href="login.php" ><span id="logoff" style="font-size: 14px;"> Login</span> <span style="font-size: 12px;position: absolute;"><?php echo $data['Names']; ?></span></a>

  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a> <a href="profile.php">Profile</a>
</div>

<?php
if($_SESSION['uid'])
{
  echo "<script type='text/javascript'>document.getElementById('logoff').innerHTML='Your orders'</script>";
}
?>