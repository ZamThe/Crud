<?php
include '../Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $IDGrupoFamiliar = $_POST['IDGrupoFamiliar'];
    $IDFuncionario = $_POST['IDFuncionario'];
    $Rol = $_POST['Rol'];

    // Verificar la existencia del IDFuncionario (esto es opcional, depende de tus necesidades)
    $checkQuery = "SELECT * FROM funcionarios WHERE IDFuncionario = '$IDFuncionario'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // El IDFuncionario existe, entonces puedes realizar la inserción en gruposfamiliares
        $insertQuery = "INSERT INTO gruposfamiliares (IDGrupoFamiliar, IDFuncionario, Rol)
                        VALUES ('$IDGrupoFamiliar', '$IDFuncionario', '$Rol')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "Registro de Grupo Familiar creado con éxito";
        } else {
            echo "Error al crear el registro: " . $conn->error;
        }
    } else {
        echo "Error: El IDFuncionario no existe en la tabla funcionarios";
    }
}

$conn->close();
?>