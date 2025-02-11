<?php
    date_default_timezone_set('America/Mazatlan'); 
    include_once(__DIR__ . '/../Config/Config.php');

    class ModelRutas{

        public $PDO;

        public function __construct(){

            $vConexion = new DataBase();

            $this->PDO = $vConexion->getConexion();

        }

        public function allRutas() {

            try {
                $query = ("SELECT 
                            tblrutas. idRuta, nombreRuta, frecuencia, salidaDestino, idEstado, idTipoRuta,
                            COALESCE(GROUP_CONCAT(DISTINCT tblparadas.nombreParada ORDER BY tblparadas.nombreParada SEPARATOR ', '), 'Aún falta capturar') AS nombreParadas,
                            COALESCE(GROUP_CONCAT(DISTINCT tblcolonias.nombreColonia ORDER BY tblcolonias.nombreColonia SEPARATOR ', '), 'Aún falta capturar') AS nombreColonias
                        FROM 
                            tblrutas
                        LEFT JOIN 
                            tblparadasruta ON tblrutas.idRuta = tblparadasruta.idRuta
                        LEFT JOIN 
                            tblparadas ON tblparadasruta.idParada = tblparadas.idParada
                        LEFT JOIN 
                            tblcolinasrutas ON tblrutas.idRuta = tblcolinasrutas.idRuta
                        LEFT JOIN
                            tblcolonias ON tblcolinasrutas.idColonia = tblcolonias.idColonia
                        GROUP BY 
                            tblrutas.idRuta, 
                            tblrutas.nombreRuta, 
                            tblrutas.salidaDestino, 
                            tblrutas.idEstado;

                        ");

                $statement = $this->PDO->prepare($query);
                $statement->execute();

                return $statement->fetchAll(PDO::FETCH_ASSOC);

            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                return [];
            }
        }

        public function OneRuta($idRuta) {

            try {
                $query = ("SELECT 
                              * 
                            FROM
                                tblrutas
                            WHERE 
                                idRuta = :idRuta

                        ");

                $statement = $this->PDO->prepare($query);
                $statement->bindParam(':idRuta', $idRuta, PDO::PARAM_INT);
                $statement->execute();


                return $statement->fetch(PDO::FETCH_ASSOC);

            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                return [];
            }
        }

        public function allParadasRutas($idRuta) {

            try {
                $query = ("SELECT 
                            tblparadasruta.*, tblparadas.*
                            FROM tblparadasruta
                            JOIN tblparadas ON tblparadasruta.idParada = tblparadas.idParada
                            WHERE tblparadasruta.idRuta = :idRuta;
                        ");

                $statement = $this->PDO->prepare($query);
                $statement->bindParam(':idRuta', $idRuta, PDO::PARAM_INT);
                $statement->execute();

                return $statement->fetchAll(PDO::FETCH_ASSOC);

            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                return [];
            }
        }

       public function allRutasUpdate() {
            try {
                date_default_timezone_set('America/Mazatlan');

                $fechaActual = date('Y-m-d H:i:s');
                
                // Ajuste de fecha de vencimiento a 7 días antes
                $fechaVencimiento = date('Y-m-d H:i:s', strtotime('-7 days', strtotime($fechaActual)));

                $query = "SELECT * FROM tblrutas 
                          WHERE fechaActualizacion > :fechaVencimiento 
                          AND fechaActualizacion <> '0000-00-00 00:00:00'";

                $statement = $this->PDO->prepare($query);
                $statement->bindParam(':fechaVencimiento', $fechaVencimiento);
                $statement->execute();
                
                return $statement->fetchAll(PDO::FETCH_ASSOC);

            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                return [];
            }
        }

        public function allRutasNew() {
            try {
                date_default_timezone_set('America/Mazatlan');

                $fechaActual = date('Y-m-d H:i:s');
                
                // Ajuste de fecha de vencimiento a 7 días antes
                $fechaVencimiento = date('Y-m-d H:i:s', strtotime('-7 days', strtotime($fechaActual)));

                $query = "SELECT * FROM tblrutas 
                          WHERE fechaCreacion IS NOT NULL 
                          AND fechaActualizacion = '0000-00-00 00:00:00' 
                          AND fechaCreacion > :fechaVencimiento";

                $statement = $this->PDO->prepare($query);
                $statement->bindParam(':fechaVencimiento', $fechaVencimiento);
                $statement->execute();
                
                return $statement->fetchAll(PDO::FETCH_ASSOC);

            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                return [];
            }
        }


    }

?>