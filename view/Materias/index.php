<?php

require_once("../../config/conexion.php");

if (isset($_SESSION['usu_id'])) {

?>

	<!DOCTYPE html>
	<html>

	<head lang="en">
		<?php require_once("../MainHead/head.php"); ?>
		<title>CET Nº 13::Carga Materias</title>
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
								<h3>Carga Materias</h3>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Home</a></li>
									<li class="active">Carga Materias</li>
								</ol>
							</div>
						</div>
					</div>
				</header>
				<div class="box-typical box-typical-padding">


					<h5 class="m-t-lg with-border">Ingresar Información</h5>

					<div class="row">
						<form method="POST" id="materia_form">
							<div class="form-group">
								<div class="col-lg-6">

									<fieldset class="form-group">
										<label class="form-label semibold" for="nombre">Area Curricular</label>
										<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese materia">
									</fieldset>
								</div>
								<div class="col-lg-2">
									<fieldset class="form-group">
										<label class="form-label semibold" for="ciclo">Ciclo</label>
										<select class="select2" id="ciclo" name="ciclo">
											<option value="">Seleccione...</option>
											<option value="BASICO">BASICO</option>
											<option value="SUPERIOR ELECTRO">SUPERIOR ELECTRO</option>
											<option value="SUPERIOR ALIMENTACION">SUPERIOR ALIMENTACION</option>
										</select>
									</fieldset>
								</div>

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
									<label class="form-label semibold" for="division">División</label>
									<select class="select2" id="division" name="division">
										<option value="">Seleccione...</option>
										<option value="PRIMERA">PRIMERA</option>
										<option value="SEGUNDA">SEGUNDA</option>
										<option value="TERCERA">TERCERA</option>
									</select>
								</fieldset>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-3">
								<fieldset class="form-group">
									<label class="form-label semibold" for="turno">Turno</label>
									<select class="select2" id="turno" name="turno">
										<option value="">Seleccione...</option>
										<option value="MAÑANA">MAÑANA</option>
										<option value="TARDE">TARDE</option>
										<option value="VESPERTINO">VESPERTINO</option>
									</select>
								</fieldset>
								</div>
								<div class="col-lg-3">
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
								<div class="col-lg-6">
									<fieldset class="form-group">
										<label class="form-label semibold" for="profesor">Profesor/a</label>
										<input type="text" class="form-control" id="profesor" name="profesor" placeholder="Ingrese profesor/a">
									</fieldset>
								</div>
							</div>
							<div class="col-lg-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="exampleInput">Documentos Adicionales</label>
									<input type="file" name="fileElem" id="fileElem" class="form-control" multiple>
								</fieldset>
							</div>



							<div class="col-lg-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="observaciones">Descripción</label>
									<div class="summernote-theme-1">
										<textarea class="summernote" id="observaciones" name="observaciones"></textarea>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-12">
								<button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
							</div>
						</form>
					</div>
					<!--.row-->

				</div>
			</div>
		</div>
		<!-- Contenido -->

		<?php require_once("../MainJs/js.php"); ?>
		<script type="text/javascript" src="materias.js"></script>
	</body>

	</html>

<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}

?>