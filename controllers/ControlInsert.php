<?php


namespace controllers;
require_once("../models/TareaModel.php");
use models\Tarea as Tarea;

class ControlInsert{

    public $nombre;
    public $descripcion;

    public function __construct(){

        $this->nombre = $_POST['nombre'];
        $this->descripcion = $_POST['descripcion'];
        
    }

    public function guardarTarea(){
        session_start();
        if($this->nombre=="" || $this->descripcion==""){
            $_SESSION['resp']="campos pelaos";
            header("Location: ../index.php");
            return;

        }

        $model = new Tarea();

        $data = ["nombre"=>$this->nombre, "descripcion"=>$this->descripcion];

        $count = $model->insert($data);

        if($count==1){

            $_SESSION['resp']="Tarea Creada con exito";

        }else{

            $_SESSION['resp']="Hubo un error a nivel de base de datos";

        }

        header("Location: ../index.php");

    }



}

$obj = new ControlInsert();
$obj->guardarTarea();