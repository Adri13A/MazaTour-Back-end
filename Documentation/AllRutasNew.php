<?php
    include('../Config/BasePath.php');
    return [
        $baseUrl . "/Api/AllRutasNew" => [
            "get" => [
                "tags" => ["Rutas"],
                "summary" => "Obtener todas las rutas nuevas",
                "operationId" => "AllRutasNew",
                "responses" => [
                    "200" => [
                        "description" => "Lista de rutas nuevas",
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