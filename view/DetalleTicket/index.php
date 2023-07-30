<?php

require_once("../../config/conexion.php");
if (isset($_SESSION['usu_id'])) {

?>

	<!DOCTYPE html>
	<html>

	<head lang="en">
		<?php require_once("../MainHead/head.php"); ?>
		<title>CET Nº 13::Detalle Ticket</title>
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
								<div id="lblEstado"></div>
								<span class="label label-pill label-primary" id="lblNomUsuario"></span>
								<span class="label label-pill label-default" id="lblFechCrea"></span>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Home</a></li>
									<li class="active">Consultar Ticket</li>
								</ol>
							</div>
						</div>
					</div>
				</header>

				<div class="row">

					<input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION['usu_id']; ?>">
					<div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label semibold" for="cat_nom">Categoría</label>
							<input type="text" class="form-control" id="cat_nom" readonly>
						</fieldset>
					</div>
					<div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label semibold" for="prio_nom">Prioridad</label>
							<input type="text" class="form-control" id="prio_nom" name="prio_nom" readonly>
						</fieldset>
					</div>
					<div class="col-lg-4">
						<fieldset class="form-group">
							<label class="form-label semibold" for="tick_titulo">Título</label>
							<input type="text" class="form-control" id="tick_titulo" name="tick_titulo" readonly>
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
							<label class="form-label semibold" for="tickd_descripusu">Descripción</label>
							<div class="summernote-theme-1">
								<textarea class="summernote" id="tickd_descripusu" name="tickd_descripusu"></textarea>
							</div>
						</fieldset>
					</div>


				</div>

				<section class="activity-line" id="lblDetalle">

				</section>

				<div class="box-typical box-typical-padding" id="pnlDetalle">
					<p>
						Ingrese su duda o consulta.
					</p>
					<div class="row">

						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="tickd_descrip">Descripción</label>
								<div class="summernote-theme-1">
									<textarea class="summernote" id="tickd_descrip" name="tickd_descrip"></textarea>
								</div>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="fileElem">Documentos Adicionales</label>
								<input type="file" name="fileElem" id="fileElem" class="form-control" multiple>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<button type="button" id="btnEnviar" class="btn btn-rounded btn-inline btn-primary">Enviar</button>
							<button type="button" id="btnCerrarTicket" class="btn btn-rounded btn-inline btn-warning">Cerrar Ticket</button>
						</div>
					</div>


				</div>


			</div>
		</div>


		<?php require_once("../MainJs/js.php"); ?>
		<script type="text/javascript" src="detalleticket.js"></script>
	</body>

	</html>

<?php
} else {
	header("Location:" . Conectar::ruta() . "index.php");
}

?>