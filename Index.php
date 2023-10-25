
<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Funcionarios</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<ul class="dropdown">
        	<li class="drop"><a href="Familia/familia.php">Crea familia</a></li>
        	<li class="drop"><a href="Grupos/funcionarios.php">Funcionarios </a></li>
        	<li class="drop"><a href="#">Form 2</a></li>
        	<li><a href="#">Salir</a>
        	</li>
        </ul>
</nav> 


<h2>Formulario de Funcionarios</h2>
<div id="login-form-wrap">
<form action="Funcionarios/guardar.php" method="post">
<label for="tipo_identificacion">Tipo Identificación:</label>
<select name="tipo_identificacion" required>
    <option value="cedula">Cédula Ciudadanía</option>
    <option value="tarjeta">Tarjeta de Identidad</option>
    <option value="pasaporte">Pasaporte</option>
</select><br>

    <label for="numero_identificacion">Número Identificación:</label>
    <input type="text" name="numero_identificacion" required><br>

    <label for="nombres">Nombres:</label>
    <input type="text" name="nombres" required><br>

    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" required><br>

    <label for="estado_civil">Estado Civil:</label>
<select name="estado_civil" required>
    <option value="soltero">Soltero</option>
    <option value="casado">Casado</option>
    <option value="viudo">Viudo</option>
    <option value="divorciado">Divorciado</option>
</select><br>

   <label for="sexo">Sexo:</label>
<select name="sexo" required>
    <option value="masculino">Masculino</option>
    <option value="femenino">Femenino</option>
</select><br>
<?php
include 'conexion.php';

// Consulta para obtener valores únicos de la columna Relacion
$sql = "SELECT DISTINCT Relacion FROM miembrosgrupofamiliar";
$result = $conn->query($sql);

// Verificar si hay resultados antes de mostrar el select
if ($result->num_rows > 0) {
    echo '<label for="relacion">Selecciona Relación:</label>';
    echo '<select name="relacion" id="relacion">';
    
    // Agregar una opción por cada valor único de Relacion
    while ($row = $result->fetch_assoc()) {
        $relacion = $row['Relacion'];
        echo "<option value='$relacion'>$relacion</option>";
    }
    
    echo '</select>';
} else {
    echo "No hay valores de Relacion disponibles.";
}

$conn->close();
?>


    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" required><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" required><br>

    <label for="fecha_nacimiento">Fecha Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" value="<?php echo isset($row['FechaNacimiento']) ? $row['FechaNacimiento'] : ''; ?>" required><br>

    <input type="submit" value="Guardar">
</form>
</div>
</body>
<?php
include 'conexion.php';

$sql = "SELECT * FROM funcionarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Tipo Identificación</th>
            <th>Número Identificación</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Estado Civil</th>
            <th>Sexo</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            
            <th>Fecha Nacimiento</th>
            <th>Acciones</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['IDFuncionario']}</td>
            <td>{$row['TipoIdentificacion']}</td>
            <td>{$row['NumeroIdentificacion']}</td>
            <td>{$row['Nombres']}</td>
            <td>{$row['Apellidos']}</td>
            <td>{$row['EstadoCivil']}</td>
            <td>{$row['Sexo']}</td>
            <td>{$row['Direccion']}</td>
            <td>{$row['Telefono']}</td>
          
            <td>{$row['FechaNacimiento']}</td>
            <td>
                <a href='editar.php?id={$row['IDFuncionario']}'>Editar</a>
                <a href='Funcionarios/eliminar.php?id={$row['IDFuncionario']}'>Eliminar</a>
            </td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "0 resultados";
}

$conn->close();
?>
</html>
