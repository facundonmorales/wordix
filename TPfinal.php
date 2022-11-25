<?php

/**
 * menu de opciones
 * @return entero
 */
//function menuOpciones()
{

    echo"1) Jugar al Wordix con una palabra elegida"."\n";
    echo"2) Jugar al Wordix con una palabra aleatoria"."\n";
    echo"3) Mostrar una partida"."\n";
    echo"4) Mostrar la primer partida ganadora"."\n";
    echo"5) Mostrar resumen de Jugador"."\n";
    echo"6) Mostrar listado de partidas ordenadas por jugador y por palabra"."\n";
    echo"7) Agregar una palabra de 5 letras a Wordix"."\n";
    echo"8) Salir"."\n";
    $opcion=trim(fgets(STDIN));
    while($opcion!==1 && $opcion!==2 && $opcion!==3 && $opcion!==4 && $opcion!==5 && $opcion!==6 && $opcion!==7 && $opcion!==8){
        Echo"No es una opcion valida, ingrese una opcion nuevamente: ";
        $opcion=trim(fgets(STDIN));
    }
    return $opcion;
    }

/**
 * COLECCION DE PARTIDAS
 * @return array
 */
function cargarPartidas()
{
$partida1=["palabraWordix"=>"MUJER","jugador"=>"pablo","intentos"=>6,"puntaje"=>0];
$partida2=["palabraWordix"=>"QUESO","jugador"=>"cata","intentos"=>1,"puntaje"=>14];
$partida3=["palabraWordix"=>"FUEGO","jugador"=>"luca","intentos"=>1,"puntaje"=>14];
$partida4=["palabraWordix"=>"CASAS","jugador"=>"vladi","intentos"=>6,"puntaje"=>5];
$partida5=["palabraWordix"=>"RASGO","jugador"=>"valen","intentos"=>4,"puntaje"=>3];
$partida6=["palabraWordix"=>"GATOS","jugador"=>"romy","intentos"=>2,"puntaje"=>10];
$partida7=["palabraWordix"=>"GOTAS","jugador"=>"pilar","intentos"=>5,"puntaje"=>7];
$partida8=["palabraWordix"=>"HUEVO","jugador"=>"fabiola","intentos"=>2,"puntaje"=>12];
$partida9=["palabraWordix"=>"TINTO","jugador"=>"beni","intentos"=>3,"puntaje"=>9];
$partida10=["palabraWordix"=>"NAVES","jugador"=>"bauti","intentos"=>3,"puntaje"=>2];
$coleccionPartida[0]=$partida1;
$coleccionPartida[1]=$partida2;
$coleccionPartida[2]=$partida3;
$coleccionPartida[3]=$partida4;
$coleccionPartida[4]=$partida5;
$coleccionPartida[5]=$partida6;
$coleccionPartida[6]=$partida7;
$coleccionPartida[7]=$partida8;
$coleccionPartida[8]=$partida9;
$coleccionPartida[9]=$partida10;


return $coleccionPartida;
}


/**
 * VERIFICA QUE LA PALABRA QUE SOLO TENGA CARACTERES ALFABETICOS Y QUE LA CANTIDAD DE CARACTERES SEA MAYOR A 0
 */
function esPalabra($cadena)
{
    //int $cantCaracteres, $i, boolean $esLetra
    $cantCaracteres = strlen($cadena);//DETERMINA LA CANTIDAD DE CARACTERES
    $esLetra = true;
    $i = 0;
    while ($esLetra && $i < $cantCaracteres) {
        $esLetra =  ctype_alpha($cadena[$i]);//VERIFICA SI ALGUNO DE DE LOS CARACTERES ES ALFABETICO
        $i++;
    }
    return $esLetra;
}


/**
 *  VERIFICA QUE LA PALABRA INGREADA SEA DE CINCO LETRAS Y QUE SOLO CONTENGA CARACTERES ALFABETICOS
 */
function leerPalabra5Letras()
{
    //string $palabra
    echo "Ingrese una palabra de 5 letras: ";
    $palabra = trim(fgets(STDIN));
    $palabra  = strtoupper($palabra);//CONVIERTE PALABRA EN CARACTERES MAYUSCULOS

    while ((strlen($palabra) != 5) || !esPalabra($palabra)) {
        echo "Debe ingresar una palabra de 5 letras:";
        $palabra = strtoupper(trim(fgets(STDIN)));
    }
    return $palabra;
}


/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "PERRO", "CAMPO", "DATOS", "GORRA", "HABLA"
        ];

    return $coleccionPalabras;
}

/**
 * Agrega palabra a la coleccion de palabras
 */
function agregarPalabra($nuevaPalabra){
    
    $i=count(cargarColeccionPalabras());
    $nuevaColeccionPalabras=cargarColeccionPalabras();
    $nuevaColeccionPalabras[$i]=$nuevaPalabra;
    return $nuevaColeccionPalabras;
    
}
/**
 * Busca un jugador, retorna el índice de la primera partida ganada por dicho jugador. Si el jugador ganó ninguna partida, la función debe retornar el valor -1.
 */
function buscarJugador($jugador){
    $n=count(cargarPartidas());
    $i=0;
    $partidas=cargarPartidas();
    while($i<$n && $partidas[$i]["jugador"]!==$jugador){
        $i++;
    }
    if($i<$n){
        if($partidas[$i]["puntaje"]>0){
            echo" El jugador ".$jugador." gano la partida ".($i+1);
        }
        else{
        echo" -1 ";
        }

    }
    else{
    echo" No existe ese jugador";
    }
    return ;
}

/**
 * Da el resumen de las partidas del jugador
 */
function partidasJugador($nombreJugador){
    $partidaJugador=cargarPartidas();
    $j=count($partidaJugador);
    for($i=0; $i<$j; $i++){
        if($partidaJugador[$i]["jugador"]==$nombreJugador){
            $partidaSol=$partidaJugador[$i];
        }
    }
    return $partidaSol;
}

//**Retorna el nombre de un jugador en letras minusculas */
function solicitarJugador(){
    echo"Ingrese el nombre del jugador :";
    $nombrePlayer=trim(fgets(STDIN));
    while(!esPalabra($nombrePlayer)){
        echo"Ingrese un nombre valido (caracteres alfabeticos): ";
        $nombrePlayer=trim(fgets(STDIN));
    }
    
    $nomMinusculas=strtolower($nombrePlayer);
    return $nomMinusculas;
}
//** Coleccion de partidas ordenadas */


function cmp($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;

$array = array('a' => 4, 'b' => 8, 'c' => -1, 'd' => -9, 'e' => 2, 'f' => 5, 'g' => 3, 'h' => -4);
print_r($array);
uasort($array, 'cmp');
print_r($array);
}



echo"ingrese el nombre del jugador :";
$jugador=trim(fgets(STDIN));
//buscarJugador($jugador);
//$palabraNueva=LeerPalabra5Letras();
$jug=solicitarJugador();
print_r ($jug);
