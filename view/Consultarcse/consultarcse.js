var tabla;
var usu_id = $("#user_idx").val();
var rol_id = $("#rol_idx").val();

function init() {

  $("#curso_form").on("submit", function(e){

      guardar(e);
  });
}

$(document).ready(function () {


  // Se inicializa el DataTable

    var curso = $('#curso').val();
    var division = $('#division').val();
    var turno = $('#turno').val();
    var anio = $('#anio').val();

    listardatatable(curso, division, turno, anio);


  });


function ver(materia_id) {
  console.log(materia_id);
  window.open('http://localhost/programas/view/DetalleMaterias/?ID='+materia_id+'');
}

function eliminar(materia_id) {
  console.log(materia_id);
  swal(
    {
      title: "Atnción",
      text: "Está seguro de eliminar la materia?",
      type: "error",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Si",
      cancelButtonText: "No",
      closeOnConfirm: false,
    },
    function (isConfirm) {
      if (isConfirm) {

     
        $.post(
          "../../controller/materia.php?op=eliminar",
          { materia_id : materia_id },
          function (data) {

          });

          $('#curso_data').DataTable().ajax.reload();

        swal({
          title: "Atención",
          text: "Materia eliminada",
          type: "success",
          confirmButtonClass: "btn-success",
        });
      }
    }
  );
}

$(document).on("click", "#btnFiltrar", function(){

  limpiar(rol_id);

  var curso = $('#curso').val();
  var division = $('#division').val();
  var turno = $('#turno').val();
  var anio = $('#anio').val();

  listardatatable(curso, division, turno, anio);
});

function listardatatable(curso, division, turno, anio){
  tabla = $("#curso_data")
  .dataTable({
    aProcessing: true,
    aServerSide: true,
    dom: "Bfrtip",
    searching: true,
    lengthChange: false,
    colReorder: true,
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
    ajax: {
      url: "../../controller/materia.php?op=listar_filtro_superior_e",
      type: "post",
      dataType: "json",
      data: { curso : curso, division : division, turno : turno, anio : anio  },
      error: function (e) {
        console.log(e.responseText);
      },
    },
    bDestroy: true,
    responsive: true,
    bInfo: true,
    iDisplayLength: 10,
    autoWidth: false,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
  })
  .DataTable();
}

function limpiar(rol_id){

  if (rol_id == 2) {

    $('#table').html(
      "<table id='curso_data' class='table table-bordered table-striped table-vcenter js-dataTable-full'>"+
          "<thead>"+
           " <tr>"+
              "<th style='width: 5%;'>ID</th>"+
              "<th style='width: 20%;'>Area Curricular</th>"+
              "<th style='width: 8%;'>Curso</th>"+
              "<th style='width: 8%;'>División</th>"+
             " <th style='width: 8%;'>Turno</th>"+
              "<th style='width: 5%;'>Año</th>"+
              "<th style='width: 20%;'>Profesor</th>"+
              "<th class='text-center' style='width: 5%;'>Ver</th>"+          
              "<th class='text-center' style='width: 5%;'>Eliminar</th>"+            
            "</tr>"+
         "</thead>"+
         "<tbody>"+
                  
                "</tbody>"+
    "</table>"
    );
    
  }else{
    $('#table').html(
      "<table id='curso_data' class='table table-bordered table-striped table-vcenter js-dataTable-full'>"+
          "<thead>"+
           " <tr>"+
              "<th style='width: 5%;'>ID</th>"+
              "<th style='width: 20%;'>Area Curricular</th>"+
              "<th style='width: 8%;'>Curso</th>"+
              "<th style='width: 8%;'>División</th>"+
             " <th style='width: 8%;'>Turno</th>"+
              "<th style='width: 5%;'>Año</th>"+
              "<th style='width: 20%;'>Profesor</th>"+        
              "<th class='text-center' style='width: 5%;'>Ver</th>"+            
            "</tr>"+
         "</thead>"+
         "<tbody>"+
                  
                "</tbody>"+
    "</table>"
    );
  }
}


init();
