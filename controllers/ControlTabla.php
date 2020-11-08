<?php

namespace controllers;

use models\Tarea as Tarea;

require_once("../models/TareaModel.php");



class ControlTabla{

    public $bt_editar;
    public $bt_eliminar;

    public function __construct()
    {

        $this->bt_editar = $_POST['bt_editar'];
        $this->bt_eliminar = $_POST['bt_eliminar'];

        
    }




    public function process(){

        if (isset($this->bt_editar)){

            //echo "sha elegiste el bt editar numero $this->bt_editar";
            
            session_start();
            $_SESSION['editar']="ON";
            $modelo = new Tarea();
            $tarea = $modelo->buscarTarea($this->bt_editar);
            $_SESSION['tarea']=$tarea[0];

            header("Location: ../index.php");

        }else{

            $modelo = new Tarea();
            $modelo->eliminarTarea($this->bt_eliminar);
            header("Location: ../index.php");

        }


    }



}

$obj = new ControlTabla();
$obj -> process();