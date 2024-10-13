<?php
session_start();

/**
 * Función para buscar un email en los usuarios de la sesión y comprobar el password
 */
function buscar($correo, $contrasena) {
    // Verifica si la sesión de usuarios está inicializada
    if (isset($_SESSION['usuarios'])) {
        // Recorre el array de usuarios
        foreach ($_SESSION['usuarios'] as $usuario) {
            // Compara el correo y la contraseña
            if ($usuario['correo'] === $correo && $usuario['contrasena'] === $contrasena) {
                return 1; // Usuario encontrado
            }
        }
    }
    return 0; // Usuario no encontrado
}

?>