<?php
// Establecer encabezado XML con la codificación de caracteres
header('Content-Type: text/xml; charset=utf-8');

// Array con datos de ejemplo de funcionarios
$data = array(
    array('id' => 1, 'nombre' => 'Andrés García', 'rol' => 'Docente', 'código' => 302010, 'area' => 'Humanidades'),
    array('id' => 2, 'nombre' => 'Paula Saenz', 'rol' => 'Rector', 'código' => 102050, 'area' => 'Ingeniería'),
    array('id' => 3, 'nombre' => 'Jorge Valbuena', 'rol' => 'Docente', 'código' => 302060, 'area' => 'Artes'),
    array('id' => 4, 'nombre' => 'Enrique González', 'rol' => 'Decano', 'código' => 421520, 'area' => 'Humanidades'),
    array('id' => 5, 'nombre' => 'Juana López', 'rol' => 'Docente', 'código' => 306023, 'area' => 'Ingeniería'),
);

// Agregar más elementos representando funcionarios
$data[] = array('id' => 6, 'nombre' => 'María Rodríguez', 'rol' => 'Administrativo', 'código' => 205040, 'area' => 'Recursos Humanos');
$data[] = array('id' => 7, 'nombre' => 'Carlos Pérez', 'rol' => 'Docente', 'código' => 308070, 'area' => 'Ciencias');
$data[] = array('id' => 8, 'nombre' => 'Laura Martínez', 'rol' => 'Docente', 'código' => 304010, 'area' => 'Matemáticas');

// Construir el XML con formato
$xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n\n"; // Añadir una línea en blanco después del encabezado XML
$xml .= '<funcionarios>';

foreach ($data as $item) {
    $xml .= "\n\t<funcionario>";
    foreach ($item as $key => $value) {
        $xml .= "\n\t\t<" . htmlspecialchars($key) . ">" . htmlspecialchars($value) . "</" . htmlspecialchars($key) . ">";
    }
    $xml .= "\n\t</funcionario>";
}

$xml .= "\n</funcionarios>";

// Imprimir el XML
echo $xml;

?>
