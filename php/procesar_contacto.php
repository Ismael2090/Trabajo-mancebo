<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $mensaje = trim($_POST['mensaje']);

    try {
        $stmt = $pdo->prepare("INSERT INTO mensajes_contacto (nombre, correo, mensaje) VALUES (?, ?, ?)");
        $stmt->execute([$nombre, $correo, $mensaje]);
        echo "<script>
            alert('¡Mensaje enviado con éxito!');
            window.location.href = '../index.html';
        </script>";
    } catch (PDOException $e) {
        echo "<script>alert('Hubo un error al enviar el mensaje.'); window.history.back();</script>";
    }
}
?>