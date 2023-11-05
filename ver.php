<Html>
<head>
    <title>Formulario de Funcionarios</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    
<ul class="dropdown">
    <li class="drop"><a href="Familia/familia.php">Crea familia</a></li>
    <li class="drop"><a href="Grupos/funcionarios.php">Grupo familiar</a></li>
    <li class="drop"><a href="Funcionarios/academico.php">Academico</a></li>
    <li class="drop"><a href="ver.php">Ver</a></li>
</ul>
<h2>Formulario de Funcionarios</h2>
</body>
<br>

<?php
include 'conexion.php';

$sql = "SELECT * FROM Funcionarios";
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
            <td>{$row['id']}</td>
            <td>{$row['tipo_identificacion']}</td>
            <td>{$row['numero_identificacion']}</td>
            <td>{$row['nombres']}</td>
            <td>{$row['apellidos']}</td>
            <td>{$row['estado_civil']}</td>
            <td>{$row['sexo']}</td>
            <td>{$row['direccion']}</td>
            <td>{$row['telefono']}</td>
            <td>{$row['fecha_nacimiento']}</td>
            <td>
                <a href='Funcionarios/editar.php?id={$row['id']}'>Editar</a>
                <a href='Funcionarios/eliminar.php?id={$row['id']}'>Eliminar</a>
            </td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "0 resultados";
}

$conn->close();
?>
</Html>