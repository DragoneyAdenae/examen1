<!DOCTYPE html>
<html>
<head>
    <title>Crear evento</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        crossorigin="anonymous" />
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
            <div class="container">
                <div>
                    <a type="button" class="btn btn-outline-info btn-sm" href="eventos.php"><i class="fas fa-long-arrow-alt-left"></i> Volver</a>
                    <span class="navbar-brand"> &nbsp; Registrar Evento</span>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-4">
        <form action="../controllers/create_evento.php" method="POST">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título del Evento</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required placeholder="Ingrese el título del evento">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha del Evento</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required min="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación del Evento</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" required  placeholder="Ingrese la ubicación del evento">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción del Evento</label>
                <textarea class="form-control" id="descripcion" rows="5" name="descripcion" required  placeholder="Ingrese la descripción del evento"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100">GUARDAR</button>
        </form>
    </main>
    

    <br>
</body>
</html>
