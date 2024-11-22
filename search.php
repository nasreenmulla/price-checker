abcd

<?php echo $_GET["item"];
											if (empty($_GET["item"])) { 
										
                                        
									
										
                    
				
									
                                    
										} else 
										{
                       
										  echo $item=$_GET['item'];
										  $conn = oci_connect('RAWNAQ', 'Mantech5co', 'rawnaqmain.DYNDNS.BIZ:1521/SMART');
										 echo  $query = "select PRICE,REF_CODE from SMART.PRICE_CHECKER WHERE BARCODE='$item'"  ;
											$stid = oci_parse($conn, $query);
										  oci_execute($stid);						
										  while (($row = oci_fetch_row($stid)) != false)
                       { 
                         echo number_format((float)$row[0], 2, '.', '');
                        
                       }
                    }
                         
                        
                   

                        
                    
?>                    