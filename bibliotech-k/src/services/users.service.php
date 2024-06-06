<?php
require_once('ILibraryElements.php');

class Usuarios implements ILibraryElements {
    private $idUsuario;
    public $nombreCompleto;
    public $correoUsuario;
    private $contrasena;
    public $numeroTelefono;
    public $tituloLibro;
    public $libroPrestado;
    public $libroDevuelto;

    private $arregloUsuarios = [];

    public function __construct($arregloUsuarios) {
        $this->arregloUsuarios = $arregloUsuarios;
    }

    public function setUsuario($idUsuario, $nombreCompleto, $correoUsuario, $contrasena, $numeroTelefono) {
        $this->idUsuario = $idUsuario;
        $this->nombreCompleto = $nombreCompleto;
        $this->correoUsuario = $correoUsuario;
        $this->contrasena = $contrasena;
        $this->numeroTelefono = $numeroTelefono;
    }

    public function crearElemento() {
        try {
            $usuario = (object) [
                "idUsuario" => $this->idUsuario,
                "nombreCompleto" => $this->nombreCompleto,
                "correoUsuario" => $this->correoUsuario,
                "contrasena" => $this->contrasena,
                "numeroTelefono" => $this->numeroTelefono
            ];
            array_push($this->arregloUsuarios, $usuario);
            echo "<br>";
            echo "Usuario creado exitosamente";
            echo "<br>";
        } catch (\Throwable $th) {
            echo "<br>";
            echo "Ha ocurrido un error al ingresar el usuario: " . $th;
            echo "<br>";
        }
    }

    public function actualizarElemento($nombreElemento, $informacionActualizada) {
        foreach ($this->arregloUsuarios as $usuario) {
            if ($usuario->nombreCompleto == $nombreElemento) {
                $usuario->nombreCompleto = $informacionActualizada['nombreCompleto'];
                $usuario->correoUsuario = $informacionActualizada['correoUsuario'];
                $usuario->contrasena = $informacionActualizada['contrasena'];
                $usuario->numeroTelefono = $informacionActualizada['numeroTelefono'];
                echo "<br>";
                echo "Información del usuario actualizada exitosamente";
                echo "<br>";
            }
        }
    }

    public function eliminarElemento($nombreElemento) {
        foreach ($this->arregloUsuarios as $clave => $usuario) {
            if ($usuario->nombreCompleto == $nombreElemento) {
                unset($this->arregloUsuarios[$clave]);
                echo "<br>";
                echo "Usuario eliminado exitosamente";
                echo "<br>";
                return true;
            }
        }
        return false;
    }

    public function prestarLibro($tituloLibro) {
        // Implementa la lógica para prestar un libro a un usuario
    }

    public function devolverLibro($tituloLibro) {
        // Implementa la lógica para registrar la devolución de un libro por parte de un usuario
    }
}

// Datos de ejemplo
$usuarios = array(
    (object) [
        "idUsuario" => 1,
        "nombreCompleto" => "Juan Perez",
        "correoUsuario" => "juan.perez@example.com",
        "contrasena" => "password123",
        "numeroTelefono" => "123456789"
    ],
    (object) [
        "idUsuario" => 2,
        "nombreCompleto" => "Maria Lopez",
        "correoUsuario" => "maria.lopez@example.com",
        "contrasena" => "password456",
        "numeroTelefono" => "987654321"
    ],
);

$usuario = new Usuarios($usuarios);
$usuario->setUsuario(3, "Carlos Sanchez", "carlos.sanchez@example.com", "password789", "456123789");
$usuario->crearElemento();
$usuario->actualizarElemento("Maria Lopez", [
    'nombreCompleto' => "Maria Lopez",
    'correoUsuario' => "maria.lopez@example.com",
    'contrasena' => "newpassword456",
    'numeroTelefono' => "111222333"
]);
$usuario->eliminarElemento("Juan Perez");

?>
