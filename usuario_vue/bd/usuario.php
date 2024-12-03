<?php
include_once "conexion.php";
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

session_start();
$nombreActual   = $_SESSION['usuario'];
$nombreNuevo    = (isset($_POST['nombreNuevo'])) ? $_POST['nombreNuevo'] : '';
$contraActual   = (isset($_POST['contraActual'])) ? $_POST['contraActual'] : '';
$contraActual   = md5($contraActual);
$contraNueva    = (isset($_POST['contraNueva'])) ? $_POST['contraNueva'] : NULL;
$contraNueva    = md5($contraNueva);
$contraConfirm  = (isset($_POST['contraConfirm'])) ? $_POST['contraConfirm'] : NULL;

switch($opcion){
    case "cambiarNombre":
        $consulta = "UPDATE usuarios SET usuario = '$nombreNuevo' WHERE usuario = '$nombreActual'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['usuario'] = $nombreNuevo;
        break;

    case "cambiarContra":
        $consulta   = "SELECT COUNT(*) FROM USUARIOS WHERE usuario = '$nombreActual' AND contra = '$contraActual'";
        $resultado1 = $conexion->prepare($consulta);
        $resultado1->execute();
        $data = $resultado1->fetchColumn();
        if ($data==0) {
            break;
        }else{
            $consulta = "UPDATE usuarios
            SET contra = '$contraNueva'
            WHERE usuario = '$nombreActual'";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        break;


}

print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = null;
?>
        