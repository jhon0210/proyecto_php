<?php
error_reporting(E_ALL);

require('./empleado.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear objeto empleado para conectar a la base de datos
    $ne = new Empleado();
    // Limpieza de datos por Expressiones regulares
    // Le envio todas las variables al metodo insertar
    $mensaje = $ne->insert();
    $datos['mensaje'] = $mensaje;
    $datos['success'] = true;

    echo json_encode($datos);
}
