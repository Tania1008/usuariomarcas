<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

$marcaActual = (isset($_POST['marcaActual'])) ? $_POST['marcaActual'] : NULL;
$marcaNueva = (isset($_POST['marcaNueva'])) ? $_POST['marcaNueva'] : NULL;

$buscar =   (isset($_POST['buscar'])) ? $_POST['buscar'] : NULL;

switch ($opcion) {
    case "listar":
        $consulta   = "SELECT * FROM marcas";
        $resultado  = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case "buscar":
        $consulta="SELECT * FROM marcas
        WHERE marca LIKE '%".$buscar."%'";
        $resultado=$conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case "crear":
        $consulta="INSERT INTO marcas (marca) VALUES ('$marcaNueva')";
        print $consulta;
        $resultado=$conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case "editar":
        $consulta = "UPDATE moviles SET marca = '$marcaNueva' WHERE marca ='$marcaActual'";
        $resultado1=$conexion->prepare($consulta);
        $resultado1->execute();
        $consulta="UPDATE marcas SET marca='$marcaNueva' WHERE marca='$marcaActual'";
        $resultado=$conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

    case "eliminar":
        $consulta="DELETE FROM marcas WHERE marca='$marcaActual'";
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


