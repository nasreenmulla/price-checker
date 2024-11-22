<!doctype = HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Emi search</title>
</head>

<body>

<form action="index1.php" method="post" enctype="multipart/form-data" name="emiserach" target="_self">
  <label for="emi">Enter Emi</label>
  <input type="text" name="emi" id="emi">
  <!-- <input type="submit" name="Submit" id="Submit" value="Submit"> -->
</form>
<?php
$emi='0';
$emi=$_POST['emi'];
//echo $emi;
$db = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)
(HOST = ALSALAM.DYNDNS.BIZ)(PORT=1521))
(CONNECT_DATA=(SERVER=DEDICATED)
(SID= ORCL)))";

 //phpinfo();
//$c = oci_connect('MEVN', 'stack', $db);
$conn = oci_connect('SMART', 'SMARTQADIM48', 'rawnaqmain.dyndns.biz:1521/SMART');
//$query = 'select table_name from user_tables';
//$query='SHOW COLUMNS FROM ITEM_SERIALS';
//$query = "select ITM_CODE, PRICE,DESC_E  from price_modifiers WHERE ITM_CODE='$emi'" ;
$query = "select ITM_CODE, PRICE,DESC_E  from DISTRIBUTIONS WHERE ITM_CODE='$emi'" ;

$stid = oci_parse($conn, $query);
oci_execute($stid, OCI_DEFAULT);echo "<table border='1'>";
while ($row = oci_fetch_array($stid, OCI_ASSOC)) {echo "<tr>";
  foreach ($row as $item) {
     
    echo "<td>";
  echo $item." </td>";
  }
  
echo "</tr>";
}
echo "</table>";
//echo md5("admin123");
 
$query = "SELECT REF_CODE FROM ITEMS WHERE ITM_CODE='$emi'";
$stid = oci_parse($conn, $query);
oci_execute($stid, OCI_DEFAULT);echo "<table border='1'>";
while ($row = oci_fetch_array($stid, OCI_ASSOC)) {echo "<tr>";
  foreach ($row as $item) {echo "<td>";
  echo $item." </td>";
  }
echo "</tr>";
}
echo "</table>";
oci_free_statement($stid);
oci_close($conn);
// Connects to the XE service (i.e. database) on the "localhost" machine
/*$conn = oci_connect('smart', 'mantechsmart2008', 'mantech-PC');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT * FROM employees');
oci_execute($stid);

echo "<table border='1'>\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";*/

?>
<!--//Example #2 Basic oci_connect() using a Network Connect name
-->
<?php

// Connects to the MYDB database described in tnsnames.ora file,
// One example tnsnames.ora entry for MYDB could be:
//   MYDB =
//     (DESCRIPTION =
//       (ADDRESS = (PROTOCOL = TCP)(HOST = mymachine.oracle.com)(PORT = 1521))
//       (CONNECT_DATA =
//         (SERVER = DEDICATED)
//         (SERVICE_NAME = XE)
//       )
//     )

/*$conn = oci_connect('hr', 'welcome', 'MYDB');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT * FROM employees');
oci_execute($stid);

echo "<table border='1'>\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";

*/?>
<!--Example #3 oci_connect() with an explicit character set
-->
<?php /*

$conn = oci_connect('hr', 'welcome', 'localhost/XE', 'AL32UTF8');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT * FROM employees');
oci_execute($stid);

echo "<table border='1'>\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";
*/
?>
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ajax_info.txt", true);
  xhttp.send();
}
</script>
</body>
</html>