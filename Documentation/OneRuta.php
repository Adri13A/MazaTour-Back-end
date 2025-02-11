<?php
    include('../Config/BasePath.php');
    return [
            $baseUrl . "/Api/OneRuta/{idRuta}" => [
            "get" => [
                "tags" => ["Rutas"],
                "summary" => "Obtener la informacion de una ruta",
                "operationId" => "OneRuta",
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
                        "description" => "Informacion de la ruta seleccionada",
                        "content" => [
                            "application/json" => [
                                "schema" => [
                                    "type" => "array",
                                    "items" => [
                                        "type" => "object",
                                        "properties" => [
                                            "idRuta" => ["type" => "integer"],
                                            "nombreRuta" => ["type" => "string"],
                                            "salidaDestino" => ["type" => "string"],
                                            "frecuencia" => ["type" => "string"],
                                            "horario" => ["type" => "integer"],
                                            "pasaje" => ["type" => "integer"],
                                            "tiempoHora" => ["type" => "string"],
                                            "tiempoMin" => ["type" => "string"],
                                            "polilineaSalida" => ["type" => "string"],
                                            "polilineaRegreso" => ["type" => "string"],
                                            "fechaCreacion" => ["type" => "string"],
                                            "fechaActualizacion" => ["type" => "string"],
                                            "idTipoRuta" => ["type" => "integer"],
                                            "idEstado" => ["type" => "integer"],
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