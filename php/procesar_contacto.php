<?php

require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $mensaje = trim($_POST['mensaje']);

    if (!empty($nombre) && !empty($correo) && !empty($mensaje)) {
        try {
           
            $stmt = $pdo->prepare("INSERT INTO mensajes_contacto (nombre, correo, mensaje) VALUES (?, ?, ?)");
            $stmt->execute([$nombre, $correo, $mensaje]);

            echo "<script>
                alert('¡Mensaje enviado con éxito! Gracias por contactarnos.');
                window.location.href = '../index.html#contacto';
            </script>";
        } catch (PDOException $e) {
            echo "<script>
                alert('Error al guardar el mensaje en la base de datos.');
                window.history.back();
            </script>";
        }
    } else {
        echo "<script>
            alert('Por favor, completa todos los campos.');
            window.history.back();
        </script>";
    }
}
?>