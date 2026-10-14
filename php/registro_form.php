<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro | Tech Students</title>
    <link rel="stylesheet" href="../login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="logo">
                <h1>Tech Students</h1>
                <p>Crea tu cuenta para acceder</p>
            </div>
            <h2>Registro Obligatorio</h2>
            <form action="procesar_registro.php" method="POST">
                <div class="campo">
                    <label for="nombre">Nombre de usuario</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
                </div>
                <div class="campo">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" placeholder="correo@domain.com" required>
                </div>
                <div class="campo">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Mínimo 6 caracteres" required>
                </div>
                <button type="submit">Registrarse y Acceder</button>
            </form>
        </div>
    </div>
</body>
</html>