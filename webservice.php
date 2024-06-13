<?php
// Establecer encabezado XML con la codificación de caracteres
header('Content-Type: text/xml; charset=utf-8');

// Crear un array con datos de ejemplo
$data = array(
    array('id' =>1, 'nombre' => 'Andrés García', 'rol' => 'Docente', 'código' => 302010, 'area' => 'Humanidades' ),
    array('id' =>2, 'nombre' => 'Paula Saenz', 'rol' => 'Rector', 'código' => 102050, 'area' => 'Ingeniería' ),
    array('id' =>3, 'nombre' => 'Jorge Valbuena', 'rol' => 'Docente', 'código' => 302060, 'area' => 'Artes'  ),
    array('id' =>4, 'nombre' => 'Enrique González', 'rol' => 'Decano', 'código' => 421520, 'area' => 'Humanidades' ),
    array('id' =>5, 'nombre' => 'Juana López', 'rol' => 'Docente', 'código' => 306023, 'area' => 'Ingeniería'  ),
);

// Construir el XML con formato
$xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n\n"; // Añadir una línea en blanco después del encabezado XML
$xml .= '<funcionarios>';

foreach ($data as $item) {
    // Construir el XML con formato
    $xml .= "\n\t<funcionario>";
    $xml .= "\n\t\t<id>" . htmlspecialchars($item['id']) . '</id>';
    $xml .= "\n\t\t<nombre>" . htmlspecialchars($item['nombre']) . '</nombre>';
    $xml .= "\n\t\t<rol>" . htmlspecialchars($item['rol']) . '</rol>';
    $xml .= "\n\t\t<código>" . htmlspecialchars($item['código']) . '</código>';
    $xml .= "\n\t\t<area>" . htmlspecialchars($item['area']) . '</area>';
    $xml .= "\n\t</funcionario>";
}

$xml .= "\n</funcionarios>";

// Imprimir el XML
echo $xml;

?>
