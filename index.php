<?php
  require('area.php');

  $area = new Area();
  $areas = $area->fetch();
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/7ed7bff987.js" crossorigin="anonymous"></script>
  <title>PHP AJAX</title>
</head>



<body>
  <div class="container">
    <div class="panel panel-default" style="background:#0C2242;">
      <div class="panel-body" style="color:white;">Portal registro de empleados</div>
    </div>

    <div class="row">
      <div class="col-md-12 mt-5">
        <h1 class="text-center">CREAR EMPLEADO</h1>
        <hr style="height: 1px; color: black; background-color: black;">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12" style="text-align: center;margin-left:15%;">
        <div class="alert alert-info col-md-8" role="alert">
        Todos los campos con asteriscos (*) son obligatorios
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-5 mx-auto">
        <form id="form" action="post">
          <div class="form-group">
            <label for="">Nombre completo *</label>
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre completo del empleado">
          </div>

          <div class="form-group">
            <label for="">Correo electronico *</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="Nombre completo del empleado">
          </div>

          <div class="form-group">
            <label for="">Sexo *</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="masculino" value="m">
              <label class="form-check-label" for="inlineRadio1">Masculino</label>
              </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="femenino" value="f">
              <label class="form-check-label" for="inlineRadio1">Femenino</label>
            </div>
          </div>

          <div class="form-group">
           <label for="">Area *</label>
           <select class="form-control" aria-label="Default select example" name="area_id" id="area_id">
            <option selected>Seleccione el area</option>
            <?php
              foreach($areas as $area) { ?>
              <option value="<?php echo $area['id']; ?>"><?php echo $area['nombre']; ?></option>
            <?php
              }
            ?>
           </select>
          </div>
     
          
          <div class="form-group">
            <label for="">Descripcion *</label>
            <textarea name="descripcion" id="descripcion" cols="" rows="3" class="form-control" placeholder="Descripcion de la experiencia de empleado"></textarea>
          </div>

          <div class="form-group">
            <div class="form-check">
             <input class="form-check form-check-inline" type="checkbox" name="boletin" id="boletin">
             <label class="form-check-label" for="flexCheckIndeterminate"> 
               Deseo recibir boletin informativo
      
              </label>
            </div>
          </div>
         
          <label for="">Rol *</label>
          
          <div class="form-group">
            <div class="form-check">
             <input class="form-check form-check-inline profesional" name="cargo" type="checkbox" value="profesional" id="profesional">
             <label class="form-check-label" for="flexCheckIndeterminate">
               Profesional de proyectos - Desarrollador
              </label>
            </div>
            <div class="form-check">
             <input class="form-check form-check-inline gerente" name="cargo" type="checkbox" value="gerente" id="gerente">
             <label class="form-check-label" for="flexCheckIndeterminate">Gerente estrategico</label>
            </div>
            <div class="form-check">
             <input class="form-check form-check-inline" name="cargo" type="checkbox" value="" id="auxiliar">
             <label class="form-check-label" for="flexCheckIndeterminate">Auxiliar administrativo</label>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" id="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mt-1">
        <div id="show"></div>
        <div id="fetch"></div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Datos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="read_data"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Editar Modal -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Datos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="edit_data">
            html
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="update">Update</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="scripts/events.js"></script>
</body>

</html>