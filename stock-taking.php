<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, user-scalable=1" />
<script>
function myFunction() {
   
  document.getElementById("item").focus();
  var elem = document.documentElement;

/* View in fullscreen */
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { /* Safari */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE11 */
    elem.msRequestFullscreen();
  }
}
}

</script>
<Style>
table tr td  { border: 1px solid red;}


</Style>
</head>
 
<body id="appin" onload="myFunction(),load(), openFullscreen()";>
<div class="bg full-height"  > 
<div class="lbl">SCAN HERE</div>	
        <div class="bottomleft">
          
          <form action="stock-taking.php" method="post" enctype="multipart/form-data" name="emiserach" target="_self">
            
            <input type="text" name="item" id="item" class="inputtext">
            
          </form>
        </div>
            

                 </div>
</div>
<?php
if (empty($_POST["item"])){ echo $_POST["item"]; }else { $ITM=$_POST["item"];
$conn = oci_connect('SMART', 'SMARTQADIM48', 'DESKTOP-SLVIHF1/SMART');
$query = "SELECT  STKTAKCON_SERIAL
FROM STOCKTAKING_CONTROLS  WHERE DAT_FINISH is null ";
echo"<table><tr><td>com</td> <td>Store</td> <td>Item code</td> <td>DESC</td> <td>Barode</td> <td>Qty</td></tr>";
  $stid = oci_parse($conn, $query);
  oci_execute($stid);						
  while (($row = oci_fetch_row($stid)) != false) {
    $stkcontrol= $row[0];
    
      
      echo"<tr>";
//echo "<td>".$row[0]."</td>";
//<td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>.".$row[2]."-1</td><td>".$row[4]."</td>";
echo"</tr>";

   // }	

}
$query1= "SELECT  ITM_CODE, DISTRIB_SERIAL FROM STOCKTAKING_LINES  WHERE STKTAKHD_SERIAL = $stkcontrol AND ITM_CODE =$ITM ";
echo $query1;
$stid1 = oci_parse($conn, $query1);
 echo  oci_execute($stid1);						
  while (($row1 = oci_fetch_row($stid1)) != false) { echo"<tr>";
    echo "<td>".$row1[0]."</td><td>".$row1[1]."</td>";
    echo"</tr>";
}
}
  ?>
</body>
</html>