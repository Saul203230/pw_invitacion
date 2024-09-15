<html>
    <head>
        <meta charset="UTF-8"  />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Sopa de letras</h1>
        <form>
        <input type="text" name="clave" id="i_clave"> <input type="submit" value="Encontrar palabra"><br><br>
        
        </form>
        
    <?php 
    $arreglo = [
        ["A","B","C","D","E","F","G","H","I","J"],
        ["K","L","M","N","O","P","Q","R","S","T"],
        ["X","Y","Z","S","D","Q","R","S","I","U"],
        ["R","I","L","U","V","B","G","L","J","O"],
        ["Y","F","K","O","T","H","J","H","K","I"],
        ["T","U","C","D","Q","L","M","F","A","N"],
        ["G","O","F","A","C","I","N","I","U","Y"],
        ["X","L","Y","S","V","E","Z","O","T","M"],
        ["Z","Q","U","F","P","A","G","J","P","X"],
        ["D","W","P","T","N","F","B","H","I","E"]
    
        ];
                     

    #echo count($arreglo, COUNT_RECURSIVE);
    
    /*print"<pre>";
    print_r($arreglo[0][4]);
    print"</pre>"
    */
    $palabra = $_GET['clave'];
    $palabra = strtoupper($palabra);

    #echo "Cadena: ".$mayusculas."<br>";
    echo"<br>";
    #print($palabra[0]);
    
    // la funcion recibe el arreglo, la palabra cordenadas
function seguir(&$arreglo, $palabra, $x, $y, $dx, $dy) {
    $longitudPalabra = strlen($palabra);
    $posiciones = []; 

    for ($k = 0; $k < $longitudPalabra; $k++) {
        if ($x < 0 || $x >= count($arreglo) || $y < 0 || $y >= count($arreglo[0]) || $arreglo[$x][$y] != $palabra[$k]) {
            return false; 
        }
        
        $posiciones[] = [$x, $y];
        $x += $dx;
        $y += $dy;
    }

    // cambiar el color de las letras encontradas
    foreach ($posiciones as $pos) {
        $arreglo[$pos[0]][$pos[1]] = "<span style='color: blue;'>" . $arreglo[$pos[0]][$pos[1]] . "</span>";
    }

    return true; // devolver verdadero para establecer la direccion de busqueda
}

    $direcciones = [
        [0, 1],   
        [0, -1],  
        [1, 0],   
        [-1, 0],  
        [1, 1],   
        [-1, -1], 
        [1, -1],  
        [-1, 1]   
    ];

    // recorriendo la matriz para encontrar y cambiar el color de la palabra
    for ($i = 0; $i < count($arreglo); $i++) {
    for ($j = 0; $j < count($arreglo[$i]); $j++) {
    if ($arreglo[$i][$j] == $palabra[0]) { // coincidencia con el primer caracter
        foreach ($direcciones as $direccion) {
            $dx = $direccion[0];
            $dy = $direccion[1];

            // llamada a la funcion de seguir para realizar la busqueda
            seguir($arreglo, $palabra, $i, $j, $dx, $dy);
        }
    }
}
}

    //se imprime la matriz
    echo "<table border='1'>";
    for ($i = 0; $i < 10; $i++) {
     echo "<tr>";
    for ($j = 0; $j < 10; $j++) {
        echo "<td width='30' height='30'>&nbsp;&nbsp;" . $arreglo[$i][$j] . "</td>";
    }
     echo "</tr>";
    }
     echo "</table>";
    
    ?>
</body>
</html>