function init() {}

$(document).ready(function () {
  var tick_id = getUrlParameter("ID");

  listarDetalle(tick_id);

  $("#tickd_descrip").summernote({
    height: 400,
    lang: "es-ES",
    callbacks: {
      onImageUpload: function (image) {
        console.log("Image detect...");
        myimagetreat(image[0]);
      },
      onPaste: function (e) {
        console.log("Image detect...");
      }
    },
    toolbar: [
      
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']]
    ]
  });

  $("#tickd_descripusu").summernote({
    height: 400,
    lang: "es-ES",
    toolbar: [
      
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']]
    ]
  });

  $("#tickd_descripusu").summernote("disable");
  tabla=$('#documentos_data').dataTable({
    "aProcessing": true,
    "aServerSide": true,
    dom: 'Bfrtip',
    "searching": true,
    lengthChange: false,
    colReorder: true,
    buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
            ],
    "ajax":{
        url: '../../controller/documento.php?op=listar',
        type : "post",
        data : {tick_id:tick_id},
        dataType : "json",
        error: function(e){
            console.log(e.responseText);
        }
    },
    "bDestroy": true,
    "responsive": true,
    "bInfo":true,
    "iDisplayLength": 10,
    "autoWidth": false,
    "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
}).DataTable();
});

var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split("&"),
    sParameterName,
    i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split("=");

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined ? true : sParameterName[1];
    }
  }
};

$(document).on("click", "#btnEnviar", function () {
  var tick_id = getUrlParameter("ID");
  var usu_id = $("#user_idx").val();
  var tickd_descrip = $("#tickd_descrip").val();

  if ($("#tickd_descrip").summernote("isEmpty")) {
    swal("Advertencia!", "Detalle en blanco", "warning");
  } else {

    var formData = new FormData();
    formData.append('tick_id', tick_id);
    formData.append('usu_id', usu_id);
    formData.append('tickd_descrip', tickd_descrip);
    var totalfiles = $('#fileElem').val().length;
        for (var i = 0; i < totalfiles; i++) {
            formData.append("files[]", $('#fileElem')[0].files[i]);
            
        }
        $.ajax({
          url: "../../controller/ticket.php?op=insertdetalle",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function(data){
            console.log(data);
            listarDetalle(tick_id);
            $('#fileElem').val('');
            $("#tickd_descrip").summernote("reset");
            swal("Correcto!", "Registrado Correctamente", "success");
          }
        });

  }
});

$(document).on("click", "#btnCerrarTicket", function () {
  swal(
    {
      title: "Ticket",
      text: "Está seguro de cerrar el ticket?",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-warning",
      confirmButtonText: "Si",
      cancelButtonText: "No",
      closeOnConfirm: false,
    },
    function (isConfirm) {
      if (isConfirm) {
        var tick_id = getUrlParameter("ID");
        var usu_id = $("#user_idx").val();

        $.post(
          "../../controller/ticket.php?op=update",
          { tick_id: tick_id, usu_id: usu_id },
          function (data) {

          });

          $.post("../../controller/email.php?op=ticket_cerrado", { tick_id : tick_id },function (data) {


          });
         
          listarDetalle(tick_id);

        swal({
          title: "Ticket",
          text: "Ticket cerrado correctamente",
          type: "success",
          confirmButtonClass: "btn-success",
        });
      }
    }
  );
});

function listarDetalle(tick_id) {
  $.post(
    "../../controller/ticket.php?op=listardetalle",
    { tick_id: tick_id },
    function (data) {
      $("#lblDetalle").html(data);
    }
  );

  $.post(
    "../../controller/ticket.php?op=mostrar",
    { tick_id: tick_id },
    function (data) {
      data = JSON.parse(data);
      $("#lblEstado").html(data.tick_estado);
      $("#lblNomUsuario").html(data.usu_nom + " " + data.usu_ape);
      $("#lblFechCrea").html(data.fech_crea);
      $("#lblNumIdTicket").html("Detalle Ticket - " + data.tick_id);

      $("#cat_nom").val(data.cat_nom);
      $("#tick_titulo").val(data.tick_titulo);

      $("#tickd_descripusu").summernote("code", data.tick_descrip);

      $("#prio_nom").val(data.prio_nom);

      if (data.tick_estado_texto == "Cerrado") {
        $("#pnlDetalle").hide();
      }
    }
  );
}

init();
