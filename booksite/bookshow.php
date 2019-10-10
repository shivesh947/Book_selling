<?php
include('phpaddition/dbconnect.php');
?>
<?php
$query="SELECT `ItmName`, `Type`, `Itmstock`, `SrcImage`, `Description`, `Price`, `ItmId`, `Discount` FROM `items` WHERE Itmstock>0";
if($run=mysqli_query($con,$query))
    {
    	while($data=mysqli_fetch_assoc($run))
    	{
    		?>
    		<form action="viewbook.php" method="GET" id="ff" class="card">
            <a href="#">
            <p style="padding: 9px;" class="itemtype"><?php echo $data['Type']; ?></p>
            <img src="<?php echo $data['SrcImage']; ?>"/>
            <p style="padding: 9px;" class="itemname"><?php echo $data['ItmName']; ?></p>
            <input type="hidden"  name="ids" value="<?php echo $data['ItmId']; ?>">
            </a>
            </form>
    		<?php
    	}
    }
    else echo"wrong";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	  $('.card').click(function(){
	  	$(this).submit();
	  });
	});
</script>
