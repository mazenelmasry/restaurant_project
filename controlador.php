<?php

require_once __DIR__."./conexion.php";


function doQuery($consulta){ // funcion para ejecutar las consultas.
    $db = db::getDBConnection(); // obtengo la conexion la cual tiene la instancia de esta 
    return $db->query($consulta);  // devuelvo la consulta
}


// obtiene un item , por su nombre, dado que el nombre es unico en la BD
function getCard($cardName){
    $consulta = "SELECT * FROM productos WHERE nombre='".$cardName."'"; // CONSULTA PARA TRAER SOLO UNA CARTA 
    return doQuery($consulta); 
}

// trae todos los items de la base de datos
function getCards(){ // obtengo todas las Cards
    $consulta = "SELECT * FROM productos";
    return doQuery($consulta);
}

// CREA UNA CARTA 
function createCard($cardName,$desc,$precio,$imagen){ // Crear nuevo item
    $consulta = "INSERT INTO productos (nombre,descripcion,imagen,precio) VALUE("
        ."'".$cardName."', "
        ."'".$desc."', "
        ."'".$imagen."', "
        ."'".$precio."')";
        
    return doQuery($consulta);
}

// ACTUALIZA UNA CARTA, HAY QUE PASARLE EL NAME ANTERIOR PARA HACER LA CONSULTA.
function updateCard($cardName,$newCardName,$desc,$precio,$imagen=""){
    if($imagen!=""){
        $consulta = "UPDATE productos SET "
        ."nombre='".$newCardName."',"
        ."descripcion='".$desc."',"
        ."imagen='".$imagen."',"
        ."precio='".$precio."' "
        ."WHERE nombre='".$cardName."'";
    }else { 
        $consulta = "UPDATE productos SET "
			."nombre='".$newCardName."',"
			."descripcion='".$desc."',"
			."precio='".$precio."' "
			."WHERE nombre='".$cardName."'";
		}

    
    return doQuery($consulta);



}
// funcion , creacion consulta eliminacion de la base de datos
function deleteCard($cardName){
    $consulta =  "DELETE FROM productos WHERE nombre='".$cardName."'";
    return doQuery($consulta);
}







?>