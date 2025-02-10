<?php
    include_once (__DIR__ . '/../Model/ModelRutas.php');
    date_default_timezone_set('America/Mazatlan'); 
    class ControllerRutas{

        private $model;

    
        public function __construct () {

            $this->model = new ModelRutas ();
        }

        public function selectAllRutas() {

            $idRuta = $this->model->allRutas();
            return $idRuta;

        }

        public function selectOneRuta($idRuta) {

            $idRuta = $this->model->OneRuta($idRuta);
            return $idRuta;

        }

        public function selectAllParadasRutas($idRuta) {

            $idRuta = $this->model->allParadasRutas($idRuta);
            return $idRuta;

        }


         public function selectAllRutasUpdate() {

            $idRuta = $this->model->allRutasUpdate();
            return $idRuta;

        }

         public function selectAllRutasNew() {

            $idRuta = $this->model->allRutasNew();
            return $idRuta;

        }
        
    }

?>