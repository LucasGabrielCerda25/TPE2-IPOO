<?php

class Viaje {

    /*Atributos de la clase viaje. Incluye el código del viaje, el destino, cant. max de pasajeros
    y el array asociativo de pasajeros.*/
    private $codigo;
    private $destino;
    private $maxPasajeros;
    private $pasajeros;
    private $responsable;

    //Método constructor
    public function __construct($code,$dest,$mPas,$pas,$res)
    {
        $this->codigo=$code;
        $this->destino=$dest;
        $this->maxPasajeros=$mPas;
        $this->pasajeros=$pas;
        $this->responsable=$res;
    }

    //Métodos de acceso get
    public function getCodigo()         {return $this->codigo;}
    public function getDestino()        {return $this->destino;}
    public function getMaxPasajeros()   {return $this->maxPasajeros;}
    public function getPasajeros()      {return $this->pasajeros;}
    public function getResponsable()    {return $this->responsable;}
    //Métodos de acceso set
    public function setCodigo(int $cod)         {$this->codigo = $cod;}
    public function setDestino(string $des)     {$this->destino = $des;}
    public function setMaxPasajeros(int $mxP)   {$this->maxPasajeros = $mxP;}
    public function setPasajeros(array $pas)    {$this->pasajeros = $pas;}
    public function setResponsable($resp)      {$this->responsable = $resp;}

    //listita de pasajeros
    public function getListaOrdenadaPasajeros(){$listaPasajeros="";
        //foreach($this->getPasajeros() as list($nom, $ape, $docu)){
    
        foreach($this->getPasajeros() as $unPasajero){
            $listaPasajeros .= $unPasajero;
        }
        
        return $listaPasajeros;
    }
    //toString
    public function __toString()
    {
        return "\n"."Código de viaje: ".$this->getCodigo()."\nDestino: ".$this->getDestino().
        "\nMáxima cantidad de pasajeros: ".$this->maxPasajeros."\nLista de Pasajeros:\n".$this->getListaOrdenadaPasajeros()."\nResponsable:\n".$this->getResponsable();
    }


}
?>
