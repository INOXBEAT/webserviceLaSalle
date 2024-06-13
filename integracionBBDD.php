<?php
// Establecer encabezado XML con la codificación de caracteres
header('Content-Type: text/xml; charset=utf-8');

// Datos de conexión a la base de datos
$host = 'localhost';
$dbname = 'empleados';
$username = 'tu_usuario';
$password = 'tu_contraseña';

try {
    // Conectar a la base de datos usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultar los datos de los funcionarios desde la base de datos
    $query = $pdo->query("SELECT * FROM funcionarios");
    $funcionarios = $query->fetchAll(PDO::FETCH_ASSOC);

    // Construir el XML con formato
    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n\n";
    $xml .= '<funcionarios>';

    foreach ($funcionarios as $funcionario) {
        $xml .= "\n\t<funcionario>";
        foreach ($funcionario as $key => $value) {
            $xml .= "\n\t\t<" . htmlspecialchars($key) . ">" . htmlspecialchars($value) . "</" . htmlspecialchars($key) . ">";
        }
        $xml .= "\n\t</funcionario>";
    }

    $xml .= "\n</funcionarios>";

    // Imprimir el XML
    echo $xml;
} catch (PDOException $e) {
    // Si hay un error en la conexión o consulta, mostrar un mensaje de error en XML
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n\n";
    echo '<error>' . $e->getMessage() . '</error>';
}
?>
