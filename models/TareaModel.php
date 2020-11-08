<?php

namespace models;

require_once("Conexion.php");

class Tarea{



    public function insert($data){

        $stm = Conexion::conector()->prepare("INSERT INTO TAREAS VALUES(NULL,:nombre,:descripcion)");
        $stm->bindParam(":nombre",$data['nombre']);
        $stm->bindParam(":descripcion",$data['descripcion']);
        return $stm->execute();
        

    }

    public function getAllTareas(){

        $stm = Conexion::conector()->prepare("SELECT * FROM TAREAS");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscarTarea($id){
        $stm = Conexion::conector()->prepare("SELECT * FROM tareas WHERE id=:id");
        $stm->bindParam(":id", $id);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function eliminarTarea($id){

        $stm = Conexion::conector()->prepare("DELETE FROM tareas where id=:id");
        $stm->bindParam(":id", $id);
        return $stm->execute();


    }

    public function editarTarea($id, $data){ 
        
        //$data=["nombre"=>valor1, "descripcion"=>valor]
        $stm = Conexion::conector()->prepare("UPDATE tareas SET nombre=:nombre, descripcion=:descripcion WHERE id=:id");
        $stm->bindParam(":nombre", $data['nombre']);
        $stm->bindParam(":descripcion", $data['descripcion']);
        $stm->bindParam(":id", $id);
        return $stm->execute();
    }





}