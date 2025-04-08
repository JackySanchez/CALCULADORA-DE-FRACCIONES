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
echo "Harina para media receta: $mediaHarina <br>";
//Se multiplica la cantidad inicial de harina (11/4) por 2/1 para obtener el doble de la receta.
$doble = $harina->multiplicar(new Fraccion(2, 1));
$doble->simplificar();  // Simplificar después de la operación
echo "Harina para doble receta: $doble <br>";

//Se comienza con 1 2/3 (que es igual a 5/3).
$azucar = (new Fraccion(5, 3))->multiplicar(new Fraccion(3, 1));  //Para calcular la cantidad de azúcar para 3 pasteles, se multiplica 5/3 por 3/1.
$azucar->simplificar();  // Simplificar después de la operación
echo "Azúcar para 3 pasteles: $azucar <br>";

echo "<hr>";
echo "<h1>Escenario 2: Construcción de Cerca de Carlos</h1>";
// Cada tabla mide 3 1/2 metros (7/2)
$tabla = new Fraccion(7, 2);
// El jardín mide 14 2/3 metros (44/3).
$jardin = new Fraccion(44, 3);
// Cantidad de tablas necesarias
//Para calcular cuántas tablas se necesitan, se divide el tamaño total del jardín (44/3) por el tamaño de cada tabla (7/2).
$tablasNecesarias = $jardin->dividir($tabla);
$tablasNecesarias->simplificar();  // Simplificar después de la operación
echo "Cantidad de tablas necesarias: $tablasNecesarias <br>";

// Madera Total
//El número de tablas necesarias se multiplica por la longitud de cada tabla (7/2).
$maderaTotal = $tablasNecesarias->multiplicar($tabla);
$maderaTotal->simplificar();  // Simplificar después de la operación
echo "Madera Total: $maderaTotal metros<br>";
//La madera sobrante se calcula restando el tamaño del jardín (44/3) de la cantidad total de madera.
$sobrante = $maderaTotal->restar($jardin);
$sobrante->simplificar();  // Simplificar después de la operación
echo "Madera Sobrante: $sobrante metros<br>";
echo "<hr>";

echo "<h1>Escenario 3: Terreno de los Hermanos</h1>";
// El terreno total mide 7 5/8 hectáreas, que se representa como 61/8.
$terreno = new Fraccion(61, 8);
//Para dividir este terreno entre 3 hermanos, se realiza la división de 61/8 por 3/1.
$cadaHermano = $terreno->dividir(new Fraccion(3, 1));
$cadaHermano->simplificar();  // Simplificar después de la operación
echo "Terreno para cada hermano: $cadaHermano hectáreas<br>";

// // Un hermano compra 1 3/4 hectáreas adicionales, que se representa como 7/4.
//Para calcular el total de terreno que recibe este hermano, se suma la fracción de terreno que le corresponde con la compra adicional.
$compraExtra = new Fraccion(7, 4);
$totalHermanoCompra = $cadaHermano->sumar($compraExtra);
$totalHermanoCompra->simplificar();  // Simplificar después de la operación
echo "Terreno del hermano que compra extra: $totalHermanoCompra hectáreas<br>";

// Terreno restante a los otros dos hermanos
//El terreno restante se calcula restando el terreno del hermano que compró extra del total de terreno disponible (7 5/8 hectáreas).
$restante = $terreno->restar($totalHermanoCompra);
//Este terreno restante se divide entre los otros dos hermanos
$porHermanoRestante = $restante->dividir(new Fraccion(2, 1));
$porHermanoRestante->simplificar();  // Simplificar después de la operación
echo "Terreno de cada hermano restante: $porHermanoRestante hectáreas<br>";
?>

