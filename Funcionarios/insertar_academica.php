<?php
include '../conexion.php';

function insertarInformacionAcademica($funcionario_id, $universidad, $nivel_estudio, $titulo_estudio) {
    global $conn;

    $verificarExistencia = "SELECT * FROM funcionarios WHERE id = '$funcionario_id'";
    $result = $conn->query($verificarExistencia);

    if ($result->num_rows > 0) {
        $sql = "INSERT INTO informacionacademica (funcionario_id, universidad, nivel_estudio, titulo_estudio)
                VALUES ('$funcionario_id', '$universidad', '$nivel_estudio', '$titulo_estudio')";

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
    $funcionario_id = $_POST['funcionario_id'];
    $universidad = $_POST['universidad'];
    $nivel_estudio = $_POST['nivel_estudio'];
    $titulo_estudio = $_POST['titulo_estudio'];

    insertarInformacionAcademica($funcionario_id, $universidad, $nivel_estudio, $titulo_estudio);
}

$conn->close();
?>