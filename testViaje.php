<?php

include 'responsable.php';
include 'pasajero.php';
include 'viaje.php';


$viajeUnoPasaj[0]=new Pasajero("Pedro", "Ruiz","49999100-A","299-1315-141");
$viajeUnoPasaj[1]=new Pasajero("Juana", "Ruiz","49679100-B","299-7763-141");
$viajeUnoPasaj[2]=new Pasajero("Pedro", "Ruiz","49999100-A","299-1315-141");
$responsableUno = new Responsable(1776,"AB-451-AD","Chad","Chaddington");
$viajeUno = new Viaje(1337,"Chos Malal",6,$viajeUnoPasaj,$responsableUno);

do{
echo "\n1- Imprimir datos del viaje.\n2- Imprimir datos de una variable del viaje.\n3- Editar datos del viaje.\n4- Salir";
$i=trim(fgets(STDIN));
switch($i){
    case 1:
        echo "\n".$viajeUno;
        fgets(STDIN);
        break;
    case 2:
         do{
                echo "\n1-Imprimir código de viaje.\n2-Imprimir destino de viaje.\n3-Imprimir cantidad máxima de pasajeros.\n4-Imprimir lista de pasajeros.\nImprimir Responsable del Viaje\n6-Salir.\n";
                $j=trim(fgets(STDIN));
                switch($j)  {
                                 case 1:
                                    echo "\nCódigo de viaje: ".$viajeUno->getCodigo();
                                    fgets(STDIN);
                                    break;
                                case 2:
                                    echo "\nDestino: ".$viajeUno->getDestino();
                                    fgets(STDIN);
                                    break;
                                case 3:
                                    echo "\nCantidad Máxima de pasajeros: ".$viajeUno->getMaxPasajeros();
                                    fgets(STDIN);
                                    break;
                                case 4:              
                                    echo "Lista de Pasajeros:\n".$viajeUno->getListaOrdenadaPasajeros()."\n";
                                    fgets(STDIN);
                                    break;
                                case 5:
                                    echo "\nResponsable del viaje: ".$viajeUno->getResponsable();
                                    fgets(STDIN);
                            }   

             }while($j<>6);
            break;
    case 3:
        do{
            echo "\n1-Editar código de viaje.\n2-Editar destino de viaje.\n3-Editar cantidad máxima de pasajeros.\n4-Editar lista de pasajeros.\n5-Editar responsable.\n6-Salir";
           $j=trim(fgets(STDIN));
            switch($j){
                case 1:
                    echo "\nIngrese el nuevo código de viaje: ";
                    $nCod=trim(fgets(STDIN));
                    $viajeUno->setCodigo($nCod);
                    echo "\n Código actualizado, presione cualquier tecla.\n";
                    fgets(STDIN);
                break;
                case 2:
                    echo "\nIngrese el nuevo destino de viaje: ";
                    $nDes=trim(fgets(STDIN));
                    $viajeUno->setDestino($nDes);
                    echo "\n Destino actualizado, presione cualquier tecla.\n";
                    fgets(STDIN);
                break;
                case 3:
                    echo "\nIngrese la nueva cantidad máxima de pasajeros: ";
                    $nCMax=trim(fgets(STDIN));
                    if(count($viajeUno->getPasajeros())<$nCMax){
                        $viajeUno->setMaxPasajeros($nCMax);
                        echo "\n Cantidad de pasajeros máxima actualizada, presione cualquier tecla.\n";
                    }
                    else {echo "\nNuevo máximo excede la cantidad de pasajeros actual, borre pasajeros.";}
                    fgets(STDIN);
                break;
                case 4:
                    echo "\n1-Agregar un pasajero.\n2-Borrar un pasajero.\n3-Editar un pasajero.\n";
                    $k=trim(fgets(STDIN));
                    switch($k){
                        case 1: //agregar
                            if(count($viajeUno->getPasajeros())<$viajeUno->getMaxPasajeros()){ //Sólo acepta nuevos pasajeros si no se pasa del límite
                            echo "\nInserte el nombre: ";
                            $nuevoNombre = trim(fgets(STDIN));
                            echo "\nInserte el apellido: ";
                            $nuevoApellido = trim(fgets(STDIN));
                            do{
                                echo "\nInserte el DNI: ";
                                $dniDuplicado=null;
                                $nuevoDNI = trim(fgets(STDIN));
                                    for($i=0;$i<(count($viajeUno->getPasajeros()));$i++) {
                                      if($nuevoDNI==$viajeUno->getPasajeros()[$i]->getDni()) {
                                         $dniDuplicado=true;
                                         echo "\nError: Este pasajero ya se cargó, inserte un pasajero con un DNI distinto.";
                                        }
                                        if($dniDuplicado!=true&&$i>=(count($viajeUno->getPasajeros()))){
                                            $dniDuplicado=false;
                                        }
                                    }
                            }while($dniDuplicado!=false);
                            
                            echo "\nInserte el número de Teléfono: ";
                            $nuevoTel = trim(fgets(STDIN));
                            $nuevoPasajero = new Pasajero($nuevoNombre,$nuevoApellido,$nuevoDNI,$nuevoTel);
                            $nuevaLista = $viajeUno->getPasajeros();
                            array_push($nuevaLista, $nuevoPasajero);
                            $viajeUno->setPasajeros($nuevaLista);
                            }
                            else echo "\nNúmero máximo de pasajeros alcanzado.";
                            fgets(STDIN);
                            break;
                        case 2: //borrar
                            if(count($viajeUno->getPasajeros())>0){
                                echo "\nSeleccione un pasajero que borrar del 1 al ".(count($viajeUno->getPasajeros())); //Cuenta la cantidad de pasajeros para el usuario
                                $pasajeroABorrar = trim(fgets(STDIN));
                                echo "\nBorrar pasajero '".(($viajeUno->getPasajeros()[$pasajeroABorrar-1])->getNombre())." ".(($viajeUno->getPasajeros()[$pasajeroABorrar-1])->getApellido())."? Y/N\n";
                                $choice = trim(fgets(STDIN));
                                if($choice="y"){
                                    $nuevaLista=$viajeUno->getPasajeros(); //Recibe el array de pasajeros del objeto
                                    unset($nuevaLista[$pasajeroABorrar-1]); //Borra el pasajero seleccionado
                                    sort($nuevaLista);                      //Reordena el array para que no queden índices vacíos
                                    $viajeUno->setPasajeros($nuevaLista);   //Reemplaza el array en el objeto por el array modificado                               
                                    echo "\nPasajero borrado.";
                                }
                            }
                            else echo "\No hay pasajeros";
                            break;
                        case 3; //editar
                        if(count($viajeUno->getPasajeros())>0){
                            echo "\nSeleccione un pasajero que editar del 1 al ".(count($viajeUno->getPasajeros())); //Cuenta la cantidad de pasajeros para el usuario
                            $pasajeroAEditar = trim(fgets(STDIN));
                            echo "\Editar pasajero '".(($viajeUno->getPasajeros()[$pasajeroAEditar-1])->getNombre())." ".(($viajeUno->getPasajeros()[$pasajeroAEditar-1])->getApellido())."? Y/N\n";
                            $choice = trim(fgets(STDIN));
                            if($choice="y"){
                                do{
                                    echo "\n1-Editar nombre. 2-Editar apellido. 3-Editar DNI. 4-Editar número de teléfono. 5-Salir.";
                                    $j=trim(fgets(STDIN));
                                    switch($j){
                                    case 1:
                                        echo "\nInserte nuevo nombre: ";
                                        $nuevoNom=trim(fgets(STDIN));
                                        $viajeUno->getPasajeros()[$pasajeroAEditar-1]->setNombre($nuevoNom);                                       
                                        break;
                                    case 2:
                                        echo "\nInserte nuevo apellido: ";
                                        $nuevoApe=trim(fgets(STDIN));
                                        $viajeUno->getPasajeros()[$pasajeroAEditar-1]->setApellido($nuevoApe);   
                                        break;
                                    case 3:     
                                        do{
                                            echo "\nInserte nuevo DNI: ";
                                            $dniDuplicado=null;
                                            $nuevoDocu = trim(fgets(STDIN));
                                                for($i=0;$i<(count($viajeUno->getPasajeros()));$i++) {
                                                  if($nuevoDocu==$viajeUno->getPasajeros()[$i]->getDni()) {
                                                     $dniDuplicado=true;
                                                     echo "\nError: Este pasajero ya se cargó, inserte un pasajero con un DNI distinto.";
                                                    }
                                                    if($dniDuplicado!=true&&$i>=(count($viajeUno->getPasajeros()))){
                                                        $dniDuplicado=false;
                                                    }
                                                }
                                        }while($dniDuplicado!=false);
                                        $viajeUno->getPasajeros()[$pasajeroAEditar-1]->setDNI($nuevoDocu); 
                                        break;
                                    case 4:
                                        echo "\nInserte nuevo número de teléfono: ";
                                        $nuevoTelefono=trim(fgets(STDIN));
                                        $viajeUno->getPasajeros()[$pasajeroAEditar-1]->setDNI($nuevoTelefono); 
                                        break;                                    

                                  }
                                }while($j<>5);
                            }
                        }
                        else echo "\No hay pasajeros";

                            break;
                    

                    }
                break;
                case 5:
                    //modificar responsable
                    do{
                        echo "\n1-Editar número de Empleado. 2-Editar licencia. 3-Editar nombre. 4-Editar apellido. 5-Salir.";
                        $j=trim(fgets(STDIN));
                        switch($j){
                        case 1:
                            echo "\nInserte nuevo número de empleado: ";
                            $nuevoNum=trim(fgets(STDIN));
                            $viajeUno->getResponsable()->setNumeroEmpleado($nuevoNum);                                      
                            break;
                        case 2:
                            echo "\nInserte nuevo apellido: ";
                            $nuevaLic=trim(fgets(STDIN));
                            $viajeUno->getResponsable()->setNumeroLicencia($nuevaLic);   
                            break;
                        case 3:
                            echo "\nInserte nuevo nombre: ";
                            $nuevoNomb=trim(fgets(STDIN));
                            $viajeUno->getResponsable()->setNombre($nuevoNomb); 
                            break;
                        case 4:
                            echo "\nInserte nuevo número de teléfono: ";
                            $nuevoApellido=trim(fgets(STDIN));
                            $viajeUno->getResponsable()->setApellido($nuevoApellido); 
                            break;                                    

                      }
                    }while($j<>5);
                break;
            }


        }while($j<>6);
        break;
    }

}while($i<>4);
?>