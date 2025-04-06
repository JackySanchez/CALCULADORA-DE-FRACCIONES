<!--ESta Pagina recopila:
Dos fracciones (numerador y denominador).
La operación deseada.-->
<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Fracciones</title>  <!--Todo lo que está dentro de <style> son reglas de estilo que afectan cómo se ve la página.-->
    <style  >body {
            background-color:rgb(254, 201, 233);
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;}
        h1 {
            color: #333;}
        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(214, 90, 226, 0.1) }
        h3 {
            color: #555;
            margin-top: 20px; }
        input[type="number"] {
            width: 60px;
            padding: 5px;
            margin: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;}
        select {
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;}
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color:rgb(79, 11, 77);
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;}
        button:hover {
            background-color:rgb(212, 74, 207); }
            </style>
</head>
<body>
    <h1>Calculadora de Fracciones</h1>
    <form action="procesar.php" method= "POST"> <!--Cuando el usuario hace clic en el botón, los datos se envían a ese archivo PHP.--->
        <h3>Fracción 1:</h3>
        <!--num: Campo para ingresar el numerador de la primera fracción--->
        <!--den1: Campo para ingresar el denominador--->
         <!--required: Hace que sea obligatorio llenar el campo antes de enviar el formulario.--->
        <input type="number" name="num1" required> /
        <input type="number" name="den1" required>

        <h3>Fracción 2:</h3>
        <input type="number" name="num2" required> /
        <input type="number" name="den2" required>

        <h3>Operación:</h3>
        <select name="operacion" required> <!--El valor value será enviado a procesar.php.-->
            <option value="sumar">Sumar</option> <!--cada option representa una operación que el usuario puede elegir.-->
            <option value="restar">Restar</option>
            <option value="multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>
        </select> <!--select: Menú desplegable.-->

        <br><br>
        <button type="submit">Calcular</button> <!--Envía el formulario al presionar "Calcular".-->
    </form>
</body>
</html>