<?php
include('dbconnect.php');
?>
<?php
session_start();
if($_SESSION['uid'])
{
echo "<script type='text/javascript'>console.log('success')</script>";
$dp=$_SESSION['uid'];
$query="SELECT `Names`, `Mnums`, `Emails`, `Pass` FROM `loginstore` WHERE Emails='$dp'";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);

}
?>
<?php
$cartadd=$_POST['which'];
$idbook=$_POST['idbook'];
$dd=$data['Emails'];
echo $dd;
if($cartadd=='addtocart')
{
$quantbok=$_POST['quantbok'];
$query="INSERT INTO `$dd` (`addtocart`, `cartquan`) VALUES ($idbook,$quantbok)";
$run=mysqli_query($con,$query);
}
if($cartadd=='addtowish')
{
$query="INSERT INTO `$dd`(`wishlist`) VALUES ($idbook)";
$run=mysqli_query($con,$query);
}
?>