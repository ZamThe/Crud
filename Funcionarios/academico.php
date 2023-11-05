<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Formulario Información Académica</title>
    <!-- Agrega tus estilos CSS si es necesario -->
</head>
<body>
<ul class="dropdown">
    <li class="drop"><a href="Grupos/funcionarios.php">Crea familia</a></li>
    <li class="drop"><a href="../Grupos/funcionarios.php">Funcionarios</a></li>
  
    <li><a href="../index.php">Inicio</a></li>
</ul>   

<h2>Formulario Información Académica</h2>   

<form action="insertar_academica.php" method="post">
    <label for="funcionario_id">ID del Funcionario:</label>
    <input type="text" name="funcionario_id" required><br>

    <label for="universidad">Universidad:</label>
    <input type="text" name="universidad" required><br>

    <label for="nivel_estudio">Nivel de Estudio:</label>
    <input type="text" name="nivel_estudio" required><br>

    <label for="titulo_estudio">Título de Estudio:</label>
    <input type="text" name="titulo_estudio" required><br>

    <input type="submit" value="Insertar Información Académica">
</form>

<!-- Puedes agregar más contenido HTML según sea necesario -->

</body>
</html>
