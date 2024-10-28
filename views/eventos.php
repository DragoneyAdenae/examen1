<?php
session_start(); 
require '../controllers/read_eventos.php';

$nombreUsuario = isset($_SESSION['user_nombre']) ? $_SESSION['user_nombre'] : 'Invitado';
unset($_SESSION['user_nombre']);

if (isset($_SESSION['exito_evento'])) {
    echo "<script>alert('" . $_SESSION['exito_evento'] . "');</script>";
    unset($_SESSION['exito_evento']);
}
if (isset($_SESSION['exito_cambio'])) {
    echo "<script>alert('" . $_SESSION['exito_cambio'] . "');</script>";
    unset($_SESSION['exito_cambio']);
}


$filtro = isset($_POST['filtro']) ? $_POST['filtro'] : 'todo';

if ($filtro == '1') {
    $stmt = $pdo->query("SELECT * FROM eventos WHERE estado = 1");
} elseif ($filtro == '2') {
    $stmt = $pdo->query("SELECT * FROM eventos WHERE estado = 0");
} elseif ($filtro == '3') {
    $stmt = $pdo->query("SELECT * FROM eventos WHERE estado = 2");
} else {
    $stmt = $pdo->query("SELECT * FROM eventos"); // Para "Todo"
}
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html>

<head>
    <title>Aplicativo de Eventos</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        crossorigin="anonymous" />

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
            <div class="container">
                <div class="row" style="width: 100%;">
                    <div class="col-9">
                        <a class="navbar-brand" href="#"><i class="fas fa-user"></i> &nbsp; Bienvenido
                            <?php echo htmlspecialchars($nombreUsuario); ?></a>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-primary btn-sm w-100" href="crear.php"><i class="fas fa-plus"></i> &nbsp;
                            Crear Evento</a>
                    </div>
                    <div class="col-1">
                        <a class="btn btn-success btn-sm w-100" href="login.php"><i class="fas fa-sign-out-alt"></i>
                            &nbsp; Salir</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-4">
        <h1>Eventos</h1>
        <br>
        <form method="POST" action="">
            <div class="form-floating">
                <select name="filtro" class="form-select" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option value="todo" selected>Todo</option>
                    <option value="1">Activos</option>
                    <option value="2">Cancelados</option>
                    <option value="3">Pasados</option>
                </select>
                <label for="floatingSelect">Filtrar</label>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Aplicar Filtro</button>
        </form>

        <br>
        <div class="row">
            <?php foreach ($eventos as $evento): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between  mb-3">
                            <h5 class="card-title m-0"><?php echo $evento['titulo']; ?></h5>
                            <div>
                                <a href="../controllers/delete_evento.php?id=<?php echo $evento['id']; ?>"
                                    class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                <a href="actualizar.php?id=<?php echo $evento['id']; ?>"
                                    class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                            </div>
                        </div>
                        <p class="card-text mb-1"> <?php echo $evento['descripcion']; ?></p>
                        <p class="card-text mb-1"><strong>Fecha:</strong><?php echo $evento['fecha']; ?></p>
                        <p class="card-text mb-1"><strong>Ubicación:</strong><?php echo $evento['ubicacion']; ?></p>
                        <?php 
                        if($evento['estado'] == 0){?>
                        <span class="badge text-bg-danger w-100">Cancelado</span>
                        <?php } else if($evento['estado'] == 1){?>
                        <span class="badge text-bg-success w-100">Activo</span>
                        <?php } else {?>
                        <span class="badge text-bg-secondary w-100">Pasado</span>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </main>
    <footer class="bg-light text-center py-3">
        <p>Aplicativo de Reserva de Eventos &copy; 2023</p>
    </footer>

</body>

</html>