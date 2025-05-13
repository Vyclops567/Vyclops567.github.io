<!DOCTYPE html>
<html lang="es">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
            background-color: #f7d7e7;
        }
        .encuesta {
            display: inline-block;
            border: 1px solid #333;
            padding: 20px;
            width: 300px;
            text-align: left;
        }
        .encuesta h2 {
            text-align: center;
        }
        .button-container {
            margin-top: 20px;
        }
        .button-container a {
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<?php
$user = "root";
$pass = "";
$database = "encuesta";
$host = "localhost";
$connection = mysqli_connect($host, $user, $pass, $database);

$correo = $_POST["correo"];
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$opinion = $_POST["opinion"];
$mejora = $_POST["mejora"];
$sugerencias = $_POST["sugerencias"];


$instruction_SQL = "INSERT INTO encuesta (correo, nombre, edad, opinion, mejora, sugerencias) 
VALUES ('$correo', '$nombre', '$edad', '$opinion', '$mejora', '$sugerencias')";


$resultado = mysqli_query($connection, $instruction_SQL);

if (!$resultado) {
    echo "Error al realizar la inserción: " . mysqli_error($connection);
} else {
    echo "<div class='encuesta'>";
    echo "<h2>Gracias por sus sugerencias y opiniones</h2>";
    
    echo "<div class='button-container'>";
    echo "<a href='menu.html'>Volver al Menú</a>";
    echo "</div>";
}

mysqli_close($connection);
?>
</body>
</html>