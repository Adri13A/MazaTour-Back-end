<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");

    include_once(__DIR__ . '/../Controller/ControllerRutas.php');

    $selectAllRutasNew = new ControllerRutas();

    try {
        $rutas = $selectAllRutasNew->selectAllRutasNew();
        
        if ($rutas) {
            echo json_encode([
                "success" => true,
                "data" => $rutas
            ], JSON_PRETTY_PRINT);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "No se encontraron rutas nuevas."
            ], JSON_PRETTY_PRINT);
        }

    } catch (Exception $e) {
        echo json_encode([
            "success" => false,
            "error" => $e->getMessage()
        ], JSON_PRETTY_PRINT);
    }
?>
