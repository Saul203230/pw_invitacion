<html>
    <head>
        <meta charset="UTF-8"  />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Tabla de multiplicar</h1>
        <form>
        <input type="text" name="valor" id="i_valor"> <input type="submit" value="Crear Tabla"><br><br>
        
        </form>
        
    <?php 

    $numero = $_GET['valor'];
    echo "<h2>"."Tabla del ".$numero."</h2>";
    for($i =1;$i < 11; $i++){
        $multiplicacion = $numero * $i;
        echo "<table border='1'>"."<tr>"."<td width = '70'>&nbsp;&nbsp;".$numero." X ".$i." = "."</td>"."<td width='30'>&nbsp;&nbsp;".$multiplicacion."</td>"."</tr>"."</table>";


    }
    
    
    ?>
</body>
</html>