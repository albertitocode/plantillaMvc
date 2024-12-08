<?php foreach ($usuario as $usu) { ?>
    <div class="col-md-6 col-lg-4">
        <div class="form-group">
            <label for="usuario_nombre_1">Primer nombre</label> <input type="text" name="usuario_nombre_1" id="" class="form-control" placeholder="<?= $usu['usuario_nombre_1'] ?>" value="">
        </div>
        <div class="form-group"> <label for="usuario_apellido_1">Primer apellido</label>
            <input type="text" name="usuario_apellido_1" id="" class="form-control" placeholder="<?= $usu['usuario_apellido_1'] ?>" value="">
        </div>
        <div class="form-group">
            <label for="usuario_correo">Correo</label>
            <input type="text" name="usuario_correo" id="" class="form-control" placeholder="<?= $usu['usuario_correo'] ?>" value="">
        </div>
        <div class="form-group">
            <label for="usuario_direccion">Direccion</label>
            <input type="text" name="usuario_direccion" id="" class="form-control" placeholder="<?= $usu['usuario_direccion'] ?>" value="">
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="form-group">
            <label for="usuario_nombre_2">Segundo nombre</label>
            <input type="text" name="usuario_nombre_2" id="" class="form-control" placeholder="<?= $usu['usuario_nombre_2'] ?>" value="">
        </div>
        <div class="form-group">
            <label for="usuario_apellido_2">Segundo apellido</label>
            <input type="text" name="usuario_apellido_2" id="" class="form-control" placeholder="<?= $usu['usuario_apellido_2'] ?>" value="">
        </div>
        <div class="form-group">
            <label for="usuario_contrasena">Contraseña</label>
            <input type="password" name="usuario_contrasena" id="" class="form-control" placeholder="<?= $usu['usuario_apellido_1'] ?>" value="">
        </div>
        <div class="form-group">
            <label for="rol_id">Rol</label>
            <select name="rol_id" id="" class="form-control">
                <option value="">Seleccione...</option>
                <?php
                foreach ($roles as $ro) {
                    echo "<option  value='" . $ro['rol_id'] . "'>" . $ro['rol_nombre'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="form-group">
            <label for="usuario_telefono">Telefono</label>
            <input type="text" name="usuario_telefono" id="" class="form-control" placeholder="<?= $usu['usuario_telefono'] ?>" value="">
        </div>
        <div class="form-group">
            <label for="tipo_documento_id">Tipo de documento</label>
            <select name="tipo_documento_id" id="" class="form-control">
                <option value="">Seleccione...</option>
                <?php
                foreach ($tipo_documento as $tpd) {
                    echo "<option  value='" . $tpd['tipo_documento_id'] . "'>" . $tpd['tipo_documento_nombre'] . "</option>";
                }
                ?>
            </select>
            </select>
        </div>
        <div class="form-group">
            <label for="usuario_num_identificacion">Numero documento</label>
            <input type="number" name="usuario_num_identificacion" id="" class="form-control" placeholder="<?= $usu['usuario_num_identificacion'] ?>" value="">
        </div>
    </div>
    <div class="mt-5">
                                <input type="submit" value="Enviar" class="btn btn-success" name="enviar">

                            </div>

<?php } ?>