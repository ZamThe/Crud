<head>
    <title>Formulario de Funcionarios</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<?php
include '../conexion.php';

$tipoIdentificacion = $_POST['tipo_identificacion'];
$numeroIdentificacion = $_POST['numero_identificacion'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$estadoCivil = $_POST['estado_civil'];
$sexo = $_POST['sexo'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$fechaNacimiento = $_POST['fecha_nacimiento'];

$sql = "INSERT INTO funcionarios (TipoIdentificacion, NumeroIdentificacion, Nombres, Apellidos, EstadoCivil, Sexo, Direccion, Telefono, FechaNacimiento)
        VALUES ('$tipoIdentificacion', '$numeroIdentificacion', '$nombres', '$apellidos', '$estadoCivil', '$sexo', '$direccion', '$telefono', '$fechaNacimiento')";

if ($conn->query($sql) === TRUE) {
    echo "Registro insertado correctamente";$sql = "SELECT * FROM funcionarios";
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
                    <a href='eliminar.php?id={$row['IDFuncionario']}'>Eliminar</a>
                </td>
            </tr>";
        }
    
        echo "</table>";
    } else {
        echo "0 resultados";
    }
    
} 



else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
