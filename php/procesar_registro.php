<?php
require_once 'conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, correo, password) VALUES (?, ?, ?)");
        $stmt->execute([$nombre, $correo, $password]);
        echo "<script>
            alert('¡Registro exitoso! Ya puedes iniciar sesión.');
            window.location.href = '../login.html';
        </script>";
    } catch (PDOException $e) {
        echo "<script>alert('El correo o usuario ya existe en la base de datos.'); window.history.back();</script>";
    }
}
?>