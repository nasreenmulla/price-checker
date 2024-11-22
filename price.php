<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, user-scalable=1" />
<script>
function myFunction() {
   
    document.getElementById("item").focus();
    var elem = document.documentElement; 
  alert
    /* View in fullscreen */
  function openFullscreen() 
  {
    if (elem.requestFullscreen) 
      {

      elem.requestFullscreen();
      }   
    else if (elem.webkitRequestFullscreen) 
      { /* Safari */
         elem.webkitRequestFullscreen();
      } 
    else if (elem.msRequestFullscreen) 
      { /* IE11 */
        elem.msRequestFullscreen();
      }
  }
}

</script>
<style>
  html, body {  
   height: 99%;
  width:99%; 
  
  }
h3,h1,h2,h4{ margin:3px;}

form{ height:98%;
width:98%;
}

.full-height {
  height: 100%;
  position: relative;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
.bg{
  /* border: 1px solid yellow; */
  background-attachment:scroll;
  background-repeat: no-repeat;
  background-position: center;
  background-image:url("images/RAWNAQ-LOGO.jpg");
  background-size: 50% 50%;
}
.bg1{
  /* border: 1px solid green; */
  background-attachment:scroll;
  background-repeat: no-repeat;
  /*background-size:cover;*/
  background-position: center;
   background-color: rgb(202, 233, 238); /* Fallback color  */
 /*background-color: rgba(245, 255, 255, 0.6); /* Black w/ opacity */
 /* background-image:url("images/banner.jpg"); */
  margin:auto;
  top:25px;
  width:75%;
  height:500px;
  
  text-align:center;
  /* border: 3px solid blue; */
}
.modal {
  
  
  padding: 5px; 
  
}
  .scan{
    border: 3px solid blue;
     }
     .center {
  margin:auto;
  width: 100%;
  /* border: 5px solid green; */
   

}
.center1 {
  margin:auto;
  width: 98%;
  
  text-align:center;
  /* border: 3px solid blue; */
  /*bottom: 80px;*/
   
  }
  
  .right {
    
  position: absolute;
  text-align:center;
  width: 100%;
  
  
  
  }
   .right {
    
  position: absolute;
  text-align:center;
  width: 100%;
  
  
  
  }
.bottomleft {
  position:absolute;
  bottom: 5px;
  height:60px;
  margin:auto;
  width: 98%;
  
  text-align:center;
   
  display: block;

}
.lbl {
  bottom: 55px;
  position:absolute;
  height:50px;
  width:95%;
  font-size:25px;
  font-style:bold;
  text-align: center;
  
  

}
.inputtext{height:50px;
  width:40%;
  border: 0px;
  }
.inputtext[type=text]:focus {
  border: 1px solid #f1f1f1;
}
  .image {
    height:65px;
    padding:10px;
    width:231px;
     
    
     

  }
</style>

</head>
 
<body id="appin" onload="myFunction(),load(), openFullscreen()";>
<div class="bg full-height"  > 
  <div class="center1">
      <h2>Price checker</h2>
      
  </div>		
                      <div id="modal" class="center1 "> 
   
                            						 
<?php
											if (empty($_POST["item"])) { 
										?>

									<?php
										} else 
										{
                      ?>
                        <div class="bg1">
                           <div >
                            <img  class="image" src="images/Rawnaq.png" alt="logo">
                            <!-- <h3>Al Rawnaq Trading Company</h3> -->
                          </div>
                            
                      <?php
										       $item=$_POST['item'];
										         $conn = oci_connect('RAWNAQ', 'Mantech5co', 'rawnaqmain.DYNDNS.BIZ:1521/SMART');
										       $query = "select PRICE,REF_CODE from SMART.PRICE_CHECKER WHERE BARCODE='$item'"  ;
											      $stid = oci_parse($conn, $query);
										        oci_execute($stid);
                           
										         while (($row = oci_fetch_row($stid)) != false)
                              {   
                                 echo '<div><br><h1>Price QR '. number_format((float)$row[0], 2, '.', ''). "</h1></div>";
                                  
                                  echo '<div><h3>Barcode '.$row[1]. "</h3>";
                                  echo"</div>"; 
                              }
                               
                              $count=oci_num_rows($stid);
     
                            if ($count == 0)
                              {
                              
                              echo "No record found";
                              }
                              else
                              {
                                	 echo $count;

                              }
                                                        
                         ?>      
                       </div><script>

function load()
{
setTimeout("window.open('price.php', '_self');", 5000);
}
 
 
</script>

                         <?php
                         oci_close($conn);

                    }    

                    
                    
?>                    

<div class="lbl">SCAN HERE</div>	
        <div class="bottomleft">
          
          <form action="price.php" method="post" enctype="multipart/form-data" name="emiserach" target="_self">
            
            <input type="text" name="item" id="item" class="inputtext">
            
          </form>
        </div>
            

                 </div>
<script>

// var elem = document.getElementById("appin");
// function openFullscreen() {
//   if (elem.requestFullscreen) {
//     elem.requestFullscreen();
//   } else if (elem.webkitRequestFullscreen) { /* Safari */
//     elem.webkitRequestFullscreen();
//   } else if (elem.msRequestFullscreen) { /* IE11 */
//     elem.msRequestFullscreen();
//   }
// }
</script>
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</body>
</html>