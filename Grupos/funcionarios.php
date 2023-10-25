<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" type="text/css" href="../css/styles.css">
    <meta charset="UTF-8">
    <title>Insertar Miembro Grupo Familiar</title>
</head>
<ul class="dropdown">
        	<li class="drop"><a href="../Familia/familia.php">Crea familia</a></li>
        	<li class="drop"><a href="../Grupos/funcionarios.php">Funcionarios </a></li>
        	
        	<li><a href="../index.php">Salir</a>
        	</li>
        </ul>
</nav> 
<body>
    <h2>Insertar Miembro Grupo Familiar</h2>

    <div id="login-form-wrap">
    <form action="Crear.php" method="post">
        ID Miembro: <input type="text" name="idMiembro" required><br>
        ID Grupo Familiar: <input type="text" name="idGrupoFamiliar" required><br>
        Nombre: <input type="text" name="nombre" required><br>
        Apellido: <input type="text" name="apellido" required><br>
        Relación: <input type="text" name="relacion" required><br>
        <input type="submit" value="Insertar Miembro">
    </form></div>

</body>
</html>
