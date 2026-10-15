<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ingreso = trim($_POST['usuario']); // Lo que el usuario escriba en el input 'usuario' del HTML
    $password = $_POST['password'];

    // Buscamos si coincide con el nombre de usuario O con el correo electrónico
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre = ? OR correo = ?");
    $stmt->execute([$ingreso, $ingreso]);
    $user = $stmt->fetch();

    // Verificamos si el usuario existe y si la contraseña coincide con el hash
    if ($user && password_verify($password, $user['password'])) {
        // Inicio de sesión exitoso
        echo "<script>
            localStorage.setItem('bosco_sesion_activa', 'true');
            window.location.href = '../index.html';
        </script>";
    } else {
        // Error de credenciales
        echo "<script>
            alert('Usuario/Correo o contraseña incorrectos.'); 
            window.history.back();
        </script>";
    }
}
?>