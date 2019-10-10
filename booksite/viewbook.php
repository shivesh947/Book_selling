<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	#lft
	{
		position: absolute;
		height: 70vh;
		width: 30vw;
		background-color: tomato;
	}
	#rgt
	{
		position: absolute;
		height: 70vh;
		width: 69vw;
		margin-left: 30vw;
		background-color:lightpink;
	}
	.card
	{
		height: 70vh;
		width: 30vw;
	}
	.card img
   {
    height: 70vh;
	width: 30vw;
   }
    @media screen and (max-width: 600px) {
    #rgt #lft
    {
    	height: 38vh;
    }
  .card
  {
    height: 38vh;
    width: 48vw;
  }
    .card img
  {
    height: 38vh;
    width: 48vw;
  }

</style>
<body>
<?php include('phpaddition/navbar.php'); ?>
<div>
 <div style="height: 70vh; width: 30vw; position: absolute; background-color: blue;">
  
<?php
include('phpaddition/dbconnect.php');
?>
<?php
$id=$_GET['ids'];
$query="SELECT `ItmName`, `Type`, `Itmstock`, `SrcImage`, `Description`, `Price`, `ItmId`, `Discount` FROM `items` WHERE ItmId='$id'";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);
?>
    		<div class="card">
            <a href="#">
            <img src="<?php echo $data['SrcImage']; ?>">
            </a>
            </div>

</div>

<div style="height: 70vh; width: 69vw; margin-left: 30vw; background-color: lightyellow;">
  <div style="width: 40vw;">
   <h2><p> <?php echo $data['ItmName']; ?> </p></h2><h3><p> <?php echo $data['Type']; ?> </p><span id="count"></span></h3>
  
   <input type="button" value="<?php echo $data['Price']; ?>" name="">

   <hr>
   <input type="button" onclick="addtocartfun()" id="Addtcrt" style="padding: 18px 8px;border-radius: 2px;cursor: pointer; box-shadow: 0 1px 2px 0 rgba(0,0,0,.2);width: 45%;border: none;float: left;background-image: linear-gradient( #f42009,#fcc567);color: #fff;border-radius: 12px;" value="Add to Cart" >
   <input type="button" onclick="addtowishlist()" style="padding: 18px 8px;border-radius: 2px;box-shadow: 0 1px 2px 0 rgba(0,0,0,.2); cursor: pointer; width: 45%;border: none;border-radius: 12px;background-image: linear-gradient( #f42009,#fcc567);color: #fff;margin-left: 20px;" value="Wish list" name="">
   <br><br>
   Quantity:<select id="qunt">
     <option>1</option>
     <option>2</option>
     <option>3</option>
     <option>4</option>
   </select>
   <p><h3><?php echo $data['Description']; ?></h3></p><hr>
  </div>
  <div>
 	
  </div>
</div>
<?php
$io=$data['ItmId'];
$query1="SELECT `Itmstock` FROM `items` where ItmId = $io ";
$run1=mysqli_query($con,$query1);
$dqu=mysqli_fetch_assoc($run1);
if($dqu['Itmstock']<100)
{
  if($dqu['Itmstock']==0)
  {
  echo "<script> document.getElementById('Addtcrt').disabled='true';</script> ;";
  }
  else
  echo "<script> document.getElementById('count').innerHTML='hurruy up only ".$dqu['Itmstock']." are left'</script> ;";
}

?>

</div>

<?php include('phpaddition/footer.php'); ?>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<?php echo "<script> var cd=".$data['ItmId'].";" ;?>
  function addtocartfun()
  {
    var a=document.getElementById('qunt').value;
    var idbok=cd;
    $.ajax({
        url : 'profile/addtocart.php',
        type : 'POST',
        data : {
           which : 'addtocart',
           idbook : idbok,
           quantbok : a  
      },
        success : function(result)
        {
          alert("Add to cart");
        }
      });
  }
   function addtowishlist()
  {
    var idbok=cd;
    $.ajax({
        url : 'profile/addtocart.php',
        type : 'POST',
        data : {
           which : 'addtowish',
           idbook : idbok
      },
        success : function(result)
        {
          alert("Add to Wishlist");
        }
      });
  }
</script>
