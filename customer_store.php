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
										$conn = oci_connect('SMART', 'SMARTQADIM48', 'DESKTOP-SLVIHF1/SMART');
										// $conn = oci_connect('SMART', 'SMARTQADIM48', 'rawnaqmain.dyndns.biz:1521/SMART');
										//if(!$conn) echo "Connection failed";
                                        
                                         $sql = "SELECT TRANSHEAD_SERIAL, TRANSHEAD_YEAR from TRANSACTION_HEADERS WHERE COM_NO=1 AND STR_CODE='CLINIC01'AND TRANSHEAD_YEAR=2024 AND DAT> SYSDATE-1 ORDER BY TRANSHEAD_SERIAL DESC ";

                                        // Prepare the SQL statement
                                        $statement = oci_parse($conn, $sql);
                                        
                                        // Bind a PHP variable to the Oracle placeholder (bind variable)
                                        //$bind_variable_value = 'some_value';
                                       // oci_bind_by_name($statement, ':bind_variable', $bind_variable_value);
                                        
                                        // Execute the SQL statement
                                        oci_execute($statement);
                                        while (($row = oci_fetch_array($statement, OCI_ASSOC + OCI_RETURN_NULLS)) !== false){
                                            foreach ($row as $key => $value) {echo $value."-"; 
                                            }echo "<br />";
                                         //echo  $storec="INSERT INTO STORE_CUSTOMERS (COM_NO , STR_CODE , CUST_ID , CREDIT_LIMIT,MAX_CREDIT_INVOICES_NO, PRICE_ACCESS, PAYTRM_CODE, ACTIVE , DISCOUNT_PERCENTAGE, BONUS_BALANCE, ACC_COM_NO , ACC_NO )
                                           // VALUES ($value , REC.STR_CODE , :CUSTOMERS.CUST_ID , 5000000, null,1, 1,'Y',  0, 0 , $value , $value||'-'||$value)";  
                                        }

if ($row) {
    // Ensure 'numeric_column' is a numeric type column
    ECHO $numericValue = (float) $row[0]; // Cast to float or appropriate numeric type
    // Store it in a PHP variable or use it as needed
    $variable = $numericValue;
} else {
    echo "No rows fetched or query returned zero rows.";
}

// Free resources
oci_free_statement($statement);
oci_close($conn);

                                        ?>				
										

</body>
</html>