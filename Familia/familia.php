<?php
include '../conexion.php';

function insertarGrupoFamiliar($funcionario_id, $miembro_nombre, $miembro_apellido, $rol) {
    global $conn;

    // Verificar si el funcionario_id existe en la tabla funcionarios
    $verificarExistencia = "SELECT * FROM funcionarios WHERE id = '$funcionario_id'";
    $result = $conn->query($verificarExistencia);

    if ($result->num_rows > 0) {
        // El funcionario_id existe, podemos proceder con la inserción en gruposfamiliares
        $sql = "INSERT INTO gruposfamiliares (funcionario_id, miembro_nombre, miembro_apellido, rol)
                VALUES ('$funcionario_id', '$miembro_nombre', '$miembro_apellido', '$rol')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro insertado correctamente";
        } else {
            echo "Error al insertar el registro: " . $conn->error;
        }
    } else {
        echo "El funcionario con ID $funcionario_id no existe en la tabla funcionarios.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario
    $funcionario_id = $_POST['funcionario_id'];
    $miembro_nombre = $_POST['miembro_nombre'];
    $miembro_apellido = $_POST['miembro_apellido'];
    $rol = $_POST['rol'];

    insertarGrupoFamiliar($funcionario_id, $miembro_nombre, $miembro_apellido, $rol);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Formulario Grupos Familiares</title>
    <!-- Agrega tus estilos CSS si es necesario -->
</head>
<body>
<ul class="dropdown">
    <li class="drop"><a href="#">Crea familia</a></li>
    <li class="drop"><a href="../Grupos/funcionarios.php">Funcionarios</a></li>
    <li><a href="../index.php">Inicio</a></li>
</ul>   

<h2>Formulario Grupos Familiares</h2>

<form action="" method="post">
    <label for="funcionario_id">ID del Funcionario:</label>
    <input type="text" name="funcionario_id" required><br>

    <label for="miembro_nombre">Nombre del Miembro:</label>
    <input type="text" name="miembro_nombre" required><br>

    <label for="miembro_apellido">Apellido del Miembro:</label>
    <input type="text" name="miembro_apellido" required><br>

    <label for="rol">Rol:</label>
    <input type="text" name="rol" required><br>

    <input type="submit" value="Insertar Grupo Familiar">
</form>

<!-- Puedes agregar más contenido HTML según sea necesario -->

</body>
</html>
