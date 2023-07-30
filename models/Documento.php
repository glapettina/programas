<?php

    class Documento extends Conectar{

        public function insert_documento($materia_id, $doc_nom)
        {
            $conectar = parent::conexion();
            $sql="INSERT INTO td_documento (doc_id,materia_id,doc_nom,fech_crea,est) VALUES (null,?,?,now(),1);";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1, $materia_id);
            $sql->bindParam(2, $doc_nom);
            $sql->execute();
        }

        public function insert_documento_taller($materia_id, $doc_nom)
        {
            $conectar = parent::conexion();
            $sql="INSERT INTO td_documento_taller (doc_id,materia_id,doc_nom,fech_crea,est) VALUES (null,?,?,now(),1);";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1, $materia_id);
            $sql->bindParam(2, $doc_nom);
            $sql->execute();
        }

        public function insert_documento_planificacion($planificacion_id, $doc_nom)
        {
            $conectar = parent::conexion();
            $sql="INSERT INTO td_documento_planificacion (doc_id,planificacion_id,doc_nom,fech_crea,est) VALUES (null,?,?,now(),1);";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1, $planificacion_id);
            $sql->bindParam(2, $doc_nom);
            $sql->execute();
        }

        public function get_documento_x_materia($materia_id)
        {
            $conectar = parent::conexion();
            $sql = "SELECT * FROM td_documento WHERE materia_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1, $materia_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function get_documento_x_materia_taller($materia_id)
        {
            $conectar = parent::conexion();
            $sql = "SELECT * FROM td_documento_taller WHERE materia_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1, $materia_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function get_documento_x_materia_planificacion($planificacion_id)
        {
            $conectar = parent::conexion();
            $sql = "SELECT * FROM td_documento_planificacion WHERE planificacion_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1, $planificacion_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function insert_documento_detalle($tickd_id, $det_nom)
        {
            $conectar = parent::conexion();
            $sql="INSERT INTO td_documento_detalle (det_id,tickd_id,det_nom,est) VALUES (null, ?, ?, 1);";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1, $tickd_id);
            $sql->bindParam(2, $det_nom);
            $sql->execute();
        }

        public function get_documento_detalle_x_ticketd($tickd_id)
        {
            $conectar = parent::conexion();
            $sql = "SELECT * FROM td_documento_detalle WHERE tickd_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(1, $tickd_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

    }

?>