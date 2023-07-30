<?php

require_once("../../config/conexion.php");
if (isset($_SESSION['usu_id'])) {

?>

	<!DOCTYPE html>
	<html>

	<head lang="en">
		<?php require_once("../MainHead/head.php"); ?>
		<title>CET Nº 13::Detalle Materias</title>
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
								<h3 id="lblNumIdTicket"></h3>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Home</a></li>
									<li class="active">Consultar Materia</li>
								</ol>
							</div>
						</div>
					</div>
				</header>

				<div class="row">

					<input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION['usu_id']; ?>">
					<div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label semibold" for="nombre">Area Curricular</label>
							<input type="text" class="form-control" id="nombre" name="nombre" disabled>
						</fieldset>
					</div>
					<div class="col-lg-2">
						<fieldset class="form-group">
							<label class="form-label semibold" for="ciclo">Ciclo</label>
							<input type="text" class="form-control" id="ciclo" name="ciclo" disabled>
						</fieldset>
					</div>

					<div class="col-lg-2">
					<fieldset class="form-group">
							<label class="form-label semibold" for="curso">Curso</label>
							<input type="text" class="form-control" id="curso" name="curso" disabled>
						</fieldset>
					</div>

					<div class="col-lg-2">
					<fieldset class="form-group">
							<label class="form-label semibold" for="division">División</label>
							<input type="text" class="form-control" id="division" name="division" disabled>
						</fieldset>
					</div>
					<div class="col-lg-2">
					<fieldset class="form-group">
							<label class="form-label semibold" for="turno">Turno</label>
							<input type="text" class="form-control" id="turno" name="turno" disabled>
						</fieldset>
					</div>
					<div class="col-lg-2">
					<fieldset class="form-group">
							<label class="form-label semibold" for="anio">Año</label>
							<input type="text" class="form-control" id="anio" name="anio" disabled>
						</fieldset>
					</div>
					<div class="col-lg-8">
					<fieldset class="form-group">
							<label class="form-label semibold" for="profesor">Profesor</label>
							<input type="text" class="form-control" id="profesor" name="profesor" disabled>
						</fieldset>
					</div>
					<div class="col-lg-12">
						<fieldset class="form-group">
							<label class="form-label semibold" for="tick_titulo">Documentos Adicionales</label>
							<table id="documentos_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
								<thead>
									<tr>
										<th style="width: 90%;">Nombre</th>
										<th class="text-center" style="width: 10%;"></th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</fieldset>
					</div>

					<div class="col-lg-12">
						<fieldset class="form-group">
							<label class="form-label semibold" for="observaciones">Observaciones</label>
							<div class="summernote-theme-1">
								<textarea class="summernote" id="observaciones" name="observaciones"></textarea>
							</div>
						</fieldset>
					</div>



				</div>

				<section class="activity-line" id="lblDetalle">

				</section>

			</div>
		</div>


		<?php require_once("../MainJs/js.php"); ?>
		<script type="text/javascript" src="detallematerias.js"></script>
	</body>

	</html>

<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}

?>