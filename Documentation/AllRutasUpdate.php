<?php
    include('../Config/BasePath.php');
    return [
        $baseUrl . "/Api/AllRutasUpdate" => [
            "get" => [
                "tags" => ["Rutas"],
                "summary" => "Obtener todas las rutas actualizadas",
                "operationId" => "AllRutasUpdate",
                "responses" => [
                    "200" => [
                        "description" => "Lista de rutas actualizadas",
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