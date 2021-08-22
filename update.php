<?php 

include "empleado.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['edit_nombre'] != '' && $_POST['edit_email'] != '' && $_POST['edit_id'] != '') {
        $model = new Empleado();
        $data['mensaje'] = $model->update($_POST);
        echo json_encode($mensaje);
    } else {
        echo "
        <script>alert('empty fields')</script>
        ";
    }
}