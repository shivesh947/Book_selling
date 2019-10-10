<?php
session_start();
if($_SESSION['uid'])
{
    echo "<script type='text/javascript'>console.log('success')</script>";
}
else
{
	header('location:home.php');
}

?>
<?php
include('phpaddition/dbconnect.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	.card
	{
	height: 25vh;
    width: 10vw;
    float: left;
    padding-left: 9px;
	}
	.card img
   {
    height: 25vh;
    width: 10vw;
   }
   @media screen and (max-width: 600px)
   {
   	.card 
	{
	width: 15vw;
	height: 10vh;
	}
	.card img
	{
	width: 15vw;	
	height: 10vh;
	}
   }
</style>
<body>
<?php include('phpaddition/navbar.php'); ?>
<section>

<div id="leftpp" style="width: 20vw; height: 100vh;float: left;  background-color: grey;">
	<?php
$dp=$_SESSION['uid'];
$query="SELECT `Names`, `Mnums`, `Emails`, `Pass` FROM `loginstore` WHERE Emails='$dp'";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);
echo $data['Names'];
echo $data['Mnums'];
echo $data['Emails'];
echo $data['Pass'];
?>
<a href="logout.php"><input type="button" value="logout" name=""></a>

</div>
<div id="rightpp" style="width: 79vw; height: 100vh; margin-left: 20vw; background-color: lightpink;">
	<div id="rightpp" style="overflow-y: scroll; width: 70vw; height: 100vh; margin-left: 5vw; background-color: tomato;">
		<div>

			<input type="button" value="WishList" name="" id="wishopen" class="fildiv">
	        <input type="button" value="Cart" name="" id="crtopen" class="fildiv">
	        <input type="button" value="History" name="" class="fildiv">
	        <style type="text/css">
	        	.fildiv{width: 22vw;height: 7vh;}
	        </style>
		</div>
		<hr>
		<div id="WishList">
			<?php 
			$dp=$_SESSION['uid'];
			$qur="SELECT *FROM `$dp`";
            if($wishrun=mysqli_query($con,$qur))
            {
    	    while($wishdata=mysqli_fetch_assoc($wishrun))
    	    {
    	    $go=$wishdata['wishlist'];
    	    if($go!=0)
    	    {
    	 	$query="SELECT `ItmName`, `Type`, `Itmstock`, `SrcImage`, `Description`, `Price`, `ItmId`, `Discount` FROM `items` where ItmId = $go ";
    	 	$wisun=mysqli_query($con,$query);
    	 	$wishreturn=mysqli_fetch_assoc($wisun);
    		?>
    		<form action="viewbook.php" method="GET" id="ff" class="card">
            <a href="#">
            <p style="padding: 9px;" class="itemtype"><?php echo $wishreturn['Type']; ?></p>
            <img src="<?php echo $wishreturn['SrcImage']; ?>"/>
            <p style="padding: 9px;" class="itemname"><?php echo $wishreturn['ItmName']; ?></p>
            <input type="hidden"  name="ids" value="<?php echo $wishreturn['ItmId']; ?>">
            </a>
            </form>

    		<?php
    		}
    	    }
            }
            else echo"wrong";
			?>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
		
		<div id="Cart">
			<?php 
			$dp=$_SESSION['uid'];
			$qur="SELECT *FROM `$dp`";
            if($atcrtrun=mysqli_query($con,$qur))
            {
    	    while($atcrtdata=mysqli_fetch_assoc($atcrtrun))
    	    {
    	    $go=$atcrtdata['addtocart'];
    	    if($go!=0)
    	    {
    	 	$query="SELECT `ItmName`, `Type`, `Itmstock`, `SrcImage`, `Description`, `Price`, `ItmId`, `Discount` FROM `items` where ItmId = $go ";
    	 	$atcrtun=mysqli_query($con,$query);
    	 	$atcrtreturn=mysqli_fetch_assoc($atcrtun);
    		?>
    		<form action="viewbook.php" method="GET" id="ff" class="card">
            <a href="#">
            <p style="padding: 9px;" class="itemtype"><?php echo $atcrtreturn['Type']; ?></p>
            <img src="<?php echo $atcrtreturn['SrcImage']; ?>"/>
            <p style="padding: 9px;" class="itemname"><?php echo $atcrtreturn['ItmName']; ?></p>
            <input type="hidden"  name="ids" value="<?php echo $atcrtreturn['ItmId']; ?>">
            </a>
            </form>

    		<?php
    		}
    	    }
            }
           else echo"wrong";
			?>
			
		</div>
		<div id="History">
			
		</div>
   </div>
</div>
</section>
<?php include('phpaddition/footer.php'); ?>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	  $('.card').click(function(){
	  	$(this).submit();
	  });
	});

	$(document).ready(function(){
	  $('#wishopen').click(function(){
	  	$('#WishList').slideToggle();
	  });
	});
	$(document).ready(function(){
	  $('#crtopen').click(function(){
	  	$('#Cart').slideToggle();
	  });
	});
	if(document.getElementById('wishopen').style.display=="none")
	{
		document.getElementById('crtopen').style.display="block";
	}
	if(document.getElementById('crtopen').style.display=="none")
	{
		document.getElementById('wishopen').style.display="block";
	}
    
</script>