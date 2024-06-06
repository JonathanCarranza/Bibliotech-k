<?php

require_once('ILibraryElements.php');

class Categorias implements ILibraryElements {
    private $idCategoria;
    protected $nombreCategoria;

    private $arregloCategorias;

    public function __construct($arregloCategorias) {
        $this->arregloCategorias = $arregloCategorias;
    }

    public function setCategoria($idCategoria, $nombreCategoria) {
        $this->idCategoria = $idCategoria;
        $this->nombreCategoria = $nombreCategoria;
    }

    public function crearElemento() {
        try {
            $categoria = (object) [
                "idCategoria" => $this->idCategoria,
                "nombreCategoria" => $this->nombreCategoria
            ];
            array_push($this->arregloCategorias, $categoria);
            echo "<br>";
            echo "Categoría creada exitosamente";
            echo "<br>";
        } catch (\Throwable $th) {
            echo "<br>";
            echo "Ha ocurrido un error al ingresar la categoría: " . $th;
            echo "<br>";
        }
    }

    public function actualizarElemento($nombreElemento, $informacionActualizada) {
        foreach ($this->arregloCategorias as $categoria) {
            if ($categoria->nombreCategoria == $nombreElemento) {
                $categoria = $informacionActualizada;
            }
        }
    }

    public function eliminarElemento($nombreElemento) {
        foreach ($this->arregloCategorias as $clave => $categoria) {
            if ($categoria->nombreCategoria == $nombreElemento) {
                unset($this->arregloCategorias[$clave]);
                return true;
            }
        }
        return false;
    }

    public function obtenerCategorias() {
        foreach ($this->arregloCategorias as $categoria) {
            echo "<br>";
            echo "Id de la categoría: " . $categoria->idCategoria . ", Categoría: " . $categoria->nombreCategoria;
        }
    }
}

// Datos de ejemplo
$categorias = array(
    (object) [
        "idCategoria" => 1,
        "nombreCategoria" => "FICCIÓN"
    ],
    (object) [
        "idCategoria" => 2,
        "nombreCategoria" => "POESÍA"
    ],
    (object) [
        "idCategoria" => 3,
        "nombreCategoria" => "ARTE"
    ],
    (object) [
        "idCategoria" => 4,
        "nombreCategoria" => "CIENCIAS"
    ],
);

$categoria = new Categorias($categorias);
$categoria->setCategoria(5, "HUMANIDADES");
$categoria->crearElemento();
$categoria->obtenerCategorias();

echo "<br>";

?>
