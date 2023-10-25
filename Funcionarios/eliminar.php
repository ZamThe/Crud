<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM funcionarios WHERE IDFuncionario = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");  
        exit();
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}

$conn->close();
?>

<?php
include '../Conexion.php';

// Eliminar un registro si se proporciona el parámetro "eliminar"
if (isset($_GET['eliminar'])) {
    $idGrupoFamiliar = intval($_GET['eliminar']); // Convertir a entero para evitar inyección SQL

    // Eliminar registros relacionados en la tabla miembrosgrupofamiliar
    $queryMiembros = $conn->prepare("DELETE FROM miembrosgrupofamiliar WHERE IDGrupoFamiliar = ?");
    $queryMiembros->bind_param("i", $idGrupoFamiliar);

    if ($queryMiembros->execute()) {
        // Eliminar el registro en la tabla gruposfamiliares después de eliminar los registros relacionados
        $queryGrupos = $conn->prepare("DELETE FROM gruposfamiliares WHERE IDGrupoFamiliar = ?");
        $queryGrupos->bind_param("i", $idGrupoFamiliar);

        if ($queryGrupos->execute()) {
            echo "Registro eliminado con éxito.";
        } else {
            echo "Error al eliminar el registro en la tabla gruposfamiliares: " . $conn->error;
        }
    } else {
        echo "Error al eliminar registros relacionados en la tabla miembrosgrupofamiliar: " . $conn->error;
    }

    $queryMiembros->close();
    $queryGrupos->close();
}

// Resto del código del formulario y la tabla...
?>
