<?php



use models\Tarea as Tarea;

require_once("../models/TareaModel.php");

class ControlEdit{

    public $id;
    public $nombre;
    public $descripcion;

    public function __construct()
    {
        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];
        $this->descripcion = $_POST['descripcion'];
    }

    public function editar(){

        session_start();
        if($this->nombre==""||$this->nombre==""){
            $_SESSION['error_edit']="complete los campos";
            header("Location: ../index.php");
            return null;
        }

        $data =['nombre'=>$this->nombre, 'descripcion'=>$this->descripcion];
        $modelo=new Tarea();

        $count = $modelo->editarTarea($this->id,$data);

        if($count==1){

            $_SESSION["ok_edit"] = "Tarea Actualizada";

        }else{

            $_SESSION["error_edit"] = "Error en la BD";

        }

        header("Location: ../index.php");

    }

}

$obj = new ControlEdit();
$obj -> editar();