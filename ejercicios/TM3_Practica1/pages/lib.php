<?php
session_start();

/**
 * Función para buscar un email en los usuarios de la sesión y comprobar el password
 * @param $correo
 * @param $contrasena
 * @return int
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

/**
 * Funcion para ganerar un array asociativo de proyectos
 * @return array[]
 */
function generarProyecto() {
    return  [
        [
            'id' => 1,
            'nombre' => 'App Móvil',
            'fechaInicio' => '2023-01-10',
            'fechaFin' => '2023-03-10',
            'dias' => diasTranscurridos('2023-01-10'),
            'estado' => '100%'
        ],
        [
            'id' => 2,
            'nombre' => 'Sistema CRM',
            'fechaInicio' => '2023-02-15',
            'fechaFin' => '2023-04-15',
            'dias' => diasTranscurridos('2023-02-15'),
            'estado' => '75%'
        ],
        [
            'id' => 3,
            'nombre' => 'Rediseño Web',
            'fechaInicio' => '2023-03-01',
            'fechaFin' => '2023-05-01',
            'dias' => diasTranscurridos('2023-03-01'),
            'estado' => '5%'
        ],
        [
            'id' => 4,
            'nombre' => 'Migración Nube',
            'fechaInicio' => '2023-04-05',
            'fechaFin' => '2023-06-05',
            'dias' => diasTranscurridos('2023-04-05'),
            'estado' => '100%'
        ],
        [
            'id' => 5,
            'nombre' => 'Auditoría SI',
            'fechaInicio' => '2023-05-10',
            'fechaFin' => '2023-07-10',
            'dias' => diasTranscurridos('2023-05-10'),
            'estado' => '50%'
        ],
        [
            'id' => 6,
            'nombre' => 'Proyecto F',
            'fechaInicio' => '2023-06-15',
            'fechaFin' => '2023-08-15',
            'dias' => diasTranscurridos('2023-06-15'),
            'estado' => '20%'
        ]
    ];
}


function diasTranscurridos($fechaInicio) {
    $fechaActual = new DateTime();
    $fechaInicioActual = new DateTime($fechaInicio);
    $dias = $fechaActual->diff($fechaInicioActual)->format('%a dias'); // %a saca el calculo de los dias transcurridos
    return $dias;
}

/**
 * Función eliminar un proyecto de la sesión
 * @param $id
 * @return void
 */
function deleteProyecto($id) {
    if (isset($_SESSION['proyectos'])) {
        foreach ($_SESSION['proyectos'] as $key => $proyecto) {
            if ($proyecto['id'] == $id) {
                unset($_SESSION['proyectos'][$key]);
                return $id; // Devuelve el ID del proyecto eliminado
            }
        }
    }
    return null; // Devuelve null si no se encontró el proyecto
}


?>