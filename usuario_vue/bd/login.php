<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);

$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : NULL;
$contra = (isset($_POST['contra'])) ? ($_POST['contra']) : NULL;

$consulta = "SELECT COUNT(*) FROM usuarios WHERE usuario = '$usuario'";
$resultado1 = $conexion->prepare($consulta);
$resultado1->execute();
$data1 = $resultado1->fetchColumn();

$consulta = "SELECT COUNT(*) FROM usuarios WHERE usuario = '$usuario' AND contra = '$contra'";
$resultado2 = $conexion->prepare($consulta);
$resultado2->execute();
$data2 = $resultado2->fetchColumn();

if ($data2 == 1) {
    session_start();
    $_SESSION['usuario'] = $usuario;
}


$data = array('usuario' => $data1, 'contra' => $data2);

print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;
?>