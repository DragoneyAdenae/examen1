<?php
require '../config/db.php';

$stmt = $pdo->query("SELECT * FROM eventos");
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>