  
  <form onreset="rangess(this)">
    <span style="font-size: 4vh;">Filters</span>
     
 <h2>Min :<input onchange="rangess(this)" id="ml1" type="range" min="50" max="2000" name="">:Max</h2>

 


 <select id="ml3" onchange="rangess(this)">
   <option>Language</option>
   <option>English</option>
   <option>Hindi</option>
 </select><br><br>

 <input type="button" id="dropdis" value="DISCOUNT" name="">
 <div id="dis">
   <input type="checkbox" onclick="rangess(this)" class="disfil" value="60">More than 60%<br>
   <input type="checkbox" onclick="rangess(this)" class="disfil" value="50">50% - 60%<br>
   <input type="checkbox" onclick="rangess(this)" class="disfil" value="40">40% - 50%<br>
   <input type="checkbox" onclick="rangess(this)" class="disfil" value="30">30% - 40%<br>
   <input type="checkbox" onclick="rangess(this)" class="disfil" value="20">20% - 30%<br>
   <input type="checkbox" onclick="rangess(this)" class="disfil" value="10">10% - 20%<br>
   <input type="checkbox" onclick="rangess(this)" class="disfil" value="0">Upto 10%<br>
 </div><br>
 <script type="text/javascript">
   $(document).ready(function(){
    $('#dropdis').click(function(){
      $('#dis').slideToggle();
    });
   });
 </script>

 <h3><input type="checkbox" onclick="rangess(this)" id="ml2" value="notck" name="">:Include out of Stock</h3><br>

 <input type="reset" onclick="rangess()"  value="No filter" name="" style="margin-left: 6px;width: 87px;">

</form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    function rangess(eve)
    {
      var dval1=document.getElementById('ml1').value;
      var dval2=document.getElementById('ml2').value;
            if(document.getElementById('ml2').checked==true)
            {
              document.getElementById('ml2').value="ck";
              dval2="ck";
            }
            else
            {
              document.getElementById('ml2').value="notck";
              dval2="notck";   
            }
      var dval3=document.getElementById('ml3').value;
      var dval4="100";
      var dval4b="0";
    
      var x = document.getElementsByClassName("disfil");
      for(var i=0;i<7;i++)
      {
        if(x[i].checked==true)
        {
          dval4=x[i].value;
          break;
        }
      }
       for(var i=6;i>=0;i--)
      {
        if(x[i].checked==true)
        {
          dval4b=x[i].value;
          break;
        }
      }












      $.ajax({
        url : 'showfilterbook.php',
        type : 'GET',
        data : {
          datapost1 : dval1,
          datapost2 : dval2,
          datapost3 : dval3,
          datapost4 : dval4,
          datapost4b : dval4b
           
      },
        success : function(result)
        {
          $('#dataget').html(result);
        }
      });
    }
  </script>