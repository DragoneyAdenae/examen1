<?php
session_start();
require '../config/db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE correo_electronico = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $_SESSION['error'] = "El correo ya existe.";
        header("Location: ../views/login.php");
        exit();
    }


    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, correo_electronico, contrasena) VALUES (:nombre, :email, :contrasena)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->execute();

        header("Location: ../views/login.php");
        exit();
    } catch (PDOException $e) {
        die("Error en la consulta SQL: " . $e->getMessage());
    }
}
?>