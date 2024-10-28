<?php 
require '../controllers/update_evento.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Crear evento</title>
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
                <div>
                    <a type="button" class="btn btn-outline-info btn-sm" href="eventos.php"><i
                            class="fas fa-long-arrow-alt-left"></i> Volver</a>
                    <span class="navbar-brand"> &nbsp; Actualizar Evento</span>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-4">
        <form action="" method="POST">

            <div class="mb-3">
                <label for="titulo" class="form-label">Título del Evento</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $evento['titulo']; ?>" required
                    placeholder="Ingrese el título del evento">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha del Evento</label>
                <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $evento['fecha']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación del Evento</label>
                <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="<?php echo $evento['ubicacion']; ?>"
                    required placeholder="Ingrese la ubicación del evento">
            </div>
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Estado del Evento &nbsp;</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="estado" id="exampleRadios1" value="0"
                        <?php echo ($evento['estado'] == 0) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="exampleRadios1">
                        Cancelado
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="estado" id="exampleRadios2" value="1"
                        <?php echo ($evento['estado'] == 1) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="exampleRadios2">
                        Activo
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="estado" id="exampleRadios3" value="2"
                        <?php echo ($evento['estado'] == 2) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="exampleRadios3">
                        Pasado
                    </label>
                </div>

            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción del Evento</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="5" 
                    placeholder="Ingrese la descripción del evento"><?php echo $evento['descripcion']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-lg w-100">ACTUALIZAR</button>
        </form>
    </main>
</body>

</html>