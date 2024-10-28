<?php
session_start(); 
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $ubicacion = $_POST['ubicacion'];
    $descripcion = $_POST['descripcion'];

    

    try {
        $stmt = $pdo->prepare("INSERT INTO eventos (titulo, fecha, ubicacion, descripcion, estado) VALUES (:titulo, :fecha, :ubicacion, :descripcion, 1)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':ubicacion', $ubicacion);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->execute();

        $_SESSION['exito_evento'] = 'El evento ha sido creado exitosamente.';
        header("Location: ../views/eventos.php");
        exit();
    } catch (PDOException $e) {
        die("Error en la consulta SQL: " . $e->getMessage());
    }
}
?>