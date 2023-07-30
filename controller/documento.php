<?php

    require_once("../config/conexion.php");
    require_once("../models/documento.php");
    $documento = new Documento();

    switch($_GET["op"]){
        case "listar":
            $datos = $documento->get_documento_x_materia($_POST["materia_id"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = '<a href="../../public/archivos/'.$_POST["materia_id"].'/'.$row["doc_nom"].'" target="_blank">'.$row["doc_nom"].'</a>';
                $sub_array[] = '<a type="button" href="../../public/archivos/'.$_POST["materia_id"].'/'.$row["doc_nom"].'" target="_blank" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></a>';
                $data[] = $sub_array;

            }

            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data);
            echo json_encode($results);

        break;    

        case "listartaller":
            $datos = $documento->get_documento_x_materia_taller($_POST["materia_id"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = '<a href="../../public/archivos/taller/'.$_POST["materia_id"].'/'.$row["doc_nom"].'" target="_blank">'.$row["doc_nom"].'</a>';
                $sub_array[] = '<a type="button" href="../../public/archivos/taller/'.$_POST["materia_id"].'/'.$row["doc_nom"].'" target="_blank" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></a>';
                $data[] = $sub_array;

            }

            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data);
            echo json_encode($results);

        break;    

        case "listarplanificacion":
            $datos = $documento->get_documento_x_materia_planificacion($_POST["planificacion_id"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = '<a href="../../public/archivos/planificaciones/'.$_POST["planificacion_id"].'/'.$row["doc_nom"].'" target="_blank">'.$row["doc_nom"].'</a>';
                $sub_array[] = '<a type="button" href="../../public/archivos/planificaciones/'.$_POST["planificacion_id"].'/'.$row["doc_nom"].'" target="_blank" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></a>';
                $data[] = $sub_array;

            }

            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data);
            echo json_encode($results);

        break;   
    }


?>