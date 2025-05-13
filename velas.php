<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generar Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
             background-color: #f7d7e7;
        }
        .ticket {
            display: inline-block;
            border: 1px solid #333;
            padding: 20px;
            width: 300px;
            text-align: left;
        }
        .ticket h2 {
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
$database = "productov";
$host = "localhost";
$connection = mysqli_connect($host, $user, $pass, $database);

$telefono = $_POST["telefono"];
$cantidad = $_POST["cantidad"];
$total = $_POST["total"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$ciudad = $_POST["ciudad"];
$calle = $_POST["calle"];

$instruction_SQL = "INSERT INTO producto (telefono, cantidad, total, nombre, apellido, ciudad, calle) 
VALUES ('$telefono', '$cantidad', '$total', '$nombre', '$apellido', '$ciudad', '$calle')";

$resultado = mysqli_query($connection, $instruction_SQL);

if (!$resultado) {
    echo "Error al realizar la inserción: " . mysqli_error($connection);
} else {
    echo "<div class='ticket'>";
    echo "<h2>Ticket</h2>";
    echo "<hr>";
    echo "<p><strong>Teléfono:</strong> $telefono</p>";
    echo "<p><strong>Cantidad:</strong> $cantidad</p>";
    echo "<p><strong>Total:</strong> $$total</p>";
    echo "<p><strong>Nombre:</strong> $nombre $apellido</p>";
    echo "<p><strong>Ciudad:</strong> $ciudad</p>";
    echo "<p><strong>Calle:</strong> $calle</p>";
    echo "<hr>";
    echo "</div>";

    echo "<div class='button-container'>";
    echo "<a href='menu.html'>Volver al Menú</a>";
    echo "</div>";
}

mysqli_close($connection);
?>
</body>
</html>