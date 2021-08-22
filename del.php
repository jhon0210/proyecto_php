<?php
include 'empleado.php';
$model = new Empleado();
$data['mensaje'] = $model->del($_POST['del_id']);
echo json_encode($data);
