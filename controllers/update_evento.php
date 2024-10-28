<?php
session_start(); 
require '../config/db.php';

$evento_id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM eventos WHERE id = :id");
$stmt->execute(['id' => $evento_id]);
$evento = $stmt->fetch(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $ubicacion = $_POST['ubicacion'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];

    $stmt = $pdo->prepare("UPDATE eventos SET titulo = :titulo, fecha = :fecha, ubicacion = :ubicacion, descripcion = :descripcion, estado = :estado WHERE id = :id");
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':ubicacion', $ubicacion);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':id', $evento_id);
    $stmt->execute();

    $_SESSION['exito_cambio'] = 'El evento ha sido actualizado exitosamente.';
    header("Location: eventos.php");
    exit();
}
?>