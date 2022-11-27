<?php
include_once("wordix.php");
/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido: Morales
*  Nombre:  Facundo Nahuel
*  Legajo:  FAI - 3294
*  Carrera: TUDW
*  mail: facundomorales124@gmail.com
*  Usuario Github: github.com/facundonmorales

*  Apellido: NAVARRO 
*  Nombre: PABLO
*  Legajo: FAI-4284
*  Carrera:TUDW
*  mail: pablo.navarro@est.fi.uncoma.edu.ar
*  Usuario Github: github.com/pablonq
*/

//***********************************************************************************/
/**
 * COLECCION DE PALABRAS (1)
 * @return array
 */
function cargarColeccionPalabras(){
    //array $coleccionPalabrasF
    $coleccionPalabrasF = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "PERRO", "CAMPO", "DATOS", "GORRA", "HABLA"
        ];

    return $coleccionPalabrasF;
}
//***********************************************************************************/
/**
 * COLECCION DE PARTIDAS (2)
 * @return array
 */
function cargarPartidas(){
    //array $coleccionPartidaF
    $coleccionPartidaF[0]=["palabraWordix"=>"MUJER","jugador"=>"pablo","intentos"=>6,"puntaje"=>0];
    $coleccionPartidaF[1]=["palabraWordix"=>"QUESO","jugador"=>"cata","intentos"=>1,"puntaje"=>14];
    $coleccionPartidaF[2]=["palabraWordix"=>"FUEGO","jugador"=>"luca","intentos"=>1,"puntaje"=>14];
    $coleccionPartidaF[3]=["palabraWordix"=>"CASAS","jugador"=>"vladi","intentos"=>6,"puntaje"=>5];
    $coleccionPartidaF[4]=["palabraWordix"=>"RASGO","jugador"=>"valen","intentos"=>4,"puntaje"=>3];
    $coleccionPartidaF[5]=["palabraWordix"=>"GATOS","jugador"=>"romy","intentos"=>2,"puntaje"=>10];
    $coleccionPartidaF[6]=["palabraWordix"=>"GOTAS","jugador"=>"pilar","intentos"=>5,"puntaje"=>7];
    $coleccionPartidaF[7]=["palabraWordix"=>"HUEVO","jugador"=>"fabiola","intentos"=>2,"puntaje"=>12];
    $coleccionPartidaF[8]=["palabraWordix"=>"TINTO","jugador"=>"beni","intentos"=>3,"puntaje"=>9];
    $coleccionPartidaF[9]=["palabraWordix"=>"NAVES","jugador"=>"bauti","intentos"=>3,"puntaje"=>2];

return $coleccionPartidaF;
}
//***********************************************************************************/
/**
 * MENU DE OPCIONES (3)
 * @return entero
 */
function menuOpciones(){
    //int $opcionElegidaF
    echo"1) Jugar al Wordix con una palabra elegida"."\n";
    echo"2) Jugar al Wordix con una palabra aleatoria"."\n";
    echo"3) Mostrar una partida"."\n";
    echo"4) Mostrar la primer partida ganadora"."\n";
    echo"5) Mostrar resumen de Jugador"."\n";
    echo"6) Mostrar listado de partidas ordenadas por jugador y por palabra"."\n";
    echo"7) Agregar una palabra de 5 letras a Wordix"."\n";
    echo"8) Salir"."\n";
    $opcionElegidaF=trim(fgets(STDIN));
    while($opcionElegidaF!=="1" && $opcionElegidaF!=="2" && $opcionElegidaF!=="3" && $opcionElegidaF!=="4" && $opcionElegidaF!=="5" && $opcionElegidaF!=="6" && $opcionElegidaF!=="7" && $opcionElegidaF!=="8"){
        Echo"No es una opcion valida, ingrese una opcion nuevamente: ";
        $opcionElegidaF=trim(fgets(STDIN));
    }
    return $opcionElegidaF;
    }
//***********************************************************************************/
/**
 *  VERIFICA QUE LA PALABRA INGREADA SEA DE CINCO LETRAS Y QUE SOLO CONTENGA CARACTERES ALFABETICOS (4)
 */
//***********************************************************************************/
/**
 * SOLICITA UN NUMERO ENTRE UN VALOR MAXIMO Y MINIMO (5)
 */
//***********************************************************************************/
/**
 * MUESTRA LOS DATOS DE UNA PARTIDA (6)
 * @param array $coleccionPartidaF
 * @param int $numPartidaF
 */
function datosPartida($coleccionPartidaF, $numPartidaF){


    echo "***************************************************\n";
    echo "Partida WORDIX ".$numPartidaF.": "."palabra ".$coleccionPartidaF[($numPartidaF-1)]["palabraWordix"]."\n";
    echo "Jugador :".$coleccionPartidaF[($numPartidaF-1)]["jugador"]."\n";
    echo "Puntaje :".$coleccionPartidaF[($numPartidaF-1)]["puntaje"]." puntos\n";
    $numPartida=$numPartidaF-1;
    if($coleccionPartidaF[($numPartida)]["puntaje"]==0){
        echo "Intento : No adivino la palabra \n";
        echo "***************************************************\n";
    }
    else{
        echo "Intento : Adivino la palabra en ".$coleccionPartidaF[($numPartida-1)]["intentos"]." intentos \n";
    echo "***************************************************\n";
}
}

//***********************************************************************************/
/**
 * AGREGA PALABRAS A LA COLECCION (7)
 * @param array $coleccionPalabrasF
 * @param string $nuevaPalabraF
 * @return array
 */
function agregarPalabra($coleccionPalabrasF, $nuevaPalabraF){
    
    //int $i, $n
    $n=count($coleccionPalabrasF);
    for($i=0;$i<$n;$i++){
        if($nuevaPalabraF==$coleccionPalabrasF[$i]){
            echo"Esta palabra ya está en la base";
            $nuevaPalabraF=leerPalabra5Letras();
            $i=0;
        }
        else{
            echo"Esta palabra no está en la base \n";
            $i=$n+1;
        }
    }
    $nuevaColeccionPalabrasF=$coleccionPalabrasF;
    $nuevaColeccionPalabrasF[$i]=$nuevaPalabraF;
    return $nuevaColeccionPalabrasF;
    
}
//***********************************************************************************/
/**
 * BUSCA JUGADOR Y RETORNA INDICE DE LA PRIMERA PARTIDA GANADA, SINO GANO NINGUNA RETORNA -1 (8)
 * @param array $coleccionPartidasF
 * @param string $nombreGanaF
 * @return int
 */
function buscarPartidaGanada($coleccionPartidasF,$nombreGanaF){
    //boolean $condicion, int $i, $valor
    $condicion = true;
    $i = 0;
    $valor = 0;
    while ( $condicion == true && $i<count($coleccionPartidasF) ) {
        if ($coleccionPartidasF[$i]["jugador"] == $nombreGanaF){
            if($coleccionPartidasF[$i]["puntaje"] > 0){
                $condicion = false;	
                $valor = $i;
            }
            else{
            $valor = -1;
            }    
        }        
        $i = $i+1; 
    }
    return $valor;
}
//***********************************************************************************/
/**
 * RESUMEN DE PARTIDAS DE UN JUGADOR (9)
 * @param array $coleccionPartidasF
 * @param string $nombreJugadorF
 * @return array
 */
function partidasJugador ($coleccionPartidasF, $nombreJugadorF){
    // array $resumenJugador
    // int $n, $i, $partidasTotales, $puntajeTotal, $victoriasTotales, $intento1Total, $intento2Total
    // int $intento3Total, $intento4Total, $intento5Total, $intento6Total
    $partidasTotales = 0;
    $puntajeTotal = 0;
    $victoriasTotales = 0;
    $intento1Total = 0;
    $intento2Total = 0;
    $intento3Total = 0;
    $intento4Total = 0;
    $intento5Total = 0;
    $intento6Total = 0;
    $resumenJugador = [];
    $n = count($coleccionPartidasF);
    for ($i=0; $i < $n; $i++){
        if($coleccionPartidasF[$i]["jugador"] == $nombreJugadorF){
            $partidasTotales = $partidasTotales + 1;
            $puntajeTotal = $puntajeTotal + $coleccionPartidasF[$i]["puntaje"];
            if ($coleccionPartidasF[$i]["puntaje"] > 0){
                $victoriasTotales = $victoriasTotales + 1;
            }
            switch ($coleccionPartidasF[$i]["intentos"]){
                case 1:
                    $intento1Total++;
                    break;
                case 2:
                    $intento2Total++;
                    break;
                case 3:
                    $intento3Total++;
                    break;
                case 4:
                    $intento4Total++;
                    break;
                case 5:
                    $intento5Total++;
                    break;
                case 6:
                    $intento6Total++;
                    break;
            }
        }
    }
    $resumenJugador["jugador"] = $nombreJugadorF;
    $resumenJugador["partidas"] = $partidasTotales;
    $resumenJugador["puntaje"] = $puntajeTotal;
    $resumenJugador["victorias"] = $victoriasTotales;
    $resumenJugador["intento1"] = $intento1Total;
    $resumenJugador["intento2"] = $intento2Total;
    $resumenJugador["intento3"] = $intento3Total;
    $resumenJugador["intento4"] = $intento4Total;
    $resumenJugador["intento5"] = $intento5Total;
    $resumenJugador["intento6"] = $intento6Total;
    return $resumenJugador;
}

//***********************************************************************************/

/**
 * RETORNA NOMBRE DEL JUGADOR EN MINUSCULAS (10)
 * @return string
 */
function solicitarJugador(){
    //string $nombrePlayer, $nomMinusculas
    echo"Ingrese el nombre del jugador :";
    $nombrePlayer=trim(fgets(STDIN));
    while(!esPalabra($nombrePlayer)){ //Verifica que no tenga numeros
        echo"Ingrese un nombre valido (caracteres alfabeticos): ";
        $nombrePlayer=trim(fgets(STDIN));
    }
    $nomMinusculas=strtolower($nombrePlayer);
    return $nomMinusculas;
}
//***********************************************************************************/

/** COLECCION DE PARTIDAS ORDENADAS POR NOMBRE DE JUGADOR Y PALABRA  (11) 

 * @param array $partida1
 * @param array $partida2
 * @return int
 */
function cmp($partida1, $partida2) {
    // $int $orden
    if ($partida1["jugador"] == $partida2["jugador"]){
        if ($partida1["palabraWordix"] == $partida2["palabraWordix"]){
            $orden = 0;
        } elseif ($partida1["palabraWordix"] < $partida2["palabraWordix"]){
            $orden = -1;
        } else {
            $orden = 1;
        }
    } elseif ($partida1["jugador"] < $partida2["jugador"]){
        $orden = -1;
    } else {
        $orden = 1;
    }
    return $orden;
}
/**
 * @param array $coleccionPartidasF
 */
function ordenPartidas ($coleccionPartidasF){
    uasort($coleccionPartidasF, "cmp");
    print_r($coleccionPartidasF);
}

//***********************************************************************************/
//                             PROGRAMA PRINCIPAL
//***********************************************************************************/

// int $opcion, $numArregloPalabras, $numeroElegido, $numArregloPartidas, $i, $palabraElegida, $numAleatorio, $numeroPartida, $primeraGanada, $porcentajeVictorias
// string $nombreJug, $palabraElegida, $palabraAleatoria, $palabra 
// array $partidaJugada, $coleccionPartidas, $coleccionPalabras, $resumenFinalJugador

$coleccionPartidas = cargarPartidas ();
$coleccionPalabras = cargarColeccionPalabras();

do {
    $opcion=menuOpciones();
    switch ($opcion) {
        case 1:
            $nombreJug = solicitarJugador();
            $numArregloPalabras = count($coleccionPalabras);
            echo "Seleccione un numero para elegir la palabra con la que vas a jugar: ";
            $numeroElegido = solicitarNumeroEntre(1, $numArregloPalabras);
            $palabraElegida = $coleccionPalabras[$numeroElegido-1];
            $numArregloPartidas = count($coleccionPartidas);
            
            for($i=0;$i<$numArregloPartidas;$i++){
            
                if (($palabraElegida == $coleccionPartidas[$i]["palabraWordix"]) && ($nombreJug == $coleccionPartidas[$i]["jugador"])){
                    echo "El jugador ".$nombreJug." ya usó esta palabra, elija otra: ";
                    $numeroElegido = solicitarNumeroEntre(1, $numArregloPalabras);
                    $palabraElegida = $coleccionPalabras[$numeroElegido-1];
                    $i = 0;

                }
            }

            $partidaJugada = jugarWordix($palabraElegida, $nombreJug);
            array_push($coleccionPartidas, $partidaJugada); //agrega la partida jugada a la coleccion
            
            break;
        case 2:
            $nombreJug = solicitarJugador();
            $numArregloPalabras = count($coleccionPalabras);
            $numAleatorio= rand(1, $numArregloPalabras);//elije un numero aleatorio
            $numAleatorio=$numAleatorio-1;
            $palabraAleatoria = $coleccionPalabras[$numAleatorio];
            $numArregloPartidas = count($coleccionPartidas);
            
            for($i=0;$i<$numArregloPartidas;$i++){
            
                if (($palabraAleatoria == $coleccionPartidas[$i]["palabraWordix"]) && ($nombreJug == $coleccionPartidas[$i]["jugador"])){
                    echo "El jugador ".$nombreJug." ya usó esta palabra, elija otra: ";
                    $numeroElegido = rand(1, $numArregloPalabras);
                    $palabraAleatoria = $coleccionPalabras[$numeroElegido-1];
                    $i = 0;
                }
            }
            $partidaJugada = jugarWordix($palabraAleatoria, $nombreJug);
            array_push($coleccionPartidas, $partidaJugada);

            break;
        case 3:
            $numArregloPartidas = count($coleccionPartidas);
            echo "Ingrese el número de partida que quiere ver :";
            $numeroPartida = solicitarNumeroEntre(1, $numArregloPartidas);
            datosPartida($coleccionPartidas,$numeroPartida);
            break;
        case 4:
            
            $nombreJug = solicitarJugador();
            $primeraGanada = buscarPartidaGanada($coleccionPartidas, $nombreJug);
            if ($primeraGanada == -2){
                echo "No existe ese jugador \n";
            } elseif ($primeraGanada == -1){
                echo "El jugador " . $nombreJug . " no ganó ninguna partida \n";
            } else {
                $primeraGanada = $primeraGanada + 1;
                datosPartida($coleccionPartidas, $primeraGanada);
            }
            break;
        case 5:
            
            $nombreJug = solicitarJugador();
            $resumenFinalJugador = partidasJugador($coleccionPartidas, $nombreJug);
            if ($resumenFinalJugador["partidas"] == 0){
                echo "El jugador no ha jugado ninguna partida\n";
            } else {
            echo "**********************************\n";
            echo "Jugador: " . $resumenFinalJugador["jugador"] . "\n";
            echo "Partidas: " . $resumenFinalJugador["partidas"] . "\n";
            echo "Puntaje Total: " . $resumenFinalJugador["puntaje"] . "\n";
            echo "Victorias: " . $resumenFinalJugador["victorias"] . "\n";
            $porcentajeVictorias = (int)(($resumenFinalJugador["victorias"]*100)/$resumenFinalJugador["partidas"]);
            echo "Porcentaje Victorias: " . $porcentajeVictorias . "%\n";
            echo "Adivinadas: \n";
            echo "    Intento 1: " . $resumenFinalJugador["intento1"] . "\n";
            echo "    Intento 2: " . $resumenFinalJugador["intento2"] . "\n";
            echo "    Intento 3: " . $resumenFinalJugador["intento3"] . "\n";
            echo "    Intento 4: " . $resumenFinalJugador["intento4"] . "\n";
            echo "    Intento 5: " . $resumenFinalJugador["intento5"] . "\n";
            echo "    Intento 6: " . $resumenFinalJugador["intento6"] . "\n";
            echo "**********************************\n";
            }
            break;
        case 6:
            ordenPartidas($coleccionPartidas);
            break;
        case 7:
            $palabra = leerPalabra5Letras();
            $coleccionPalabras = agregarPalabra($coleccionPalabras, $palabra);
            print_r($coleccionPalabras);
            break;
        case 8:
            echo "SALIÓ DE WORDIX";
            break;
    }
} while ($opcion != 8);

