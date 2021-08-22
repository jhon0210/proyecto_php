<?php

include 'empleado.php';

$areas[0] = 'Seleccionar Area';
$areas[1] = 'Administracion';
$areas[2] = 'Ventas';
$areas[3] = 'Calidad';
$areas[4] = 'Produccion';

$edit_id = $_POST['edit_id'];

$model = new Empleado();

$row = $model->edit($edit_id);

if (!empty($row)) { ?>

    <form id="form" action="post">
        <div>
            <input type="hidden" id="edit_id" value="<?php echo $row['id'] ?>">
        </div>
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" id="edit_nombre" class="form-control" value="<?php echo $row['nombre']; ?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" id="edit_email" class="form-control" value="<?php echo $row['email']; ?>">
        </div>
        <div class="form-group">
            <label for="">Sexo *</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="edit_sexo" id="masculino" value="m" <?php if ($row['sexo'] == 'm') echo 'checked'; ?>>
                <label class="form-check-label" for="inlineRadio1">Masculino</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="edit_sexo" id="femenino" value="f" <?php if ($row['sexo'] == 'f') echo 'checked'; ?>>
                <label class="form-check-label" for="inlineRadio1">Femenino</label>
            </div>
        </div>
        <div class="form-group">
            <label for="">Area *</label>
            <select class="form-control" aria-label="Default select example" name="edit_area_id" id="edit_area_id">
                <?php
                    foreach ($areas as $key => $value) { ?>
                        <option value="<?php echo $key; ?>" <?php if ($key == $row['area_id']) echo 'selected'; ?>><?php echo $value; ?></option>
                    <?php }
                ?>
            </select>
        </div>
    </form>

<?php

}

?>