<!DOCTYPE html>
<html>
<head>
    <title>Resultado - Calculadora de Fracciones</title>
    <style>
        body {
            background-color:rgb(254, 201, 233);
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #333;
        }
        .resultado-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(214, 90, 226, 0.1);
        }
        h2 {
            color: #555;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color:rgb(79, 11, 77);
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
        }
        a:hover {
            background-color:rgb(212, 74, 207);
        }
    </style>
</head>
<body>
    <h1>Resultado</h1>
    <div class="resultado-box">
      <?php
require 'Fraccion.php';  
//La simplificación de las fracciones es importante para evitar resultados innecesariamente largos y poco legibles.//
echo "<h1>Escenario 1: Pastelería de Ana</h1>";
//  Se comienza con la cantidad de harina que es 2 3/4 (que se representa como la fracción 11/4).
$harina = new Fraccion(11, 4); 
// Para obtener la cantidad de harina para media receta, multiplicamos la fracción 11/4 por 1/2.
$mediaHarina = $harina->multiplicar(new Fraccion(1, 2));
$mediaHarina->simplificar();  // Simplificar después de la operación
echo "</p>1. Harina para media receta: " . $mediaHarina . "</p>";
//Se multiplica la cantidad inicial de harina (11/4) por 2/1 para obtener el doble de la receta.
$doble = $harina->multiplicar(new Fraccion(2, 1));
$doble->simplificar();  // Simplificar después de la operación
echo "</p>2. Harina para doble receta:" . $doble . "</p>";
//Se comienza con 1 2/3 (que es igual a 5/3).
$azucar = (new Fraccion(5, 3))->multiplicar(new Fraccion(3, 1));  //Para calcular la cantidad de azúcar para 3 pasteles, se multiplica 5/3 por 3/1.
$azucar->simplificar();  // Simplificar después de la operación
echo "</p>3. Azúcar para 3 pasteles:". $azucar. "</p>";

echo "<hr>";
echo "<h1>Escenario 2: Construcción de Cerca de Carlos</h1>";
//Mitad de una tabla (7/2 metros dividido entre 2).
$tabla = new Fraccion(7, 2);
$mitadTabla = $tabla->dividir(new Fraccion(2, 1));
echo "<p>1. Mitad de una tabla: " . $mitadTabla . " metros</p>";
// Tablas necesarias para cercar jardín (44/3 metros dividido entre 7/2 metros)
$jardin = new Fraccion(44, 3);
$tablasNecesarias = $jardin->dividir($tabla);
echo "<p>2. Tablas necesarias: " . $tablasNecesarias . " (se usan 4 enteras y parte de la quinta)</p>";
// 3Madera sobrante al usar 4 tablas completas
$maderaUsada = (new Fraccion(4, 1))->multiplicar($tabla);
$maderaSobrante = $jardin->restar($maderaUsada);
echo "<p>3. Madera sobrante: " . $maderaSobrante . " metros</p>";


echo "<hr>";
echo "<h1>Escenario 3: Terreno de los Hermanos</h1>";
// 1. División inicial del terreno (61/8 hectáreas entre 3 hermanos)
$terrenoTotal = new Fraccion(61, 8);
$porcionInicial = $terrenoTotal->dividir(new Fraccion(3, 1));
echo "<p>1. Terreno para cada hermano: $porcionInicial hectáreas</p>";
// 2. Hermano que compra 7/4 hectáreas adicionales
$compraExtra = new Fraccion(7, 4);
$totalConCompra = $porcionInicial->sumar($compraExtra);
echo "<p>2. Terreno del hermano que compra extra: $totalConCompra hectáreas</p>";
// 3. Cálculo para los otros dos hermanos
$restoParaDos = $terrenoTotal->restar($totalConCompra);
$porcionFinal = $restoParaDos->dividir(new Fraccion(2, 1));
echo "<p>3. Terreno de cada hermano restante: $porcionFinal hectáreas</p>";
?>
