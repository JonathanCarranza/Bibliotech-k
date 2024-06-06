<?php
require_once('ILibraryElements.php');
require_once('Autores.php');  // Cambia esto si el nombre de tu archivo de autores es diferente
require_once('category.service.php');

trait ExtenderCategoria {
    protected $nombreCategoria;
}

class Libros extends Autores implements ILibraryElements {
    private $idLibro;
    public $tituloLibro;
    public $subtituloLibro;
    public $nombreAutor;
    public $anioPublicacion;
    public $nombreEditorial;
    public $isbn;
    public $totalPaginasLibro;
    public $categoria;
    public $numeroCopias;
    public $copiasPrestadas;
    public $copiasDisponibles;

    private $arregloLibros;

    public function __construct($arregloLibros) {
        $this->arregloLibros = $arregloLibros;
    }

    public function setLibro($idLibro, $tituloLibro, $subtituloLibro, $nombreAutor, $anioPublicacion, $nombreEditorial, $isbn, $totalPaginasLibro, $categoria, $numeroCopias, $copiasPrestadas, $copiasDisponibles) {
        $this->idLibro = $idLibro;
        $this->tituloLibro = $tituloLibro;
        $this->subtituloLibro = $subtituloLibro;
        $this->nombreAutor = $nombreAutor;
        $this->anioPublicacion = $anioPublicacion;
        $this->nombreEditorial = $nombreEditorial;
        $this->isbn = $isbn;
        $this->totalPaginasLibro = $totalPaginasLibro;
        $this->categoria = $categoria;
        $this->numeroCopias = $numeroCopias;
        $this->copiasPrestadas = $copiasPrestadas;
        $this->copiasDisponibles = $copiasDisponibles;
    }

    public function crearElemento() {
        $libro = (object) [
            "idLibro" => $this->idLibro,
            "tituloLibro" => $this->tituloLibro,
            "subtituloLibro" => $this->subtituloLibro,
            "nombreAutor" => $this->nombreAutor,
            "anioPublicacion" => $this->anioPublicacion,
            "nombreEditorial" => $this->nombreEditorial,
            "isbn" => $this->isbn,
            "totalPaginasLibro" => $this->totalPaginasLibro,
            "categoria" => $this->categoria,
            "numeroCopias" => $this->numeroCopias,
            "copiasPrestadas" => $this->copiasPrestadas,
            "copiasDisponibles" => $this->copiasDisponibles
        ];

        array_push($this->arregloLibros, $libro);
    }

    public function actualizarElemento($nombreElemento, $informacionActualizada) {
        foreach ($this->arregloLibros as $libro) {
            if ($libro->tituloLibro == $nombreElemento) {
                $libro = $informacionActualizada;
            }
        }
    }

    public function eliminarElemento($nombreElemento) {
        foreach ($this->arregloLibros as $clave => $libro) {
            if ($libro->tituloLibro == $nombreElemento) {
                unset($this->arregloLibros[$clave]);
                return true;
            }
        }
        return false;
    }

    public function buscarLibro() {
        // Implementación del método buscarLibro
    }

    public function obtenerLibros() {
        foreach ($this->arregloLibros as $libro) {
            print_r($libro);
        }
    }
}

// Datos de ejemplo
$libros = array(
    (object) [
        "idLibro" => 1,
        "tituloLibro" => "Ponle Play",
        "subtituloLibro" => "",
        "nombreAutor" => "Flor Aguilera",
        "anioPublicacion" => 2011,
        "nombreEditorial" => "Alfaguara",
        "isbn" => "978-607-111-587-4",
        "totalPaginasLibro" => 230,
        "categoria" => "Social",
        "numeroCopias" => 4,
        "copiasPrestadas" => 1,
        "copiasDisponibles" => 10
    ],
    (object) [
        "idLibro" => 2,
        "tituloLibro" => "Dracula",
        "subtituloLibro" => "",
        "nombreAutor" => "Bram Stoker",
        "anioPublicacion" => 1897,
        "nombreEditorial" => "Norma Editorial",
        "isbn" => "978-999-615-209-2",
        "totalPaginasLibro" => 150,
        "categoria" => "Novela gótica",
        "numeroCopias" => 2,
        "copiasPrestadas" => 1,
        "copiasDisponibles" => 1
    ],
    
);

$libro = new Libros($libros);
$libro->obtenerLibros();
?>
