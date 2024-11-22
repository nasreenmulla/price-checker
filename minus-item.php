<Style>
table tr td  { border: 1px solid red;}


</Style>

<?php

$conn = oci_connect('SMART', 'SMARTQADIM48', 'malakia.dyndns.org:1521/SMART');
//$query = "SELECT DISTINCT COM_NO, STR_CODE, ITM_CODE, sum(QTY)
//FROM POS_TRANSACTIONS GROUP BY COM_NO, STR_CODE, ITM_CODE ORDER BY COM_NO, STR_CODE, ITM_CODE";
//$stid = oci_parse($conn, $query);
//oci_execute($stid);	
// $columnHeader = '';  
// $ncols = oci_num_fields($stid);		
// //echo $columnHeader ="1";
// for ($i = 1; $i <= $ncols; $i++) {
//      $columnHeader = oci_field_name($stid, $i);
   
// }  
// $setData = '';  
//   while ($rec = oci_fetch_row($stid)) {  
//     $rowData = '';  
//     foreach ($rec as $value) {  
//         $value = '"' . $value . '"' . "\t";  
//         $rowData .= $value;  
//     }  
//     $setData .= trim($rowData) . "\n";  
// }  
  
// header("Content-type: application/octet-stream");  
// header("Content-Disposition: attachment; filename=User_Detail.xls");  
// header("Pragma: no-cache");  
// header("Expires: 0");  

//   echo ucwords($columnHeader) . "\n" . $setData . "\n";  


// $query = "SELECT DISTINCT COM_NO, STR_CODE, POS.ITM_CODE,REF_CODE,DESC_E,SUM(QTY)
// FROM POS_TRANSACTIONS POS,ITEMS
// WHERE ITEMS.ITM_CODE=POS.ITM_CODE 
//  AND EXISTS(SELECT 1 FROM DISTRIBUTIONS DIST
//             WHERE POS.COM_NO=DIST.COM_NO
//               AND POS.STR_CODE=DIST.STR_CODE
//               AND POS.ITM_CODE=DIST.ITM_CODE
//               AND POS.DISTRIB_SERIAL=DIST.DISTRIB_SERIAL
//               AND DIST.QTY_ON_HAND=0)
// GROUP BY COM_NO, STR_CODE, POS.ITM_CODE, REF_CODE,DESC_E
// ORDER BY COM_NO, STR_CODE, ITM_CODE;
// SELECT DISTINCT COM_NO, STR_CODE, POS.ITM_CODE,REF_CODE,DESC_E,SUM(QTY)
//   FROM POS_TRANSACTIONS POS,ITEMS
//  WHERE ITEMS.ITM_CODE=POS.ITM_CODE AND POS.DAT < TO_DATE('12/31/2021 00:00:00', 'MM/DD/YYYY HH24:MI:SS')
//    AND EXISTS(SELECT 1 FROM DISTRIBUTIONS DIST
//               WHERE POS.COM_NO=DIST.COM_NO
//                 AND POS.STR_CODE=DIST.STR_CODE
//                 AND POS.ITM_CODE=DIST.ITM_CODE
//                 AND POS.DISTRIB_SERIAL=DIST.DISTRIB_SERIAL
//                 AND DIST.QTY_ON_HAND=0)
//   GROUP BY COM_NO, STR_CODE, POS.ITM_CODE, REF_CODE,DESC_E
//   ORDER BY COM_NO, STR_CODE, ITM_CODE";
$query = "SELECT  DISTINCT COM_NO, STR_CODE, POS.ITM_CODE,REF_CODE,DESC_E, SUM(QTY)
FROM POS_TRANSACTIONS POS,ITEMS
WHERE ITEMS.ITM_CODE=POS.ITM_CODE AND POS.DAT < TO_DATE('12/31/2023 00:00:00', 'MM/DD/YYYY HH24:MI:SS')
 AND EXISTS(SELECT 1 FROM DISTRIBUTIONS DIST
            WHERE POS.COM_NO=DIST.COM_NO
              AND POS.STR_CODE=DIST.STR_CODE
              AND POS.ITM_CODE=DIST.ITM_CODE
              AND POS.DISTRIB_SERIAL=DIST.DISTRIB_SERIAL
              AND DIST.QTY_ON_HAND < POS.QTY)
GROUP BY COM_NO, STR_CODE, POS.ITM_CODE, REF_CODE,DESC_E
ORDER BY COM_NO, STR_CODE, ITM_CODE";
echo"<table><tr><td>com</td> <td>str</td> <td>itm</td> <td>ref</td> <td>DESC</td> <td>qty</td><td>qty</td> </tr>";
  $stid = oci_parse($conn, $query);
  oci_execute($stid, $mod = OCI_COMMIT_ON_SUCCESS);						
  while (($row = oci_fetch_row($stid)) != false) {
    //  $query1 = "SELECT COM_NO, STR_CODE, ITM_CODE,QTY_ON_HAND FROM DISTRIBUTIONS where QTY_ON_HAND < $row[5] and ITM_CODE=$row[2]";
    // $stid1 = oci_parse($conn, $query1);
    // oci_execute($stid1, $mod = OCI_COMMIT_ON_SUCCESS);
    // while (($row1 = oci_fetch_row($stid1)) != false) { 
      
      
      echo"<tr>";
echo "<td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[2]."</td>";
echo"</tr>";

   // }	

}
//echo $query;
  ?>