<?php
include '../Conexion.php';

// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario de manera segura para evitar SQL injection
    $idMiembro = isset($_POST['idMiembro']) ? $_POST['idMiembro'] : "";
    $idGrupoFamiliar = isset($_POST['idGrupoFamiliar']) ? $_POST['idGrupoFamiliar'] : "";
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : "";
    $relacion = isset($_POST['relacion']) ? $_POST['relacion'] : "";

    // Insertar en la tabla miembrosgrupofamiliar
    $query = "INSERT INTO miembrosgrupofamiliar (IDMiembro, IDGrupoFamiliar, Nombre, Apellido, Relacion)
              VALUES ('$idMiembro', '$idGrupoFamiliar', '$nombre', '$apellido', '$relacion')";

    if ($conn->query($query) === TRUE) {
        echo "Registro agregado con éxito";
    } else {
        echo "Error al agregar el registro: " . $conn->error;
    }
}

$conn->close();
?>
