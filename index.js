function init() {}

$(document).ready(function () {});

$(document).on("click", "#btnPreceptor", function () {
  if ($('#rol_id').val() == 1) {
    $('#lblTitulo').html("Acceso Directivo");
    $('#btnPreceptor').html("Alumno");
    $('#rol_id').val(3);
    $('#imgTipo').attr("src", "public/2.jpg");

  } else if($('#rol_id').val() == 3){

    $('#lblTitulo').html("Acceso Alumno");
    $('#btnPreceptor').html("Directivo");
    $('#rol_id').val(1);
    $('#imgTipo').attr("src", "public/1.jpg");
  } else if($('#rol_id').val() == 2){
    
    $('#lblTitulo').html("Acceso Administrador");
    $('#btnPreceptor').html("Alumno");
    $('#rol_id').val(1);
    $('#imgTipo').attr("src", "public/2.jpg");
  } 


  // else if($('#rol_id').val() == 3){

  //   $('#lblTitulo').html("Acceso Directivo");
  //   $('#btnPreceptor').html("Alumno");
  //   $('#rol_id').val(3);
  //   $('#imgTipo').attr("src", "public/2.jpg");

  // }else {

  //   $('#lblTitulo').html("Alumno");
  //   $('#btnPreceptor').html("Administrador");
  //   $('#rol_id').val(3);
  //   $('#imgTipo').attr("src", "public/1.jpg");
  // }

});

init();


