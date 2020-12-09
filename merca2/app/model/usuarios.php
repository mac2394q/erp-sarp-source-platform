<?php 

    class usuarios{

        private $idusuarios;
        private $nombres;
        private $cedula;
        private $usuario;
        private $clave;
        private $email;
        private $telefono;
        private $idrol;

        public function __Construct($idusuarios,$nombres,$cedula,$usuario,$clave,$email,$telefono,$idrol){
            $this->idusuarios=$idusuarios;
            $this->nombres=$nombres;
            $this->cedula=$cedula;
            $this->usuario=$usuario;
            $this->clave=$clave;
            $this->email=$email;
            $this->telefono=$telefono;
            $this->idrol=$idrol;
        }

        public function setId_usuarios($idusuarios){return $this->idusuarios=$idusuarios;}
        public function getId_usuarios(){return $this->idusuarios;}

        public function setNombres($nombres){return $this->nombres=$nombres;}
        public function getNombres(){return $this->nombres;}

        public function setCedula($cedula){return $this->cedula=$cedula;}
        public function getCedula(){return $this->cedula;}

        public function setUsuario($usuario){return $this->usuario=$usuario;}
        public function getUsuario(){return $this->usuario;}

        public function setClave($clave){return $this->clave=$clave;}
        public function getClave(){return $this->clave;}

        public function setEmail($email){return $this->email=$email;}
        public function getEmail(){return $this->email;}

        public function setTelefono($telefono){return $this->telefono=$telefono;}
        public function getTelefono(){return $this->telefono;}

        public function setId_rol($idrol){return $this->idrol=$idrol;}
        public function getId_rol(){return $this->idrol;}
    }

?>