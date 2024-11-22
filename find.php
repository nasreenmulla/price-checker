<html>
<head>
<script>

</script>
</head>
<body>
<?php 
$balance='0';
$totalcr='0';
$totaldr='0';
$conn = oci_connect('SMART', 'SMARTQADIM48', 'DESKTOP-SLVIHF1:1521/SMART');
$query = "select VOUD_DAT,VOUTYP_CODE,VOU_SERIAL,REMARKS,DUE_DAT,DR,CR from  VOUCHER_LINES WHERE  VOU_YEAR='2024' and ACC_NO='1-14010202'" ;
$stid = oci_parse($conn, $query);
										        oci_execute($stid);
                           echo '<table>';
                           echo '<tr><td>date</td><td>Type</td><td>Voucher No</td><td>Remarks </td><td>Deu</td><td>Description</td><td>Debit</td>
                           <td>Credit</td><td>Balance</td>';
										         while (($row = oci_fetch_row($stid)) != false)
                              {   
                                 echo '<tr><td> '.$row[0]. "</td>";
                                  
                                  echo '<td>'.$row[1]. "</td>";
                                  echo '<td>'.$row[2]. "</td>";
                                  echo '<td>'."</td>";
                                  echo '<td>'."</td>";
                                  echo '<td>'.$row[3]. "</td>";
                                  echo '<td>'.$row[5]. "</td>";
                                  echo '<td>'.$row[6]. "</td>";
                                   
                                  echo '<td>'.$balance=$row[5]. "</td>";
                                  
                                  
                                  
                                  echo"</tr>"; 
                                  $totaldr = $totaldr+$row[5];
                                  $totalcr = $totalcr+$row[6];
                                  $balance += $row[5];

                              }
                              echo  '<tr><td>'.$totalcr."</td><td>".$totaldr.'</td></tr>';
                              
                              echo '</table>';
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
<div>
<p><b>Start typing a name in the input field below:</b></p>
<form action="">
  <label for="fname">First name:</label>
  <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)">
</form>
<p>Price: <span id="txtHint"></span></p>
</div>
</body>
</html>
