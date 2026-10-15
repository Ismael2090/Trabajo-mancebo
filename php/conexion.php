<?php
$archivo_db = __DIR__ . '/database.sqlite';

try {
    $pdo = new PDO("sqlite:" . $archivo_db);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Tabla de usuarios con ID autoincremental, nombre, correo único y contraseña encriptada
    $pdo->exec("CREATE TABLE IF NOT EXISTS usuarios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT NOT NULL,
        correo TEXT NOT NULL UNIQUE,
        password TEXT NOT NULL,
        fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Tabla para los mensajes de contacto
    $pdo->exec("CREATE TABLE IF NOT EXISTS mensajes_contacto (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT NOT NULL,
        correo TEXT NOT NULL,
        mensaje TEXT NOT NULL,
        fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

} catch (PDOException $e) {
    die("Error con la base de datos: " . $e->getMessage());
}
?>