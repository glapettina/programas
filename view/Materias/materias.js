function init(){

    $("#materia_form").on("submit", function(e){
        guardaryeditar(e);
    });
}

$(document).ready(function() {
    $('#observaciones').summernote({
        height: 150,
        lang: 'es-ES',
        callbacks: {
            onImageUpload: function(image){
                console.log("Image detect...");
                myimagetreat(image[0]);
            },
            onPaste: function(e){
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

});

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#materia_form")[0]);
    if ($('#nombre').val() == '' || $('#ciclo').val() == '' || $('#curso').val() == '' || $('#division').val() == '' || $('#turno').val() == '' || $('#anio').val() == '' || $('#profesor').val() == '') {
        swal("Advertencia!", "Existen campos en blanco", "warning");
    } else {
        var totalfiles = $('#fileElem').val().length;
        for (var i = 0; i < totalfiles; i++) {
            formData.append("files[]", $('#fileElem')[0].files[i]);
            
        }
       
        $.ajax({
            url: "../../controller/materia.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                data = JSON.parse(data);

                console.log(data);

                limpiar();
                swal("Correcto!", "Registrado Correctamente", "success");
            }
        });
    }

}

function limpiar(){
    $('#nombre').val('');
    $('#ciclo').val('');
    $('#curso').val('');
    $('#division').val('');
    $('#turno').val('');
    $('#ciclo').val('');
    $('#anio').val('');
    $('#profesor').val('');
    $('#fileElem').val('');
    $('#observaciones').summernote('reset');
}

init();
