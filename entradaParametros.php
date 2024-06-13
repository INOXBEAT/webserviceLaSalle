<?php
/* 
ESTE CÓDIGO DEBE PROPORCIONAR ERROR 
AL NO CONTAR CON UN ELEMENTO DE ENTRADA
*/

// Establecer encabezado XML con la codificación de caracteres
header('Content-Type: text/xml; charset=utf-8');

// Array con datos de ejemplo de funcionarios
$funcionarios = array(
    array('id' => 1, 'nombre' => 'Andrés García', 'rol' => 'Docente', 'código' => 302010, 'area' => 'Humanidades'),
    array('id' => 2, 'nombre' => 'Paula Saenz', 'rol' => 'Rector', 'código' => 102050, 'area' => 'Ingeniería'),
    array('id' => 3, 'nombre' => 'Jorge Valbuena', 'rol' => 'Docente', 'código' => 302060, 'area' => 'Artes'),
    array('id' => 4, 'nombre' => 'Enrique González', 'rol' => 'Decano', 'código' => 421520, 'area' => 'Humanidades'),
    array('id' => 5, 'nombre' => 'Juana López', 'rol' => 'Docente', 'código' => 306023, 'area' => 'Ingeniería'),
);

// Verificar si se proporcionó un ID de funcionario como parámetro
if (isset($_GET['id'])) {
    $id_funcionario = intval($_GET['id']); // Convertir a entero para evitar inyección de SQL u otros ataques
    $funcionario_encontrado = false;

    // Buscar el funcionario por su ID
    foreach ($funcionarios as $funcionario) {
        if ($funcionario['id'] === $id_funcionario) {
            $funcionario_encontrado = true;
            // Construir el XML con la información del funcionario encontrado
            $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n\n";
            $xml .= '<funcionario>';
            foreach ($funcionario as $key => $value) {
                // Cambiar el nombre de la etiqueta <código> a <codigo>
                if ($key === 'código') {
                    $key = 'codigo';
                }
                $xml .= "\n\t<" . htmlspecialchars($key) . ">" . htmlspecialchars($value) . "</" . htmlspecialchars($key) . ">";
            }
            $xml .= "\n</funcionario>";

            // Imprimir el XML del funcionario encontrado y salir del bucle
            echo $xml;
            break;
        }
    }

    // Si no se encontró el funcionario, devolver un mensaje de error
    if (!$funcionario_encontrado) {
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n\n";
        echo '<error>No se encontró el funcionario con el ID proporcionado.</error>';
    }
} else {
    // Si no se proporcionó un ID de funcionario, devolver un mensaje de error
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n\n";
    echo '<error>No se proporcionó un ID de funcionario.</error>';
}
?>
