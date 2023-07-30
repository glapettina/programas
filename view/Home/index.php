<?php

	require_once("../../config/conexion.php");
	if (isset($_SESSION['usu_id'])) {
		
?>

<!DOCTYPE html>
<html>
<head lang="en">
	<?php require_once("../MainHead/head.php"); ?>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<title>CET Nº 13::Home</title>
</head>
<body class="with-side-menu">

	<?php require_once("../MainHeader/header.php"); ?>

	<div class="mobile-menu-left-overlay"></div>
	
	<?php require_once("../MainNav/nav.php"); ?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">

				</div>

				<div id=""></div>
			</div>
			
		</div>
	</div>
	<!-- Contenido -->

	<?php require_once("../MainJs/js.php"); ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>			
	<script type="text/javascript" src="home.js"></script>					
</body>
</html>

<?php
	}else{
		header("Location:" . Conectar::ruta() . "index.php");
	}

?>