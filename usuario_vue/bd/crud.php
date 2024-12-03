<?php
include_once 'conexion.php';
$objeto   = new Conexion();
$conexion   = $objeto->Conectar();

$_POST  = json_decode(file_get_contents("php://input"),true);  
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

$id     = (isset($_POST['id'])) ? $_POST['id'] : '';
$marca  = (isset($_POST['marca'])) ? $_POST['marca'] : NULL;
$modelo = (isset($_POST['modelo'])) ? $_POST['modelo'] : NULL;
$stock  = (isset($_POST['stock'])) ? $_POST['stock'] : NULL;

$buscar =   (isset($_POST['buscar'])) ? $_POST['buscar'] : NULL;

switch ($opcion) {
    case "listar":
        $consulta   = "SELECT * FROM moviles";
        $resultado  = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case "buscar":
        $consulta="SELECT * FROM moviles
        WHERE marca LIKE '%".$buscar."%' OR modelo LIKE '%".$buscar."%'";
        $resultado=$conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case "crear":
        $consulta="INSERT INTO moviles (marca, modelo, stock) VALUES ('$marca', '$modelo', '$stock')";
        $resultado=$conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case "editar":
        $consulta="UPDATE moviles SET marca='$marca', modelo='$modelo', stock='$stock' WHERE id=$id";
        $resultado=$conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case "eliminar":
        $consulta="DELETE FROM moviles WHERE id=$id";
        $resultado=$conexion->prepare($consulta);
        $resultado->execute();
        break;
        
    default:
        $data="Opcion no reconocida";
        break;
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion=null;
?>