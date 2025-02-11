<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");

    include_once(__DIR__ . '/../Controller/ControllerRutas.php');

    if (!isset($_GET['idRuta']) || empty($_GET['idRuta'])) {
        echo json_encode([
            "success" => false,
            "message" => "El parámetro 'idRuta' es requerido."
        ], JSON_PRETTY_PRINT);
        exit;
    }

    $idRuta = $_GET['idRuta'];
    $selectOneRuta = new ControllerRutas();

    try {
        $rutas = $selectOneRuta->selectOneRuta($idRuta);
        
        if ($rutas) {
            echo json_encode([
                "success" => true,
                "data" => $rutas
            ], JSON_PRETTY_PRINT);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "No se encontro la información de la ruta."
            ], JSON_PRETTY_PRINT);
        }

    } catch (Exception $e) {
        echo json_encode([
            "success" => false,
            "error" => $e->getMessage()
        ], JSON_PRETTY_PRINT);
    }
?>
