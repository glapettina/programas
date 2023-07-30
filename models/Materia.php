<?php

    class Materia extends Conectar{

        public function insert_materia($nombre, $ciclo, $curso, $division, $turno, $anio, $profesor, $observaciones){

            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO materias (materia_id, nombre, ciclo, curso, division, turno, anio, profesor, observaciones, estado) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, 1)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $ciclo);
            $sql->bindValue(3, $curso);
            $sql->bindValue(4, $division);
            $sql->bindValue(5, $turno);
            $sql->bindValue(6, $anio);
            $sql->bindValue(7, $profesor);
            $sql->bindValue(8, $observaciones);
            $sql->execute();

            $sql1 = "SELECT last_insert_id() as 'materia_id'";
            $sql1 = $conectar->prepare($sql1);
            $sql1->execute();
            return $resultado = $sql1->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_materia_taller($nombre, $ciclo, $curso, $anio, $profesor, $observaciones){

            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO materias_taller (materia_id, nombre, ciclo, curso, anio, profesor, observaciones, estado) VALUES (NULL, ?, ?, ?, ?, ?, ?, 1)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $ciclo);
            $sql->bindValue(3, $curso);
            $sql->bindValue(4, $anio);
            $sql->bindValue(5, $profesor);
            $sql->bindValue(6, $observaciones);
            $sql->execute();

            $sql1 = "SELECT last_insert_id() as 'materia_id'";
            $sql1 = $conectar->prepare($sql1);
            $sql1->execute();
            return $resultado = $sql1->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_materia_planificacion($nombre, $ciclo, $curso, $division, $turno, $anio, $profesor, $observaciones){

            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO planificaciones (planificacion_id, nombre, ciclo, curso, division, turno, anio, profesor, observaciones, estado) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, 1)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $ciclo);
            $sql->bindValue(3, $curso);
            $sql->bindValue(4, $division);
            $sql->bindValue(5, $turno);
            $sql->bindValue(6, $anio);
            $sql->bindValue(7, $profesor);
            $sql->bindValue(8, $observaciones);
            $sql->execute();

            $sql1 = "SELECT last_insert_id() as 'planificacion_id'";
            $sql1 = $conectar->prepare($sql1);
            $sql1->execute();
            return $resultado = $sql1->fetchAll(PDO::FETCH_ASSOC);
        }
        

        public function listar_primero_cb()
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM materias WHERE ciclo = 'BASICO' AND curso = 'PRIMERO' AND estado = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }


        public function listar_materia_x_id($materia_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM materias
                WHERE
                estado = 1
                AND materia_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $materia_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function listar_materia_taller_x_id($materia_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM materias_taller
                WHERE
                estado = 1
                AND materia_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $materia_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function listar_planificacion_x_id($planificacion_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM planificaciones
                WHERE
                estado = 1
                AND planificacion_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $planificacion_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function filtrar_materia_basico($curso, $division, $turno, $anio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call filtrar_materia(?, ?, ?, ?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $curso);
            $sql->bindValue(2, $division);
            $sql->bindValue(3, $turno);
            $sql->bindValue(4, $anio);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function filtrar_materia_basico_taller($curso, $anio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call filtrar_materia_taller(?, ?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $curso);
            $sql->bindValue(2, $anio);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function filtrar_materia_planificacion_basico($curso, $division, $turno, $anio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call filtrar_materia_planificacion_basico(?, ?, ?, ?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $curso);
            $sql->bindValue(2, $division);
            $sql->bindValue(3, $turno);
            $sql->bindValue(4, $anio);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function filtrar_materia_planificacion_superior_a($curso, $division, $turno, $anio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call filtrar_materia_planificacion_alimentacion(?, ?, ?, ?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $curso);
            $sql->bindValue(2, $division);
            $sql->bindValue(3, $turno);
            $sql->bindValue(4, $anio);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function filtrar_materia_planificacion_superior_e($curso, $division, $turno, $anio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call filtrar_materia_planificacion_electro(?, ?, ?, ?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $curso);
            $sql->bindValue(2, $division);
            $sql->bindValue(3, $turno);
            $sql->bindValue(4, $anio);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function filtrar_materia_superior_a($curso, $division, $turno, $anio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call filtrar_materia_alimentacion(?, ?, ?, ?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $curso);
            $sql->bindValue(2, $division);
            $sql->bindValue(3, $turno);
            $sql->bindValue(4, $anio);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function filtrar_materia_taller_superior_a($curso, $anio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call filtrar_materia_taller_alimentacion(?, ?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $curso);
            $sql->bindValue(2, $anio);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function filtrar_materia_superior_e($curso, $division, $turno, $anio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call filtrar_materia_electro(?, ?, ?, ?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $curso);
            $sql->bindValue(2, $division);
            $sql->bindValue(3, $turno);
            $sql->bindValue(4, $anio);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function filtrar_materia_taller_superior_e($curso, $anio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call filtrar_materia_taller_electro(?, ?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $curso);
            $sql->bindValue(2, $anio);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_materia($materia_id)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE materias SET estado = '0' WHERE materia_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $materia_id);            
            $sql->execute();
        }

        public function delete_materia_taller($materia_id)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE materias_taller SET estado = '0' WHERE materia_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $materia_id);            
            $sql->execute();
        }

      
    }

?>