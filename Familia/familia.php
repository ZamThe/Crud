<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Grupos Familiares</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<ul class="dropdown">
<li class="drop"><a href="../Familia/familia.php">Crea familia</a></li>
        	<li class="drop"><a href="../Grupos/funcionarios.php">Funcionarios </a></li>
        	
        	<li><a href="../index.php">Salir</a>
        	</li>
        	</li>
        </ul>
</nav> 
<body>
    <h2>Formulario de Grupos Familiares</h2>
    <div id="login-form-wrap">
    <form action="insertar_grupo_familiar.php" method="post">
        ID Grupo Familiar: <input type="text" name="IDGrupoFamiliar" required><br>
        ID Funcionario: <input type="text" name="IDFuncionario" required><br>
        Rol: <input type="text" name="Rol" required><br>
        <input type="submit" value="Agregar Grupo Familiar">
    </form>
</div>
</body>
</html>
<?php
include '../Conexion.php';


// Consulta para obtener funcionarios con su grupo familiar
$sql = "SELECT funcionarios.*, gruposfamiliares.IDGrupoFamiliar, gruposfamiliares.Rol
        FROM funcionarios
        LEFT JOIN gruposfamiliares ON funcionarios.IDFuncionario = gruposfamiliares.IDFuncionario";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Funcionarios con Grupo Familiar</title>
</head>
<body>
 

    <!-- Mostrar lista de funcionarios con su grupo familiar -->


</body>
</html>
