<?php

// Create the table with:
//   CREATE TABLE mytab (number_col NUMBER, varchar2_col varchar2(1),
//                       clob_col CLOB, date_col DATE);
$conn = oci_connect('SMART', 'SMARTQADIM48', 'mantech-pc/smart');
//$conn = oci_connect("hr", "hrpwd", "localhost/XE");
if (!$conn) {
    $m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

$stid = oci_parse($conn, "SELECT * FROM CLNC_PAT_CYCLE");

oci_execute($stid, OCI_DEFAULT); // Use OCI_DEFAULT OCI_DESCRIBE_ONLY if not fetching rows

echo "<table border=\"1\">\n";
echo "<tr>";

$ncols = oci_num_fields($stid);

for ($i = 1; $i <= $ncols; $i++) {
    $column_name  = oci_field_name($stid, $i);
   // $column_type  = oci_field_type($stid, $i);

    
    echo "<td>$column_name</td>";
   // echo "<td>$column_type</td>";
    echo "\n";
}

echo "</tr>\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC)) {echo "<tr>";
  foreach ($row as $item) {echo "<td>";
  echo $item." </td>";
  }
echo "</tr>";
}
echo "</table>";

// Outputs:
//    Name           Type
//    NUMBER_COL    NUMBER
//    VARCHAR2_COL  VARCHAR2
//    CLOB_COL      CLOB
//    DATE_COL      DATE
//drop_table($conn);
function create_table($conn)
{
    $stmt = oci_parse($conn, "create table hallo (test varchar2(64))");
    oci_execute($stmt);
    echo "Created table<br>\n";
}

function drop_table($conn)
{
    $stmt = oci_parse($conn, "drop table hallo");
    oci_execute($stmt);
    echo "Dropped table<br>\n";
}
oci_free_statement($stid);
oci_close($conn);

?>