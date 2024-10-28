<?php
session_start(); 

if (isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro y Autenticación</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
           <div class="container">
            <h1 style="color: white;">Login App</h1>
           </div>
        </nav>
    </header>

    <main class="container mt-4">

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="registro-tab" data-bs-toggle="tab" href="#registro" role="tab" aria-controls="registro" aria-selected="true">Registro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="autenticacion-tab" data-bs-toggle="tab" href="#autenticacion" role="tab" aria-controls="autenticacion" aria-selected="false">Autenticación</a>
            </li>
        </ul>

        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="registro" role="tabpanel" aria-labelledby="registro-tab">
                <form action="../controllers/create_user.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"  placeholder="Ingrese su email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="contrasena" minlength="4" placeholder="Ingrese su contraseña">
                    </div>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </form>
            </div>
            <div class="tab-pane fade" id="autenticacion" role="tabpanel" aria-labelledby="autenticacion-tab">
                
                <form action="../controllers/read_users.php" method="POST">
                    <div class="mb-3">
                        <label for="email_login" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email_login" placeholder="Ingrese su email">
                    </div>
                    <div class="mb-3">
                        <label for="password_login" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" id="password_login" placeholder="Ingrese su contraseña">
                    </div>
                    <button type="submit" class="btn btn-success">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>
