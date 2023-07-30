<div id="modalMantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdlTitulo"></h4>
            </div>
            <form method="POST" id="usuario_form">
                <div class="modal-body">
                    <input type="hidden" id="usu_id" name="usu_id">

                    <div class="form-group">
                        <label class="form-label" for="usu_nom">Nombre</label>
                        <input type="text" class="form-control" id="usu_nom" name="usu_nom" placeholder="Ingrese el nombre" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="usu_ape">Apellido</label>
                        <input type="text" class="form-control" id="usu_ape" name="usu_ape" placeholder="Ingrese el apellido" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="usu_correo">Correo Electrónico</label>
                        <input type="email" class="form-control" id="usu_correo" name="usu_correo" placeholder="Ingrese el correo" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="usu_pass">Password</label>
                        <input type="password" class="form-control" id="usu_pass" name="usu_pass" placeholder="Ingrese el password" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="rol_id">Rol</label>
                        <select class="select2" id="rol_id" name="rol_id">
                            <option value="1">Alumno</option>
                            <option value="2">Administrador</option>
                            <option value="3">Directivo</option>
                        </select>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>