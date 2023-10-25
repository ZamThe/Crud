<?php
include '../conexion.php';
$id = 0;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM funcionarios WHERE IDFuncionario = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró el registro.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario de edición y actualizar en la base de datos
    $tipoIdentificacion = $_POST['tipo_identificacion'];
    $numeroIdentificacion = $_POST['numero_identificacion'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $estadoCivil = $_POST['estado_civil'];
    $sexo = $_POST['sexo'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $fechaNacimiento = $_POST['fecha_nacimiento'];

    $sql = "UPDATE funcionarios SET 
            TipoIdentificacion = '$tipoIdentificacion',
            NumeroIdentificacion = '$numeroIdentificacion',
            Nombres = '$nombres',
            Apellidos = '$apellidos',
            EstadoCivil = '$estadoCivil',
            Sexo = '$sexo',
            Direccion = '$direccion',
            Telefono = '$telefono',
            FechaNacimiento = '$fechaNacimiento'
            WHERE IDFuncionario = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");  // Redirigir a la página principal después de editar
        exit();
    } else {
        echo "Error al editar el registro: " . $conn->error;
    }
}

$conn->close();
?>

<!-- Formulario de edición -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar Funcionario</title>
</head>
<body>

<h2>Editar Funcionario</h2>

<form action="" method="post">
    <label for="tipo_identificacion">Tipo Identificación:</label>
    <input type="text" name="tipo_identificacion" value="<?php echo $row['TipoIdentificacion']; ?>" required><br>

    <label for="numero_identificacion">Número Identificación:</label>
    <input type="text" name="numero_identificacion" value="<?php echo $row['NumeroIdentificacion']; ?>" required><br>

    <label for="nombres">Nombres:</label>
    <input type="text" name="nombres" value="<?php echo $row['Nombres']; ?>" required><br>

    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" value="<?php echo $row['Apellidos']; ?>" required><br>

    <label for="estado_civil">Estado Civil:</label>
    <input type="text" name="estado_civil" value="<?php echo $row['EstadoCivil']; ?>" required><br>

    <label for="sexo">Sexo:</label>
    <input type="text" name="sexo" value="<?php echo $row['Sexo']; ?>" required><br>

    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" value="<?php echo $row['Direccion']; ?>" required><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" value="<?php echo $row['Telefono']; ?>" required><br>

    <label for="fecha_nacimiento">Fecha Nacimiento:</label>
    <input type="text" name="fecha_nacimiento" value="<?php echo $row['FechaNacimiento']; ?>" required><br>

    <input type="submit" value="Guardar Cambios">
</form>

<a href="index.php">Volver a la página principal</a>

</body>
</html>
