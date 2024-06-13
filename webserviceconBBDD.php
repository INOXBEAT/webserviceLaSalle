<?php

// Establecer conexión con la base de datos (reemplaza 'hostname', 'username', 'password' y 'database' con los valores de tu base de datos)
$conexion = new mysqli('hostname', 'username', 'password', 'database');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta SQL para obtener los datos de la base de datos
$sql = "SELECT id, nombre, rol, codigo, area FROM funcionarios";
$resultado = $conexion->query($sql);

// Verificar si la consulta arrojó resultados
if ($resultado->num_rows > 0) {
    // Construir el XML con formato
    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<funcionarios>';

    // Iterar sobre los resultados y agregar cada fila al XML
    while ($fila = $resultado->fetch_assoc()) {
        $xml .= '<funcionario>';
        $xml .= '<id>' . htmlspecialchars($fila['id']) . '</id>';
        $xml .= '<nombre>' . htmlspecialchars($fila['nombre']) . '</nombre>';
        $xml .= '<rol>' . htmlspecialchars($fila['rol']) . '</rol>';
        $xml .= '<codigo>' . htmlspecialchars($fila['codigo']) . '</codigo>';
        $xml .= '<area>' . htmlspecialchars($fila['area']) . '</area>';
        $xml .= '</funcionario>';
    }

    $xml .= '</funcionarios>';

    // Imprimir el XML
    echo $xml;

} else {
    echo "No se encontraron registros";
}

// Cerrar la conexión
$conexion->close();

?>
