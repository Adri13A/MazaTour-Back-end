<?php
    include('../Config/BasePath.php');
    return [
            $baseUrl . "/Api/AllParadasRuta/{idRuta}" => [
            "get" => [
                "tags" => ["Rutas"],
                "summary" => "Obtener las paradas de una ruta",
                "operationId" => "AllParadasRuta",
                "parameters" => [
                    [
                        "name" => "idRuta",
                        "in" => "path", 
                        "required" => true,
                        "schema" => [
                            "type" => "integer"
                        ],
                        "description" => "El ID de la ruta a consultar"
                    ]
                ],
                "responses" => [
                    "200" => [
                        "description" => "Paradas de la ruta seleccionada",
                        "content" => [
                            "application/json" => [
                                "schema" => [
                                    "type" => "array",
                                    "items" => [
                                        "type" => "object",
                                        "properties" => [
                                            "idParadasRuta" => ["type" => "integer"],
                                            "idParada" => ["type" => "integer"],
                                            "idRuta" => ["type" => "integer"],
                                            "nombreParada" => ["type" => "string"],
                                            "coordenadaParada" => ["type" => "string"],
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ];
?>