<?php

require_once("../../config/conexion.php");
if (isset($_SESSION['usu_id'])) {

?>

	<!DOCTYPE html>
	<html>

	<head lang="en">
		<?php require_once("../MainHead/head.php"); ?>
		<title>CET Nº 13::Programas Taller C.S. Alimentación</title>
	</head>

	<body class="with-side-menu">

		<?php require_once("../MainHeader/header.php"); ?>

		<div class="mobile-menu-left-overlay"></div>

		<?php require_once("../MainNav/nav.php"); ?>

		<!-- Contenido -->
		<div class="page-content">
			<div class="container-fluid">
				<header class="section-header">
					<div class="tbl">
						<div class="tbl-row">
							<div class="tbl-cell">
								<h3>Programas Taller Ciclo Superior - Alimentación</h3>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Home</a></li>
									<li class="active">Programas Taller Ciclo Superior - Alimentación</li>
								</ol>
							</div>
						</div>
					</div>
				</header>

				<div class="box-typical box-typical-padding">

					<div class="row">
					<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label semibold" for="curso">Curso</label>
								<select class="select2" id="curso" name="curso">
									<option value="">Seleccione...</option>
									<option value="PRIMERO">PRIMERO</option>
									<option value="SEGUNDO">SEGUNDO</option>
									<option value="TERCERO">TERCERO</option>
									<option value="CUARTO">CUARTO</option>
								</select>
							</fieldset>
						</div>


						<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label semibold" for="anio">Año</label>
								<select class="select2" id="anio" name="anio">
									<option value="">Seleccione...</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
								</select>
							</fieldset>
						</div>
						<div class="col-lg-4">
							<fieldset class="form-group">
								<label class="form-label semibold" for="btnFiltrar">&nbsp;</label>
								<button type="submit" class="btn btn-rounded btn-primary btn-block" id="btnFiltrar">Filtrar</button>
							</fieldset>
						</div>
					</div>

					<div class="box-typical box-typical-padding" id="table">

						<table id="curso_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
							<input type="hidden" id="materia_id" name="materia_id">
							<input type="hidden" id="rol_id" name="rol_id">
							<thead>
								<tr>
								<?php

									if ($_SESSION['rol_id'] == 2) {
										echo'<th style="width: 5%;">Nº</th>
										<th style="width: 20%;">Area Curricular</th>
										<th style="width: 8%;">Curso</th>
										<th style="width: 5%;">Año</th>
										<th style="width: 20%;">Profesor</th>
										<th class="text-center" style="width: 5%;">Ver</th>
										<th class="text-center" style="width: 5%;">Eliminar</th>';
									}else {
										echo'<th style="width: 5%;">Nº</th>
										<th style="width: 20%;">Area Curricular</th>
										<th style="width: 8%;">Curso</th>
										<th style="width: 5%;">Año</th>
										<th style="width: 20%;">Profesor</th>
										<th class="text-center" style="width: 5%;">Ver</th>';
									}

									?>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
		<!-- Contenido -->

		<?php require_once("../MainJs/js.php"); ?>
		<script type="text/javascript" src="consultartallercsa.js"></script>
	</body>

	</html>

<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}

?>