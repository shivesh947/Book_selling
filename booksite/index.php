<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  #lffilter
  {
    height: 100vh; width: 20vw; position: absolute; background-color: grey;  padding: 10px;
  }
  #dataget
  {
    height: 100vh; width: 79vw; margin-left: 20vw; background-color: lightyellow; overflow-y: scroll;
  }
  .card
  {
    height: 306px;
    width: 12.9vw;
    float: left;
  }
  .card img
  {
    height: 200px;
    width: 13.1vw;
     padding: 9px;
  }
  @media screen and (max-width: 600px) {
  .card
  {
    width: 26.3vw;
    height: 240px;
  }
    .card img
  {
    height: 136px;
    width: 30.1vw;
    padding: 9px;
  }
  
}
@media screen and (max-width: 600px) {
  #lffilter
  {
    width: 30vw;
    padding: 0px;
  }
  #dataget
  {
    width: 69vw;
    margin-left: 30vw;
  }
  #lffilter #ml1
  {
    width: 29vw;
  }

  
}
</style>
</head>
<body>

<?php include('phpaddition/navbar.php'); ?>
<?php include('phpaddition/categories.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
 $(document).ready(function(){
  $("li").click(function()
  {
    var a=this.innerHTML.toUpperCase();
    var arr=document.getElementsByClassName('itemtype');
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
  });
  });
</script>
<div>

<div id="lffilter">
 

<?php include('filter.php'); ?>





 </div>
<div id="dataget">

  <?php include('bookshow.php'); ?>

 </div>
</div>


<?php include('phpaddition/footer.php'); ?>

</body>
</html>
