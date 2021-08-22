$(document).on("click", "#submit", function(e) {
    e.preventDefault();
    var sexo = ($('input:radio[name=flexRadioDefault]:checked').val());
    var rol = ($('input:checkbox[name=cargo]:checked').val());
    var boletin = ($('#boletin').prop('checked'));
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var area_id = $("#area_id").val();
    var descripcion = $("#descripcion").val();
    var submit = $("#submit").val();

    if(nombre == ""){
      Swal.fire({
       icon: 'error',
       title: 'Oops...',
       text: 'Debe diligenciar el nombre!',
})

    }else if(area_id == ""){
      Swal.fire({
       icon: 'error',
       title: 'Oops...',
       text: 'Debe diligenciar el correo!',
})
      
    }else if(area_id == ""){
      Swal.fire({
       icon: 'error',
       title: 'Oops...',
       text: 'Debe seleccionar el area!',
})
      
    }else if(sexo == ""){
      Swal.fire({
       icon: 'error',
       title: 'Oops...',
       text: 'Debe seleccionar el sexo!',
})
      
    }else if(rol == ""){
      Swal.fire({
       icon: 'error',
       title: 'Oops...',
       text: 'Debe seleccionar el rol!',
})
      
    }else if(descripcion == ""){
      Swal.fire({
       icon: 'error',
       title: 'Oops...',
       text: 'Debe diligenciar la descripcion!',
})
      
    }else{

    $.ajax({
      url: "insertar_empleado.php",
      type: "post",
      data: {
        nombre,
        email,
        area_id,
        descripcion,
        sexo,
        rol,
        boletin,
        submit
      },
      success: function(data) {
          Swal.fire(
          'Bien hecho!',
          'Los datos fueron almacenados correctamente!',
            'success'
)
        
        fetch();
      }
    })
  }
  });

  //Fetch records

  function fetch() {
    $.ajax({
      url: "fetch.php",
      type: "post",
      success: function(data) {
        $("#fetch").html(data);
      }
    });
  }
  fetch();

  //Delete

  $(document).on("click", "#del", function(e) {
    e.preventDefault();

    if (window.confirm("¿Esta seguro de borrarlo?")) {
      let data = {
        del_id: $(this).attr("value")
      };

      $.ajax({
        url: "del.php",
        type: "post",
        data,
        success: function(data) {
            Swal.fire(
                'Bien hecho!',
                'Los datos fueron eliminados correctamente!',
                  'success'
      )
          fetch();
        }
      });
    } else {
      return false;
    }
  });

  //Editar
  $(document).on("click", "#edit", function(e) {
    e.preventDefault();

    var edit_id = $(this).attr("value");

    $.ajax({
      url: "edit.php",
      type: "post",
      data: {
        edit_id: edit_id
      },
      success: function(data) {
        $('#edit_data').html(data);   
      }
    });
  });

  //update
  $(document).on("click", "#update", function(e){
    e.preventDefault();
    let edit_sexo_m = $("#edit_sexo_m").prop('checked');
    let edit_sexo_f = $("#edit_sexo_f").prop('checked');

    let data = {
      edit_nombre: $("#edit_nombre").val(),
      edit_sexo: (edit_sexo_m) ? 'm' : 'f',
      edit_id: $("#edit_id").val(),
      edit_email: $("#edit_email").val(),
      edit_area_id: $('#edit_area_id').val()
    };

    $.ajax({
      url: "update.php",
      type: "POST",
      data,
      success: function(data){
        Swal.fire(
            'Bien hecho!',
            'Los datos fueron actualizados correctamente!',
              'success'
  )
        fetch();
      }
    });
  });