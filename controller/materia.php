<?php

require_once("../config/conexion.php");
require_once("../models/Materia.php");
$materia = new Materia();

require_once("../models/Usuario.php");
$usuario = new Usuario();

require_once("../models/Documento.php");
$documento = new Documento();    

switch ($_GET['op']) {
    case "insert":
        $datos = $materia->insert_materia($_POST["nombre"], $_POST["ciclo"], $_POST["curso"], $_POST["division"], $_POST["turno"], $_POST["anio"], $_POST["profesor"], $_POST["observaciones"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                
                $output["materia_id"] = $row["materia_id"];

                if (empty($_FILES['files']['name'])) {
                    
                }else{
                        $countfiles = count($_FILES['files']['name']);
                        $ruta = "../public/archivos/".$output["materia_id"]."/";
                        $files_arr = array();

                        if (!file_exists($ruta)) {
                            mkdir($ruta, 0777, true);
                        }

                        for ($index = 0; $index < $countfiles; $index++) {
                            $doc1 = $_FILES['files']['tmp_name'][$index];
                            $destino = $ruta.$_FILES['files']['name'][$index];

                            $documento->insert_documento( $output["materia_id"],$_FILES['files']['name'][$index]);

                            move_uploaded_file($doc1,$destino);
                        }
                    
                }
            }
        }
        echo json_encode($datos);
        break;


        case "inserttaller":
            $datos = $materia->insert_materia_taller($_POST["nombre"], $_POST["ciclo"], $_POST["curso"], $_POST["anio"], $_POST["profesor"], $_POST["observaciones"]);
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    
                    $output["materia_id"] = $row["materia_id"];
    
                    if (empty($_FILES['files']['name'])) {
                        
                    }else{
                            $countfiles = count($_FILES['files']['name']);
                            $ruta = "../public/archivos/taller/".$output["materia_id"]."/";
                            $files_arr = array();
    
                            if (!file_exists($ruta)) {
                                mkdir($ruta, 0777, true);
                            }
    
                            for ($index = 0; $index < $countfiles; $index++) {
                                $doc1 = $_FILES['files']['tmp_name'][$index];
                                $destino = $ruta.$_FILES['files']['name'][$index];
    
                                $documento->insert_documento_taller( $output["materia_id"],$_FILES['files']['name'][$index]);
    
                                move_uploaded_file($doc1,$destino);
                            }
                        
                    }
                }
            }
            echo json_encode($datos);
            break;


            case "insertplanificacion":
                $datos = $materia->insert_materia_planificacion($_POST["nombre"], $_POST["ciclo"], $_POST["curso"], $_POST["division"], $_POST["turno"], $_POST["anio"], $_POST["profesor"], $_POST["observaciones"]);
                if (is_array($datos) == true and count($datos) > 0) {
                    foreach ($datos as $row) {
                        
                        $output["planificacion_id"] = $row["planificacion_id"];
        
                        if (empty($_FILES['files']['name'])) {
                            
                        }else{
                                $countfiles = count($_FILES['files']['name']);
                                $ruta = "../public/archivos/planificaciones/".$output["planificacion_id"]."/";
                                $files_arr = array();
        
                                if (!file_exists($ruta)) {
                                    mkdir($ruta, 0777, true);
                                }
        
                                for ($index = 0; $index < $countfiles; $index++) {
                                    $doc1 = $_FILES['files']['tmp_name'][$index];
                                    $destino = $ruta.$_FILES['files']['name'][$index];
        
                                    $documento->insert_documento_planificacion( $output["planificacion_id"],$_FILES['files']['name'][$index]);
        
                                    move_uploaded_file($doc1,$destino);
                                }
                            
                        }
                    }
                }
                echo json_encode($datos);
                break;



            case "listar_filtro_basico":
                $datos = $materia->filtrar_materia_basico($_POST["curso"], $_POST["division"], $_POST["turno"], $_POST["anio"]);

                $data = array();
        
                foreach ($datos as $row) {
                    $sub_array = array();
                    $sub_array[] = $row['materia_id'];
                    $sub_array[] = $row['nombre'];
                    $sub_array[] = $row['curso'];
                    $sub_array[] = $row['division'];
                    $sub_array[] = $row['turno'];
                    $sub_array[] = $row['anio'];
                    $sub_array[] = $row['profesor'];
        

                    if ($_SESSION['rol_id'] == 2) {
                        $sub_array[] = '<button type="button" onClick="ver(' . $row["materia_id"] . ')" id="' . $row["materia_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                        $sub_array[] = '<button type="button" onClick="eliminar('.$row["materia_id"].')" id="'.$row["materia_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                    }else {
                        $sub_array[] = '<button type="button" onClick="ver(' . $row["materia_id"] . ')" id="' . $row["materia_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                    }


                    $data[] = $sub_array;
                }
        
                $results = array(
                    "sEcho" => 1,
                    "iTotalRecords" => count($data),
                    "iTotalDisplayRecords" => count($data),
                    "aaData" => $data
                );
                echo json_encode($results);
                break;


                case "listar_filtro_basico_taller":
                    $datos = $materia->filtrar_materia_basico_taller($_POST["curso"], $_POST["anio"]);
    
                    $data = array();
            
                    foreach ($datos as $row) {
                        $sub_array = array();
                        $sub_array[] = $row['materia_id'];
                        $sub_array[] = $row['nombre'];
                        $sub_array[] = $row['curso'];
                        $sub_array[] = $row['anio'];
                        $sub_array[] = $row['profesor'];
            
    
                        if ($_SESSION['rol_id'] == 2) {
                            $sub_array[] = '<button type="button" onClick="ver(' . $row["materia_id"] . ')" id="' . $row["materia_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                            $sub_array[] = '<button type="button" onClick="eliminar('.$row["materia_id"].')" id="'.$row["materia_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                        }else {
                            $sub_array[] = '<button type="button" onClick="ver(' . $row["materia_id"] . ')" id="' . $row["materia_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                        }
    
    
                        $data[] = $sub_array;
                    }
            
                    $results = array(
                        "sEcho" => 1,
                        "iTotalRecords" => count($data),
                        "iTotalDisplayRecords" => count($data),
                        "aaData" => $data
                    );
                    echo json_encode($results);
                    break;


                    case "listar_filtro_planificacion_basico":
                        $datos = $materia->filtrar_materia_planificacion_basico($_POST["curso"], $_POST["division"], $_POST["turno"], $_POST["anio"]);
        
                        $data = array();
                
                        foreach ($datos as $row) {
                            $sub_array = array();
                            $sub_array[] = $row['planificacion_id'];
                            $sub_array[] = $row['nombre'];
                            $sub_array[] = $row['curso'];
                            $sub_array[] = $row['division'];
                            $sub_array[] = $row['turno'];
                            $sub_array[] = $row['anio'];
                            $sub_array[] = $row['profesor'];
                
        
                            if ($_SESSION['rol_id'] == 2) {
                                $sub_array[] = '<button type="button" onClick="ver(' . $row["planificacion_id"] . ')" id="' . $row["planificacion_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                                $sub_array[] = '<button type="button" onClick="eliminar('.$row["planificacion_id"].')" id="'.$row["planificacion_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                            }else {
                                $sub_array[] = '<button type="button" onClick="ver(' . $row["planificacion_id"] . ')" id="' . $row["planificacion_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                            }
        
        
                            $data[] = $sub_array;
                        }
                
                        $results = array(
                            "sEcho" => 1,
                            "iTotalRecords" => count($data),
                            "iTotalDisplayRecords" => count($data),
                            "aaData" => $data
                        );
                        echo json_encode($results);
                        break;    

                        case "listar_filtro_planificacion_superior_a":
                            $datos = $materia->filtrar_materia_planificacion_superior_a($_POST["curso"], $_POST["division"], $_POST["turno"], $_POST["anio"]);
            
                            $data = array();
                    
                            foreach ($datos as $row) {
                                $sub_array = array();
                                $sub_array[] = $row['planificacion_id'];
                                $sub_array[] = $row['nombre'];
                                $sub_array[] = $row['curso'];
                                $sub_array[] = $row['division'];
                                $sub_array[] = $row['turno'];
                                $sub_array[] = $row['anio'];
                                $sub_array[] = $row['profesor'];
                    
            
                                if ($_SESSION['rol_id'] == 2) {
                                    $sub_array[] = '<button type="button" onClick="ver(' . $row["planificacion_id"] . ')" id="' . $row["planificacion_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                                    $sub_array[] = '<button type="button" onClick="eliminar('.$row["planificacion_id"].')" id="'.$row["planificacion_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                                }else {
                                    $sub_array[] = '<button type="button" onClick="ver(' . $row["planificacion_id"] . ')" id="' . $row["planificacion_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                                }
            
            
                                $data[] = $sub_array;
                            }
                    
                            $results = array(
                                "sEcho" => 1,
                                "iTotalRecords" => count($data),
                                "iTotalDisplayRecords" => count($data),
                                "aaData" => $data
                            );
                            echo json_encode($results);
                            break;     
                            
                            case "listar_filtro_planificacion_superior_e":
                                $datos = $materia->filtrar_materia_planificacion_superior_e($_POST["curso"], $_POST["division"], $_POST["turno"], $_POST["anio"]);
                
                                $data = array();
                        
                                foreach ($datos as $row) {
                                    $sub_array = array();
                                    $sub_array[] = $row['planificacion_id'];
                                    $sub_array[] = $row['nombre'];
                                    $sub_array[] = $row['curso'];
                                    $sub_array[] = $row['division'];
                                    $sub_array[] = $row['turno'];
                                    $sub_array[] = $row['anio'];
                                    $sub_array[] = $row['profesor'];
                        
                
                                    if ($_SESSION['rol_id'] == 2) {
                                        $sub_array[] = '<button type="button" onClick="ver(' . $row["planificacion_id"] . ')" id="' . $row["planificacion_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                                        $sub_array[] = '<button type="button" onClick="eliminar('.$row["planificacion_id"].')" id="'.$row["planificacion_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                                    }else {
                                        $sub_array[] = '<button type="button" onClick="ver(' . $row["planificacion_id"] . ')" id="' . $row["planificacion_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                                    }
                
                
                                    $data[] = $sub_array;
                                }
                        
                                $results = array(
                                    "sEcho" => 1,
                                    "iTotalRecords" => count($data),
                                    "iTotalDisplayRecords" => count($data),
                                    "aaData" => $data
                                );
                                echo json_encode($results);
                                break;             

                case "listar_filtro_superior_a":
                    $datos = $materia->filtrar_materia_superior_a($_POST["curso"], $_POST["division"], $_POST["turno"], $_POST["anio"]);
                    $data = array();
            
                    foreach ($datos as $row) {
                        $sub_array = array();
                        $sub_array[] = $row['materia_id'];
                        $sub_array[] = $row['nombre'];
                        $sub_array[] = $row['curso'];
                        $sub_array[] = $row['division'];
                        $sub_array[] = $row['turno'];
                        $sub_array[] = $row['anio'];
                        $sub_array[] = $row['profesor'];
            
                        

                        if ($_SESSION['rol_id'] == 2) {
                            $sub_array[] = '<button type="button" onClick="ver(' . $row["materia_id"] . ')" id="' . $row["materia_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                            $sub_array[] = '<button type="button" onClick="eliminar('.$row["materia_id"].')" id="'.$row["materia_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                        }else {
                            $sub_array[] = '<button type="button" onClick="ver(' . $row["materia_id"] . ')" id="' . $row["materia_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                        }

                        $data[] = $sub_array;
                    }
            
                    $results = array(
                        "sEcho" => 1,
                        "iTotalRecords" => count($data),
                        "iTotalDisplayRecords" => count($data),
                        "aaData" => $data
                    );
                    echo json_encode($results);
                    break;

                    case "listar_filtro_taller_superior_a":
                        $datos = $materia->filtrar_materia_taller_superior_a($_POST["curso"], $_POST["anio"]);
                        $data = array();
                
                        foreach ($datos as $row) {
                            $sub_array = array();
                            $sub_array[] = $row['materia_id'];
                            $sub_array[] = $row['nombre'];
                            $sub_array[] = $row['curso'];
                            $sub_array[] = $row['anio'];
                            $sub_array[] = $row['profesor'];
                
                            
    
                            if ($_SESSION['rol_id'] == 2) {
                                $sub_array[] = '<button type="button" onClick="ver(' . $row["materia_id"] . ')" id="' . $row["materia_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                                $sub_array[] = '<button type="button" onClick="eliminar('.$row["materia_id"].')" id="'.$row["materia_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                            }else {
                                $sub_array[] = '<button type="button" onClick="ver(' . $row["materia_id"] . ')" id="' . $row["materia_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                            }
    
                            $data[] = $sub_array;
                        }
                
                        $results = array(
                            "sEcho" => 1,
                            "iTotalRecords" => count($data),
                            "iTotalDisplayRecords" => count($data),
                            "aaData" => $data
                        );
                        echo json_encode($results);
                        break;


                        case "listar_filtro_taller_superior_e":
                            $datos = $materia->filtrar_materia_taller_superior_e($_POST["curso"], $_POST["anio"]);
                            $data = array();
                    
                            foreach ($datos as $row) {
                                $sub_array = array();
                                $sub_array[] = $row['materia_id'];
                                $sub_array[] = $row['nombre'];
                                $sub_array[] = $row['curso'];
                                $sub_array[] = $row['anio'];
                                $sub_array[] = $row['profesor'];
                    
                                
        
                                if ($_SESSION['rol_id'] == 2) {
                                    $sub_array[] = '<button type="button" onClick="ver(' . $row["materia_id"] . ')" id="' . $row["materia_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                                    $sub_array[] = '<button type="button" onClick="eliminar('.$row["materia_id"].')" id="'.$row["materia_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                                }else {
                                    $sub_array[] = '<button type="button" onClick="ver(' . $row["materia_id"] . ')" id="' . $row["materia_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                                }
        
                                $data[] = $sub_array;
                            }
                    
                            $results = array(
                                "sEcho" => 1,
                                "iTotalRecords" => count($data),
                                "iTotalDisplayRecords" => count($data),
                                "aaData" => $data
                            );
                            echo json_encode($results);
                            break;

                    case "listar_filtro_superior_e":
                        $datos = $materia->filtrar_materia_superior_e($_POST["curso"], $_POST["division"], $_POST["turno"], $_POST["anio"]);
                        $data = array();
                
                        foreach ($datos as $row) {
                            $sub_array = array();
                            $sub_array[] = $row['materia_id'];
                            $sub_array[] = $row['nombre'];
                            $sub_array[] = $row['curso'];
                            $sub_array[] = $row['division'];
                            $sub_array[] = $row['turno'];
                            $sub_array[] = $row['anio'];
                            $sub_array[] = $row['profesor'];
                
                            if ($_SESSION['rol_id'] == 2) {
                                $sub_array[] = '<button type="button" onClick="ver(' . $row["materia_id"] . ')" id="' . $row["materia_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                                $sub_array[] = '<button type="button" onClick="eliminar('.$row["materia_id"].')" id="'.$row["materia_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                            }else {
                                $sub_array[] = '<button type="button" onClick="ver(' . $row["materia_id"] . ')" id="' . $row["materia_id"] . '" class="btn btn-inline-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                            }

                            $data[] = $sub_array;
                        }
                
                        $results = array(
                            "sEcho" => 1,
                            "iTotalRecords" => count($data),
                            "iTotalDisplayRecords" => count($data),
                            "aaData" => $data
                        );
                        echo json_encode($results);
                        break;

            case "mostrar";
            $datos = $materia->listar_materia_x_id($_POST['materia_id']);
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output['materia_id'] = $row['materia_id'];
                    $output['nombre'] = $row['nombre'];
                    $output['ciclo'] = $row['ciclo'];
                    $output['curso'] = $row['curso'];
                    $output['division'] = $row['division'];
                    $output['turno'] = $row['turno'];
                    $output['anio'] = $row['anio'];
                    $output['profesor'] = $row['profesor'];
                    $output['observaciones'] = $row['observaciones'];
    
                }
                echo json_encode($output);
            }
            break;

            case "mostrarmateriataller";
            $datos = $materia->listar_materia_taller_x_id($_POST['materia_id']);
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output['materia_id'] = $row['materia_id'];
                    $output['nombre'] = $row['nombre'];
                    $output['ciclo'] = $row['ciclo'];
                    $output['curso'] = $row['curso'];
                    $output['anio'] = $row['anio'];
                    $output['profesor'] = $row['profesor'];
                    $output['observaciones'] = $row['observaciones'];
    
                }
                echo json_encode($output);
            }
            break;

            case "mostrarplanificacion";
            $datos = $materia->listar_planificacion_x_id($_POST['planificacion_id']);
            if (is_array($datos) == true and count($datos) > 0) {
                foreach ($datos as $row) {
                    $output['planificacion_id'] = $row['planificacion_id'];
                    $output['nombre'] = $row['nombre'];
                    $output['ciclo'] = $row['ciclo'];
                    $output['curso'] = $row['curso'];
                    $output['division'] = $row['division'];
                    $output['turno'] = $row['turno'];
                    $output['anio'] = $row['anio'];
                    $output['profesor'] = $row['profesor'];
                    $output['observaciones'] = $row['observaciones'];
    
                }
                echo json_encode($output);
            }
            break;

            case "eliminar":
                $materia->delete_materia($_POST["materia_id"]);
            break;

            case "eliminartaller":
                $materia->delete_materia_taller($_POST["materia_id"]);
            break;

}

?>