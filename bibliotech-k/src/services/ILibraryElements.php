<?php
interface ILibraryElements {
    public function crearElemento();
    public function actualizarElemento($nombreElemento, $informacionActualizada);
    public function eliminarElemento($nombreElemento);
}
?>
