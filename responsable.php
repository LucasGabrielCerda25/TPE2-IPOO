<?php

class Responsable{
    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombre;
    private $apellido;

    public function __construct($numeroEmpleado,$numeroLicencia,$nombre,$apellido){
        $this->numeroEmpleado = $numeroEmpleado;
        $this->numeroLicencia = $numeroLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;


    }

    public function getNumeroEmpleado() {return $this->numeroEmpleado;}
    public function getNumeroLicencia() {return $this->numeroLicencia;}
    public function getNombre() {return $this->nombre;}
    public function getApellido() {return $this->apellido;}

    public function setNumeroEmpleado($nNumE){$this->numeroEmpleado = $nNumE;}
    public function setNumeroLicencia($nNumL){$this->numeroLicencia = $nNumL;}
    public function setNombre($nom){$this->nombre = $nom;}
    public function setApellido($ape){$this->apellido = $ape;}
    
    public function __toString(){
        
            return "\nNúmero de Empleado: ".$this->getNumeroEmpleado()."| Licencia: ".$this->getNumeroLicencia()."\nNombre: ".$this->getNombre()."| Apellido: ".$this->getApellido()."\n";
           
    }

} 





?>