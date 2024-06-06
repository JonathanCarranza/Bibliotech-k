<?php
    require_once('ILibraryElements.php');
    
    class Autores implements ILibraryElements {
    
        private $idAutor;
        protected $nombreAutor;
        protected $nacionalidadAutor;
    
        public $arregloAutores;
    
        public function __construct($arregloAutores) {
            $this->arregloAutores = $arregloAutores;
        }
    
        public function setAutor($idAutor, $nombreAutor, $nacionalidadAutor) {
            $this->idAutor = $idAutor;
            $this->nombreAutor = $nombreAutor;
            $this->nacionalidadAutor = $nacionalidadAutor;
        }
    
        public function crearElemento() {
            try {
                $autor = (object) [
                    "idAutor" => $this->idAutor,
                    "nombreAutor" => $this->nombreAutor,
                    "nacionalidadAutor" => $this->nacionalidadAutor
                ];
    
                array_push($this->arregloAutores, $autor);
                echo "<br>";
                echo "Autor creado exitosamente...";
                echo "<br>";
            } catch (\Throwable $th) {
                echo "<br>";
                echo "Ocurrió un error al tratar de crear un nuevo Autor: " . $th;
            }
        }
    
        function actualizarElemento($nombreElemento, $informacionActualizada) {
            foreach ($this->arregloAutores as $autor) {
                if ($autor->nombreAutor == $nombreElemento) {
                    $autor = $informacionActualizada;
                    echo "<br>";
                    echo "Información del autor modificada exitosamente...";
                    break;
                }
            }
        }
    
        public function eliminarElemento($nombreElemento) {
            foreach ($this->arregloAutores as $clave => $autor) {
                if ($autor->nombreAutor == $nombreElemento) {
                    // Eliminar el autor del arreglo
                    unset($this->arregloAutores[$clave]);
                    return true;
                }
            }
            return false;
        }
    
        public function obtenerAutores() {
            print_r($this->arregloAutores);
        }
    }
    
    $autores = array(
        (object) [
            "idAutor" => 1,
            "nombreAutor" => "JOE ABERCROMBIE",
            "nacionalidadAutor" => "Reino Unido"
        ],
        (object) [
            "idAutor" => 2,
            "nombreAutor" => "CHRISTINA ROSSETTI",
            "nacionalidadAutor" => "Reino Unido"
        ],
        (object) [
            "idAutor" => 3,
            "nombreAutor" => "JEREMY EICHLER",
            "nacionalidadAutor" => "Estados Unidos"
        ],
    );
    
    $autor = new Autores($autores);
    $autor->setAutor(4, "Melanie Mitchell", "Estados Unidos");
    $autor->crearElemento();
    $autor->obtenerAutores();
    
    $contarAutores = count($autor->arregloAutores);
    echo "<br><br>";
    echo "Cantidad de autores en el arreglo: " . $contarAutores;
    echo "<br><br>";
    
    $nombreAutor = "CHRISTINA ROSSETTI";
    if ($autor->eliminarElemento($nombreAutor)) {
        echo "<br><br>";
        echo "El autor: " . $nombreAutor . " fue eliminado de la lista de autores satisfactoriamente";
        echo "<br><br>";
    } else {
        echo "<br><br>";
        echo "El autor: " . $nombreAutor . " no se encuentra en la lista de autores";
        echo "<br><br>";
    }
    
    $autor->obtenerAutores();
?>
    