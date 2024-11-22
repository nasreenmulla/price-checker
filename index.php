<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Elements - Spectral by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	</head>
	<script>
function myFunction() {
   
  document.getElementById("item").focus();
}
</script>
	<style>
.barcode {
  /* Use the name of the face that is installed, or the one you defined above */
  font-family: '3 of 9 Barcode'!important;
  font-size: 22px;
}
.bottomleft {
  position:absolute;
  bottom: 35px;
  height:60px;
  margin:auto;
  width: 98%;
  
  text-align:center;
   
  display: block;

}
	</style>
<body class="is-preload" onload="myFunction()" >
	
	<?php
	//include_once("find.php");
	?>
				
	<div id="landing page-wrapper">

<!-- Header 
		<header id="header">
			<h1><a href="index.php"></a></h1>
			<nav id="nav">
				<ul>
					<li class="special">
						<a href="#menu" class="menuToggle"><span>Menu</span></a>
						<div id="menu">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li><a href="generic.html">Generic</a></li>
								<li><a href="elements.html">Elements</a></li>
								<li><a href="#">Sign Up</a></li>
								<li><a href="#">Log In</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</nav>
		</header>
-->
<section id="one" class="wrapper style1 special">
						<div class="inner">
						<?php
											if (empty($_POST["item"])) { 
										?>
									
										<div class="inner">
											<h2>Price checker</h2>
											<div></div>
										</div>									 
									
				
									<?php
										} else 
										{
										$item=$_POST['item'];
										$conn = oci_connect('RAWNAQ', 'Mantech5co', 'RAWNAQMAIN.dyndns.BIZ:1521/SMART');
										// $conn = oci_connect('SMART', 'SMARTQADIM48', 'rawnaqmain.dyndns.biz:1521/SMART');
										//if(!$conn) echo "Connection failed";
										// $query = "select ITM_CODE, PRICE,DESC_E  from DISTRIBUTIONS WHERE ITM_CODE='$item' and str_code='store13'"  ;
										$query = "select PRICE from SMART.PRICE_CHECKER WHERE BARCODE='$item'";
										$stid = oci_parse($conn, $query);
										oci_execute($stid);						
										while (($row = oci_fetch_row($stid)) != false) {
										/*echo "<div>  <h1>Price: QR.". $row[1]."</h1></div>";
										echo "<div>  <h1>Price: QR.". $row[2]."</h1></div>";
										echo "<div class='barcode'>Barcode". $row[3]. "</div>";
										echo "<div>". $row[4]. "</div>";*/
																
									?>		
					
						<h2>Price checker</h2>
						<?php echo '<div class="inner">';
								echo '<div class="col-12 col-12-xsmall"><h1>Price: QR.'. number_format((float)$row[0], 2, '.', '').'</h1></div>';
								//echo "<div class='col-12 col-12-xsmall'><h1>Name: QR.". $row[2]."</h1></div>";
								/*echo "<div class='col-12 col-12-xsmall'><h1>Price: QR.". $row[3]."</h1></div>";
								echo "<div class='col-12 col-12-xsmall'><h1>Price: QR.". $row[4]."</h1></div>";*/
											echo '</div>';
								}
								}
								
						?>
						<div class="inner bottomleft" ><label for="emi">Scan barcode</label>
							<form action="index.php" method="post" enctype="multipart/form-data" name="emiserach" target="_self">
								
								<div class="row">
									
								
								<div class="col-3 col-12-xsmall"></div>
								<div class="col-6 col-12-xsmall">
									
								</div><div class="col-3 col-12-xsmall"></div>
								<div class="col-3 col-12-xsmall"></div>
									<div class="col-6 col-12-xsmall">
										<input type="text" name="item" id="item" >
									</div><div class="col-3 col-12-xsmall"></div>
								
							</form>
						</div>
						</div>
					</section>
<!-- Main  
		<article id="main">
		
				<div class="inner">	
					<section id="banner">
										<?php
											//if (empty($_POST["item"])) { 
										?>
									
										<div class="inner">
											<h2>Price checker</h2>
											<div></div>
										</div>									 
									
				
									<?php
										//} else 
										//{
										//$item=$_POST['item'];
										//$conn = oci_connect('RAWNAQ', 'Mantech5co', 'RAWNAQMAIN.dyndns.BIZ:1521/SMART');
										// $conn = oci_connect('SMART', 'SMARTQADIM48', 'rawnaqmain.dyndns.biz:1521/SMART');
										//if(!$conn) echo "Connection failed";
										// $query = "select ITM_CODE, PRICE,DESC_E  from DISTRIBUTIONS WHERE ITM_CODE='$item' and str_code='store13'"  ;
									//	$query = "select PRICE from SMART.PRICE_CHECKER WHERE BARCODE='$item'";
									//	$stid = oci_parse($conn, $query);
										//oci_execute($stid);						
										//while (($row = oci_fetch_row($stid)) != false) {
										/*echo "<div>  <h1>Price: QR.". $row[1]."</h1></div>";
										echo "<div>  <h1>Price: QR.". $row[2]."</h1></div>";
										echo "<div class='barcode'>Barcode". $row[3]. "</div>";
										echo "<div>". $row[4]. "</div>";*/
																
									?>		
					
						<h2>Price checker</h2>
						<?php ///echo '<div class="inner">';
								//echo '<div class="col-12 col-12-xsmall"><h1>Price: QR.'. number_format((float)$row[0], 2, '.', '').'</h1></div>';
								//echo "<div class='col-12 col-12-xsmall'><h1>Name: QR.". $row[2]."</h1></div>";
								/*echo "<div class='col-12 col-12-xsmall'><h1>Price: QR.". $row[3]."</h1></div>";
								echo "<div class='col-12 col-12-xsmall'><h1>Price: QR.". $row[4]."</h1></div>";*/
								//			echo '</div>';
								//}
								//}
								
						?>
						<div class="inner bottomleft" ><label for="emi">Scan barcode</label>
							<form action="index.php" method="post" enctype="multipart/form-data" name="emiserach" target="_self">
								
								<div class="row">
									
								
								<div class="col-3 col-12-xsmall"></div>
								<div class="col-6 col-12-xsmall">
									
								</div><div class="col-3 col-12-xsmall"></div>
								<div class="col-3 col-12-xsmall"></div>
									<div class="col-6 col-12-xsmall">
										<input type="text" name="item" id="item" >
									</div><div class="col-3 col-12-xsmall"></div>
								
							</form>
						</div>
						
					</section>			
					 
				</div>
			 
		</article>-->
</div>

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