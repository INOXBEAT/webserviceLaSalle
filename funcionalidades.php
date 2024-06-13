<?php
// Establecer encabezado XML con la codificación de caracteres
header('Content-Type: text/xml; charset=utf-8');

// Datos de conexión a la base de datos
$host = 'localhost';
$dbname = 'empleados';
$username = 'root';
$password = '';

try {
    // Conectar a la base de datos usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar el método de solicitud
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Agregar Funcionario
        if (isset($_POST['accion']) && $_POST['accion'] === 'agregar') {
            // Verificar si se proporcionaron datos suficientes
            if (isset($_POST['nombre'], $_POST['rol'], $_POST['codigo'], $_POST['area'])) {
                // Preparar la consulta SQL para insertar un nuevo funcionario
                $stmt = $pdo->prepare("INSERT INTO funcionarios (nombre, rol, codigo, area) VALUES (:nombre, :rol, :codigo, :area)");
                // Ejecutar la consulta con los datos proporcionados
                $stmt->execute(array(
                    ':nombre' => $_POST['nombre'],
                    ':rol' => $_POST['rol'],
                    ':codigo' => $_POST['codigo'],
                    ':area' => $_POST['area']
                ));
                echo "Funcionario agregado correctamente.";
            } else {
                echo "Error: Faltan datos para agregar el funcionario.";
            }
        }
        // Actualizar Funcionario
        elseif (isset($_POST['accion']) && $_POST['accion'] === 'actualizar') {
            // Verificar si se proporcionaron datos suficientes
            if (isset($_POST['id'], $_POST['nombre'], $_POST['rol'], $_POST['codigo'], $_POST['area'])) {
                // Preparar la consulta SQL para actualizar un funcionario existente
                $stmt = $pdo->prepare("UPDATE funcionarios SET nombre = :nombre, rol = :rol, codigo = :codigo, area = :area WHERE id = :id");
                // Ejecutar la consulta con los datos proporcionados
                $stmt->execute(array(
                    ':id' => $_POST['id'],
                    ':nombre' => $_POST['nombre'],
                    ':rol' => $_POST['rol'],
                    ':codigo' => $_POST['codigo'],
                    ':area' => $_POST['area']
                ));
                echo "Funcionario actualizado correctamente.";
            } else {
                echo "Error: Faltan datos para actualizar el funcionario.";
            }
        }
    }
    // Eliminar Funcionario
    elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
        // Preparar la consulta SQL para eliminar un funcionario por su ID
        $stmt = $pdo->prepare("DELETE FROM funcionarios WHERE id = :id");
        // Ejecutar la consulta con el ID proporcionado
        $stmt->execute(array(':id' => $_GET['id']));
        echo "Funcionario eliminado correctamente.";
    }
} catch (PDOException $e) {
    // Si hay un error en la conexión o consulta, mostrar un mensaje de error
    echo "Error: " . $e->getMessage();
}
?>
