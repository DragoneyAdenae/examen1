<?php
session_start();

require '../config/db.php';

$stmt = $pdo->query("SELECT * FROM usuarios");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    for ($i = 0; $i < count($usuarios); $i++) {
        if ($usuarios[$i]['correo_electronico'] === $email && $usuarios[$i]['contrasena'] === $contrasena) {
            $_SESSION['user_nombre'] = $usuarios[$i]['nombre'];
            header("Location: ../views/eventos.php");
            exit();
        }
    }

    header("Location: ../views/login.php");
    exit();
}
?>