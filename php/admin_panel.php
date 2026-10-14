<?php
require_once 'conexion.php';
$mensajes = $pdo->query("SELECT * FROM mensajes_contacto ORDER BY fecha DESC")->fetchAll();
$usuarios = $pdo->query("SELECT id, nombre, correo, fecha_registro FROM usuarios ORDER BY fecha_registro DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrativo - Tech Students</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        body { background: var(--gris); padding: 40px 20px; }
        .admin-box { max-width: 1000px; margin: 0 auto; background: white; padding: 30px; border-radius: var(--radio); box-shadow: var(--sombra); }
        h1 { color: var(--oscuro); margin-bottom: 10px; }
        h2 { color: var(--naranja-oscuro); margin-top: 30px; margin-bottom: 15px; font-size: 18px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 10px; border: 1px solid var(--borde); text-align: left; font-size: 13px; }
        th { background: #fff3e4; color: var(--oscuro); }
    </style>
</head>
<body>
    <div class="admin-box">
        <h1>Panel Administrativo</h1>
        <p>Visualización en tiempo real de registros y mensajes de contacto.</p>

        <h2>Mensajes de Contacto</h2>
        <table>
            <tr><th>Nombre</th><th>Correo</th><th>Mensaje</th><th>Fecha</th></tr>
            <?php foreach ($mensajes as $m): ?>
            <tr>
                <td><?= htmlspecialchars($m['nombre']) ?></td>
                <td><?= htmlspecialchars($m['correo']) ?></td>
                <td><?= htmlspecialchars($m['mensaje']) ?></td>
                <td><?= $m['fecha'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <h2>Usuarios Registrados</h2>
        <table>
            <tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Fecha Registro</th></tr>
            <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= htmlspecialchars($u['nombre']) ?></td>
                <td><?= htmlspecialchars($u['correo']) ?></td>
                <td><?= $u['fecha_registro'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="../index.html" class="boton">← Volver al sitio principal</a>
    </div>
</body>
</html>