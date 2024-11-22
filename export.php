<?php 
//echo $_GET["query"];
$conn = oci_connect('SMART', 'SMARTQADIM48', 'alsalam.DYNDNS.BIZ:1521/SMART');
if (empty($_GET["query"])){ 
//mysqli_select_db($conn, 'crud');  
$query = "select CUST_ID, NAME_E, ADDRESS, MOBILE  from customers WHERE CUSTTYP_ID='5' and active='Y'"  ;
$stid = oci_parse($conn, $query);
oci_execute($stid);	
$columnHeader = '';  
$ncols = oci_num_fields($stid);		
//echo $columnHeader ="1";
for ($i = 1; $i <= $ncols; $i++) {
     $columnHeader = oci_field_name($stid, $i);
   
}  
$setData = '';  
  while ($rec = oci_fetch_row($stid)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
}
else{

     echo $query = $_GET['query'];
$stid = oci_parse($conn, $query);
oci_execute($stid);	
$columnHeader = '';  
$ncols = oci_num_fields($stid);		
//echo $columnHeader ="1";
for ($i = 1; $i <= $ncols; $i++) {
     $columnHeader = oci_field_name($stid, $i);
   
}  
$setData = '';  
  while ($rec = oci_fetch_row($stid)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
}





//echo "<br>";
//$columnHeader = "User Id" . "\t" . "First Name" . "\t" . "Last Name" . "\t";  
 

  
  

 ?> 
 