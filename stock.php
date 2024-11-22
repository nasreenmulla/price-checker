<Style>
table tr td  { border: 1px solid red;}


</Style>

<?php
$inv1=0;

$invno = array(11401,11407,11513,11715,12247,14409,16574,16672,1871,19522,21152,21355,22010,232,23298,27827,28215,29918,3012,3164,33279,36568,36610,480,551,5678,60435,6667,682,8357,8502,);
echo $x=count($invno);
$str =array('ABUHAMOUR','ALKHOR','ALMADINA','ALMAHA','ALMANSOOR','ALNOOR','ALWUKAIR','CITYWALK','DOWNTOWN','FUTURE','GHARRAFAH','JMALL','KHARTIYAT','MOQSS','MUAITHER','MUSHERIB','POPAYA','POPAYAEZ','POPAYAL','POPAYAMOQ','POPAYAV',
'POPEYECITY',
'QETYFAN',
'RAWDAT',
'ROCMOQ',
'SS',
'STORE',
'TYLOUSH',
'TYLOUSL',
'TYLOUSP',
'TYLOUSW',
'UMSALAL',
'VALUE',
'VALUE2',
'WAKRAH',
'WOQOOD'
);
$y = count($str);
$conn = oci_connect('SMART', 'SMARTQADIM48', 'mitssunlife.dyndns.org:1521/SMART');
// $query = "SELECT  COM_NO, STR_CODE, ITM_CODE,DESC_E, QTY_ON_HAND
// FROM DISTRIBUTIONS   ORDER BY COM_NO, STR_CODE, ITM_CODE";
for($i=0; $i<$x; $i++ ) { echo $invno[$i]; echo "-".$i."<br/>";
  //for($j=0 ;$y>$j; $j++ )
  // { echo $str[$j]; //echo $j."<br/>";
   $query="SELECT ITEMS.REF_CODE,
ITEMS.DESC_E, 
TRANSACTION_LINES.str_code,
TRANSACTION_LINES.TRANSHEAD_SERIAL,
TRANSACTION_LINES.TRANSHEAD_YEAR,
TRANSACTION_LINES.itm_code,
TRANSACTION_LINES.cost,
TRANSACTION_LINES.qty,
TRANSACTION_LINES.PRICE 
from 
ITEMS 
JOIN 
TRANSACTION_LINES 
ON 
ITEMS.ITM_CODE = TRANSACTION_LINES.ITM_CODE 
WHERE 
TRANSACTION_LINES.TRANSHEAD_YEAR=2023
AND TRANSACTION_LINES.TRANSTYP_CODE=1
AND TRANSACTION_LINES. TRANSHEAD_SERIAL = $invno[$i] 

  order by TRANSACTION_LINES.TRANSHEAD_SERIAL"; 
echo"<table><tr><td>REF_CODE</td> <td>Name</td> <td>store</td> <td>invoice no</td> <td>year</td> <td>cost</td><td>Qty</td><td>Tcost</td> <td>price</td></tr>";
  $stid = oci_parse($conn, $query);
  oci_execute($stid);						
  while (($row = oci_fetch_row($stid)) != false) {
    //  $query1 = "SELECT COM_NO, STR_CODE, ITM_CODE,QTY_ON_HAND FROM DISTRIBUTIONS where QTY_ON_HAND < $row[5] and ITM_CODE=$row[2]";
    // $stid1 = oci_parse($conn, $query1);
    // oci_execute($stid1, $mod = OCI_COMMIT_ON_SUCCESS);
    // while (($row1 = oci_fetch_row($stid1)) != false) { 
      for($j=0 ;$y>$j; $j++ )
       { echo $str[$j]."-".$row[2]; //echo $j."<br/>"; 
 if($str[$j]==$row[2]){
echo"<tr>";
echo "<td>".$row[0]."</td>
<td>".$row[1]."</td>
<td>".$row[2]."</td> 
<td>".$row[3]."</td>
<td>".$row[4]."</td>
<td>".$row[6]."</td>
<td>".$row[7]."</td>
<td>".$tot=$row[6]*$row[7]."</td> 
<td>".$row[8]."</td>";
echo"</tr>";

   }	else { echo"hello";} 

}}
}
 //echo $query;
  ?>