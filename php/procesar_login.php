<?php
require_once 'conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre = ? OR correo = ?");
    $stmt->execute([$usuario, $usuario]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        echo "<script>
            localStorage.setItem('bosco_sesion_activa', 'true');
            window.location.href = '../index.html';
        </script>";
    } else {
        echo "<script>alert('Usuario o contraseña incorrectos.'); window.history.back();</script>";
    }
}
?>