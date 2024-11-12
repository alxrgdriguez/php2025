<?php

namespace App\Controladores;

use App\Modelos\ModeloUsuarios;
use App\Modelos\Usuario;
use App\vistas\VistaLogin;

class ControladorUsuarios {

    // Método para registrar un usuario
    public static function registro($nombre, $email, $password) {
        // 1. Verificar si el correo ya está registrado
        if (ModeloUsuarios::getByEmail($email)) {
            // Si ya existe, mostramos un error
            VistaLogin::render("El correo electrónico ya está registrado.");
            return;
        }

        // 2. Hashear la contraseña
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        // 3. Crear el objeto usuario
        $usuario = new Usuario($nombre, $email, $password_hash);

        // 4. Guardar el usuario en la base de datos
        $resultado = ModeloUsuarios::guardarUsuario($usuario);

        // 5. Verificar si la inserción fue exitosa
        if ($resultado) {
            VistaLogin::render("Usuario registrado exitosamente. ¡Ahora puedes iniciar sesión!");
        } else {
            VistaLogin::render("Hubo un error al registrar el usuario.");
        }
    }

    // Método para hacer login
    public static function login($email, $password) {
        // Obtener el usuario por email
        $usuario = ModeloUsuarios::getByEmail($email);

        // Verificar si el usuario existe
        if ($usuario) {
            // Verificar si la contraseña es correcta
            if (password_verify($password, $usuario->getPassword())) {
                // Iniciar sesión si la contraseña es correcta
                $_SESSION['usuario'] = $usuario->getEmail();
                header("Location: index.php");
                exit();
            } else {
                // Si la contraseña es incorrecta
                VistaLogin::render("Contraseña incorrecta.");
            }
        } else {
            // Si el usuario no existe
            VistaLogin::render("El correo electrónico no está registrado.");
        }
    }

    public static function mostrarLogin($error) {
        VistaLogin::render($error);
    }
}

