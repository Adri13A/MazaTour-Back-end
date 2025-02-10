<?php
header('Content-Type: application/json');

$api_spec = [
    "openapi" => "3.0.0",
    "info" => [
        "title" => "Services",
        "version" => "1.0.0",
        "description" => "Documentación de la API para la gestion de endpoints"
    ],
    
    "paths" => [
        "/TourMztServices/Api/AllRutas" => [
            "get" => [
                "summary" => "Obtener todas las rutas",
                "operationId" => "getAllRutas",
                "responses" => [
                    "200" => [
                        "description" => "Lista de rutas disponibles",
                        "content" => [
                            "application/json" => [
                                "schema" => [
                                    "type" => "array",
                                    "items" => [
                                        "type" => "object",
                                        "properties" => [
                                            "idRuta" => ["type" => "integer"],
                                            "nombreRuta" => ["type" => "string"]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ],
       
    ]
];

echo json_encode($api_spec, JSON_PRETTY_PRINT);
