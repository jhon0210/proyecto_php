<?php
include 'empleado.php';

$empleado = new Empleado();

$generos['m'] = 'masculino';
$generos['f'] = 'femenino';

$rows = $empleado->fetch();
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Area</th>
        </tr>
    </thead>
    <tbody>
        <?php

$i = 1;
        if (!empty($rows)) {
            foreach ($rows as $row) {
                $sexo = $row['sexo'];
            ?>

                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $generos[$sexo]; ?></td>
                    <td><?php echo $row['nombre_area']; ?></td>
                    <td>
                        <a href="" id="edit" class="far fa-edit" value="<?php echo $row['id'] ?>" data-toggle="modal" data-target="#exampleModal1"></a>
                        <a href="" id="del" class="fas fa-trash-alt" value="<?php echo $row['id'] ?>"></a>
                    </td>
                </tr>

        <?php
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                       no data
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>';
        }
        ?>
    </tbody>
</table>