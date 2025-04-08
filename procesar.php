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
require 'Fraccion.php'; //Esto incluye el archivo Fraccion.php, donde definimos la clase Fraccion con todas sus operaciones. Require_once asegura que el archivo se incluya una sola vez, evitando errores por duplicación //

try {
    // Añadí una comprobación con isset()para asegurarme de que los datos del formulario ( num1, den1, num2, den2, operacion) están presentes en $_POSTantes de intentar usarlos. Esto evitará el error de "Clave de matriz indefinida".
    if (isset($_POST['num1'], $_POST['den1'], $_POST['num2'], $_POST['den2'], $_POST['operacion'])) {
        // Procesar los datos
    } else {
        throw new Exception("Faltan datos en el formulario.");
    }
      // Recoger los valores del formulario
      //Usa $_POST para obtener los valores ingresados por el usuario.//
       //intval() convierte las entradas en enteros, asegurando que los datos estén listos para operar como números.
      $num1 = intval($_POST['num1']); // Numerador de la primera fracción
      $den1 = intval($_POST['den1']); // Denominador de la primera fracción
      $num2 = intval($_POST['num2']); // Numerador de la segunda fracción
      $den2 = intval($_POST['den2']); // Denominador de la segunda fracción
      $operacion = $_POST['operacion']; // La operación seleccionada
        // Verificar si el denominador es cero
        if ($den1 == 0 || $den2 == 0) {
            throw new Exception("El denominador no puede ser cero.");
        }
   // Crear los objetos Fracción
   $fraccion1 = new Fraccion($num1, $den1); //Crea dos objetos Fraccion (uno por cada fracción que el usuario ingresó).
   $fraccion2 = new Fraccion($num2, $den2); //Aquí se aplica el constructor que definimos en la clase Fraccion.

    switch ($operacion) { //switch evalúa qué opción seleccionó el usuario (sumar, restar, etc.).
        case 'sumar':
            $resultado = $fraccion1->sumar($fraccion2);  
            break;
        case 'restar':
            $resultado = $fraccion1->restar($fraccion2);
            break;
        case 'multiplicar':
            $resultado = $fraccion1->multiplicar($fraccion2);
            break;
        case 'dividir':
            $resultado = $fraccion1->dividir($fraccion2);
            break;
        default:
            throw new Exception("Operación no válida."); //Si no se selecciona una opción válida, lanza una excepción personalizada.
    }

     // Mostrar el resultado
     $resultado->simplificar(); // Simplificar el resultado
     echo "<h2>Resultado: " . $resultado . "</h2>"; // Muestra la fracción simplificada
 
     // Volver al formulario
     echo "<a href='index.php'>Volver</a>";

} catch (Exception $e) { //Atrapa errores como: Dividir entre 0, Denominador en 0 al crear la fracción, Operación no válida
    echo "<h2>Error: " . $e->getMessage() . "</h2>";
    echo "<a href='index.php'>Volver</a>";
}
?>
