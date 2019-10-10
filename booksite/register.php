   <?php
include('phpaddition/dbconnect.php');
?>
   <?php
    $na=$_POST['usrname'];
    $mo=$_POST['monum'];
    $em=$_POST['email'];
    $pas=$_POST['passcode'];
    $emailcheck="SELECT `Names`, `Mnums`, `Emails`, `Pass` FROM `loginstore` WHERE Emails='$em'";
    $runcheck=mysqli_query($con,$emailcheck);
    echo $em;
    if (!$runcheck)
    echo(mysqli_error($con));
    if(mysqli_num_rows($runcheck)<=0)
    {
    //session_destroy();
    $rquer="INSERT INTO `loginstore`(`Names`, `Mnums`, `Emails`, `Pass`) VALUES ('$na','$mo','$em','$pas')";
    $rrunname=mysqli_query($con,$rquer);
    $createtable="CREATE TABLE `ekarts`.`$em` ( `wishlist` INT NOT NULL , `addtocart` INT NOT NULL , `cartquan` INT NOT NULL ) ENGINE = InnoDB;";
      $rrutab=mysqli_query($con,$createtable);
      session_start();
      $_SESSION['uid']=$em;
      header("location:profile.php");
    }
    else
    {
      ?>
      <script type="text/javascript">
         alert("This Email is already register");
         window.open('login.php','_self')
       </script>
      <?php
    }
    ?>