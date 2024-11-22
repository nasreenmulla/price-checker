<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
<script>
function myFunction() {
   
  document.getElementById("item").focus();
}
</script>
<style>
			table.d {
  table-layout: auto;
  width: 100%;  
}
  

		</style>
<!-- <style> 
  html, body {
  height: 99%;
}

.full-height {
  height: 100%;
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
  border: 1px solid green;
  background-attachment:scroll;
  background-repeat: no-repeat;
  background-position:center;
  background-image:url("images/banner1.jpg");
}
  .scan{
    border: 3px solid blue;
     }
     .center {
  margin:auto;
  width: 100%;
  border: 3px solid green;
  padding: 10px;

}
.center1 {
  margin:auto;
  width: 50%;
   
  
  }
  .right {
    
  position: absolute;
  left: 475px;
  width: 50%;
  
  
  
  }
.bottomleft {
  position: absolute;
  bottom: 10px;
  height:50px;
  width: 50%;
  border: 3px solid #8AC007;
}
.lbl {
  position: absolute;
  bottom: 60px;
  font-size:25px;
  font-style:bold;
  width: 51%;
  text-align: center;
  background-image:url("images/pc051.jpg");
  background-attachment: strcoll;

}
.inputtext{height:50px;
  width: 50%;}
</style>-->
</head>
<body onload="myFunction()">

<div>
<?php
											//if (empty($_POST["item"])) { 
										?>
									
										<div class="center1">
											<h2>Price checker</h2>
											<div></div>
										</div>									 
									
				
									<?php
									//	} else CUST_ID	NAME_E	NAME_A	LOCATION	ADDRESS	PHONE	MOBILE
										//{
										//$item=$_POST['item'];
										$conn = oci_connect('SMART', 'SMARTQADIM48', 'Hosney-Rawnaq:1521/SMART');
										// $conn = oci_connect('SMART', 'SMARTQADIM48', 'rawnaqmain.dyndns.biz:1521/SMART');
										//if(!$conn) echo "Connection failed";
										 $query = "select CUST_ID, NAME_E, ADDRESS, MOBILE  from customers WHERE CUSTTYP_ID='5' and active='Y'"  ;
										///$query = "select DISTINCT ITM_CODE, PRICE, ITM_NAME_E,BARCODE, REF_CODE  from DISTRIBUTIONS_VIEW WHERE barcode='$item'and STR_CODE='STORE'" ;
										$stid = oci_parse($conn, $query);
										oci_execute($stid);						
										echo '<div class="table-wrapper"><table class="alt d">';
echo "<tr>";

$ncols = oci_num_fields($stid);

for ($i = 1; $i <= $ncols; $i++) {
    $column_name  = oci_field_name($stid, $i);
   //  $column_type  = oci_field_type($stid, $i);

    
     echo "<td>".$column_name."</td>";
     //echo "<td>$column_type</td>";
    
}

echo "</tr>";
while ($row = oci_fetch_row($stid)) {echo "<tr>";
  foreach ($row as $item) {
    if($item=='044656')
  // echo  $query = "select S.STR_CODE,S.COM_NO C.PAT_ACC_NO FROM  STORES S INNER JOIN COMPANIES C ON C.COM_NO=S.COM_NO";
    exit();
    echo "<td>";
    
    echo $item; 
   $data[]=$item;
   
  echo " </td>";
  }
echo "</tr>";
}
	echo"</table></div>	";									
           //   }
								
           header("Content-type: application/octet-stream");  
           header("Content-Disposition: attachment; filename=User_Detail.xls");  
           header("Pragma: no-cache");  
           header("Expires: 0");  
           
              ucwords($columnHeader) . "\n" . $setData . "\n";  							
						?>
<!-- <div class="center1"><form action="price.php" method="post" enctype="multipart/form-data" name="emiserach" target="_self">
								
								<div class="row">
                
								
								 
								
								 
									<div ><label for="emi" class="lbl">Scan barcode</label>
										<input type="text" name="item" id="item" class="inputtext  bottomleft" >
									</div> 
								
							</form></div></div> -->

</body>
</html>