<?php
require '../config/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM eventos WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: ../views/eventos.php");
exit();
?>