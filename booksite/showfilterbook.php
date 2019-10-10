<?php
include('phpaddition/dbconnect.php');
?>
<?php

$datapost1 =$_GET['datapost1'];
$datapost2 =$_GET['datapost2'];
$datapost3 =$_GET['datapost3'];
$datapost4 =$_GET['datapost4']+10;
$datapost4b =$_GET['datapost4b'];

  $vl1="Price<=$datapost1";

  

  $vl3=" language='$datapost3'";

  $vl4=" Discount<='$datapost4'";

  $vl4b=" Discount>='$datapost4b'";

  $QU=$vl1;
  if($datapost2=="ck")
  {
    $vl2=" Itmstock>=0 ";
    $QU=$QU." AND " .$vl2;
  }
  if($datapost2=="notck")
  {
    $vl2="Itmstock>0";
    $QU=$QU." AND " .$vl2;
  }
  if($datapost3!=NULL&&$datapost3!="Language")
  {
    $QU=$QU." AND ".$vl3;
  }
  if($datapost4!="")
  {
    $QU=$QU." AND ".$vl4;
  }
  if($datapost4b!="")
  {
    $QU=$QU." AND ".$vl4b;
  }

$query="SELECT `ItmName`, `Type`, `Itmstock`, `SrcImage`, `Description`, `Price`, `ItmId`, `Discount`,`language` FROM `items` where $QU ";




$count=0;
if($run=mysqli_query($con,$query))
    {
      while($data=mysqli_fetch_assoc($run))
      {
        ?>
        <form action="viewbook.php" method="post" id="ff" class="card">
            <a href="#">
             <?php $count=1;?>
            <p style="padding: 9px;" class="itemtype"><?php echo $data['Type']; ?></p>
            <img src="<?php echo $data['SrcImage']; ?>"/>
            <p style="padding: 9px;" class="itemname"><?php echo $data['ItmName']; ?></p>
            <input type="hidden"  name="ids" value="<?php echo $data['ItmId']; ?>">
            </a>
          </form>
        <?php
      }
    }
 if($count==0)
  {
    echo "<h1>no book find</h1>";
  }
   
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.card').click(function(){
      $(this).submit();
    });
  });
</script>
