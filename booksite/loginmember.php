<?php
include('phpaddition/dbconnect.php');
?>
<?php
session_start();
if($_SESSION['uid'])
{
    include('profile.php'); 
}
else
{
$mnum=$_POST['Mnum'];
$pass=$_POST['pass'];

$quer="SELECT `Names`, `Mnums`, `Emails`, `Pass` FROM `loginstore` WHERE Mnums=$mnum AND Pass=$pass";
$runname=mysqli_query($con,$quer);
    $comrun=mysqli_num_rows($runname);
    //comrun return numbers of rows
    if($comrun<1)
    {
      ?>
       <script type="text/javascript">
         alert("wrong id and password");
         window.open('login.php','_self')
       </script>
      <?php
    }
    else
    {
      $data=mysqli_fetch_assoc($runname);
      session_start();
      $_SESSION['uid']=$data['Emails'];
      header("location:profile.php");
    }
}
?>
