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
            if (strcmp($usuario['correo'], $correo) === 0 && strcmp($usuario['contrasena'], $contrasena) === 0) {//hay que poner === 0 para comprobar que sean iguales con el strcmp
                return 1; // Usuario encontrado
            }
        }
    }
    return 0; // Usuario no encontrado
}


/**
 * Funcion para generar un array asociativo de proyectos
 * @return array[]
 */
function generarProyecto() {
    return  [
        [
            'id' => 1,
            'nombre' => 'App Móvil',
            'fechaInicio' => '2023-01-10',
            'fechaFin' => '2023-03-10',
            'dias' => diasTranscurridos('2023-01-10','2023-03-10'),
            'estado' => '100%'
        ],
        [
            'id' => 2,
            'nombre' => 'Sistema CRM',
            'fechaInicio' => '2023-02-15',
            'fechaFin' => '2023-04-15',
            'dias' => diasTranscurridos('2023-02-15', '2023-04-15'),
            'estado' => '75%'
        ],
        [
            'id' => 3,
            'nombre' => 'Rediseño Web',
            'fechaInicio' => '2023-03-01',
            'fechaFin' => '2023-05-01',
            'dias' => diasTranscurridos('2023-03-01', '2023-05-01'),
            'estado' => '5%'
        ],
        [
            'id' => 4,
            'nombre' => 'Migración Nube',
            'fechaInicio' => '2023-04-05',
            'fechaFin' => '2023-06-05',
            'dias' => diasTranscurridos('2023-04-05', '2023-06-05'),
            'estado' => '100%'
        ],
        [
            'id' => 5,
            'nombre' => 'Auditoría SI',
            'fechaInicio' => '2023-05-10',
            'fechaFin' => '2023-07-10',
            'dias' => diasTranscurridos('2023-05-10', '2023-07-10'),
            'estado' => '50%'
        ],
        [
            'id' => 6,
            'nombre' => 'Proyecto F',
            'fechaInicio' => '2023-06-15',
            'fechaFin' => '2023-08-15',
            'dias' => diasTranscurridos('2023-06-15', '2023-07-10'),
            'estado' => '20%'
        ]
    ];
}


/**
 * Función para calcular el número de días transcurridos entre dos fechas
 * @param $fechaInicio
 * @return string
 * @throws DateMalformedStringException
 */
function diasTranscurridos($fechaInicio, $fechaFin)
{
    $fechaActual = new DateTime($fechaFin);
    $fechaInicioActual = new DateTime($fechaInicio);
    $dias = $fechaActual->diff($fechaInicioActual)->format('%a dias'); // %a saca el calculo de los dias transcurridos
    return $dias;
}

function obtenerUltimoIdProyecto() {
    $proyectos = $_SESSION['proyectos'];
    $ultimoProyecto = end($proyectos); // Obtiene el último elemento del array
    return $ultimoProyecto['id']; // Devuelve el ID del último proyecto
}

function recuperarProyectoPorID($id)
{
    // Verifica si la sesión de proyecto está inicializada
    if (isset($_SESSION['proyectos'])) {
        // Recorre el array de proyecto
        foreach ($_SESSION['proyectos'] as $proyecto) {
            // Compara el correo y la contraseña
            if (strcmp($proyecto['id'], $id) === 0 ){
                return $proyecto; // proyecto encontrado
            }
        }
    }
    return 0; // proyecto no encontrado

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
                return $id; // Devuelve el id del proyecto eliminado
            }
        }
    }
    return null; // Devuelve null si no se encontró el proyecto
}

function buscarProyecto($nombre_proyecto){
    // Verifica si la sesión de proyectos está inicializada
    if (isset($_SESSION['proyectos'])) {
        // Recorre el array de proyectos
        foreach ($_SESSION['proyectos'] as $proyecto) {
            // Compara el correo y la contraseña
            if (strcmp($proyecto['nombre'], $nombre_proyecto) === 0 ){
                return 1; // proyecto encontrado
            }
        }
    }
    return 0; // proyecto no encontrado

}

?>