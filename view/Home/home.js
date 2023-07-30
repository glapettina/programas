// function init() {}

// $(document).ready(function () {
//   var usu_id = $("#user_idx").val();

//   if ($("#rol_idx").val() == 1) {
//     $.post(
//       "../../controller/usuario.php?op=total",
//       { usu_id: usu_id },
//       function (data) {
//         data = JSON.parse(data);
//         $("#lblTotal").html(data.TOTAL);
//       }
//     );

//     $.post(
//       "../../controller/usuario.php?op=totalabierto",
//       { usu_id: usu_id },
//       function (data) {
//         data = JSON.parse(data);
//         $("#lblTotalAbierto").html(data.TOTAL);
//       }
//     );

//     $.post(
//       "../../controller/usuario.php?op=totalcerrado",
//       { usu_id: usu_id },
//       function (data) {
//         data = JSON.parse(data);
//         $("#lblTotalCerrado").html(data.TOTAL);
//       }
//     );

//     $.post("../../controller/usuario.php?op=grafico", { usu_id: usu_id }, function(data){

//       data = JSON.parse(data);
  
//       new Morris.Bar({
//         element: 'divgrafico',
//         data: data,
//         xkey: 'nom',
//         ykeys: ['total'],
//         labels: ['Valor'],
//         barColors: ["#1ab244"]
    
//       });
  
      
//     });
//   } else {



//     $.post(
//         "../../controller/ticket.php?op=total",
//         function (data) {
//           data = JSON.parse(data);
//           $("#lblTotal").html(data.TOTAL);
//         }
//       );
  
//       $.post(
//         "../../controller/ticket.php?op=totalabierto",
//         function (data) {
//           data = JSON.parse(data);
//           $("#lblTotalAbierto").html(data.TOTAL);
//         }
//       );
  
//       $.post(
//         "../../controller/ticket.php?op=totalcerrado",
//         function (data) {
//           data = JSON.parse(data);
//           $("#lblTotalCerrado").html(data.TOTAL);
//         }
//       );

//       $.post("../../controller/ticket.php?op=grafico", function(data){

//         data = JSON.parse(data);
    
//         new Morris.Bar({
//           element: 'divgrafico',
//           data: data,
//           xkey: 'nom',
//           ykeys: ['total'],
//           labels: ['Valor']
      
//         });
    
        
//       });

//   }




// });

// init();
