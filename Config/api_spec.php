<?php
    header('Content-Type: application/json');
    $allRutasDoc = include('../Documentation/AllRutas.php');
    $oneRutaDoc = include('../Documentation/OneRuta.php');
    $allParadasRutaDoc = include('../Documentation/AllParadasRuta.php');
    $allRutasNewDoc = include('../Documentation/AllRutasNew.php');
    $allRutasUpdateDoc = include('../Documentation/AllRutasUpdate.php');


    $api_spec = [
        "openapi" => "3.0.0",
        "info" => [
            "title" => "Services",
            "version" => "1.0.0",
            "description" => "Documentación de la API para la gestion de endpoints"
        ],
        
        "tags" => [
            [
                "name" => "Rutas",
                "description" => "Endpoints relacionados con rutas"
            ]
        ],
        "paths" => array_merge($allRutasDoc, $oneRutaDoc, $allParadasRutaDoc, $allRutasNewDoc, $allRutasUpdateDoc)
    ];

    echo json_encode($api_spec, JSON_PRETTY_PRINT);
?>