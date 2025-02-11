<?php
    include('../Config/BasePath.php');
    return [
        $baseUrl . "/Api/AllRutas" => [
            "get" => [
                "tags" => ["Rutas"],
                "summary" => "Obtener todas las rutas",
                "operationId" => "AllRutas",
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
                                            "nombreRuta" => ["type" => "string"],
                                            "frecuencia" => ["type" => "string"],
                                            "salidaDestino" => ["type" => "string"],
                                            "idEstado" => ["type" => "integer"],
                                            "idTipoRuta" => ["type" => "integer"],
                                            "nombreParadas" => ["type" => "string"],
                                            "nombreColonias" => ["type" => "string"],
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