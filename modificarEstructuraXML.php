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

// Construir el XML con formato
$xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n\n"; // Añadir una línea en blanco después del encabezado XML
$xml .= '<empleados>';

foreach ($data as $item) {
    $xml .= "\n\t<empleado>";
    foreach ($item as $key => $value) {
        // Cambiar el nombre de la etiqueta <código> a <codigo>
        if ($key === 'código') {
            $key = 'codigo';
        }
        $xml .= "\n\t\t<" . htmlspecialchars($key) . ">" . htmlspecialchars($value) . "</" . htmlspecialchars($key) . ">";
    }
    // Agregar un nuevo elemento <estado> con un valor fijo
    $xml .= "\n\t\t<estado>Activo</estado>";
    $xml .= "\n\t</empleado>";
}

$xml .= "\n</empleados>";

// Imprimir el XML
echo $xml;

?>
