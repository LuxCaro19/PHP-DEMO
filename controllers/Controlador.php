<?php

namespace controllers;

class Controlador{

    public $nombre;
    public $edad;

    public function __construct(){
        
        $this->nombre = $_POST['nombre'];
        $this->edad = $_POST['edad'];


    }

    public function saludar(){

        session_start();
        if(!is_numeric($this->edad)){
          
            $_SESSION['msg'] = "la edad debe ser numerica";

            header("Location: ../formulario.php");

            return;
        }
        
        $resp = "hola $this->nombre tienes $this->edad años";
        
        $_SESSION['msg'] = $resp;
        header("Location: ../formulario.php");
        


    }



}

$obj = new Controlador();
$obj->saludar();

