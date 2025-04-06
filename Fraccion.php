<?php
class Fraccion { //permite crear fracciones y realizar operaciones básicas entre ellas: suma, resta, multiplicación y división, además de simplificarlas//
    private $numerador;//Parte superior de la fracción//
    private $denominador; //Parte inferior de la fracción//

    public function __construct($numerador, $denominador) { //Asigna los valores iniciales al numerador y denominador.//
        $this->numerador = $numerador;
        $this->setDenominador($denominador); //Usa setDenominador() para validar que el denominador no sea 0.//
    }
 ////////////////////////////////////////////////////////////////
 //get() devuelve el valor
    public function getNumerador() { 
        return $this->numerador;
    }

    public function getDenominador() {
        return $this->denominador;
    }
////////////////////////////////////////////////////////////////
//set() cambia el valor, y en el caso del denominador, verifica que no sea cero.
    public function setNumerador($numerador) {
        $this->numerador = $numerador;
    }

    public function setDenominador($denominador) {
        if ($denominador == 0) {
            throw new Exception("El denominador no puede ser cero.");
        }
        $this->denominador = $denominador;
    }
    public function __toString() {
        return $this->numerador . '/' . $this->denominador;
}
public function simplificar() { //Usa el método mcd() para encontrar el Máximo Común Divisor (MCD) de numerador y denominador. Luego divide ambos valores entre ese MCD.
    $mcd = $this->mcd(abs($this->numerador), abs($this->denominador));
    $this->numerador /= $mcd;
    $this->denominador /= $mcd;
}

private function mcd($a, $b) { //máximo común divisor
    return ($b == 0) ? $a : $this->mcd($b, $a % $b);
}

public function sumar(Fraccion $otra) { //Formula de la suma a/b + c/d = (a*d + b*c) / (b*d)
    $num = $this->numerador * $otra->getDenominador() + $otra->getNumerador() * $this->denominador;
    $den = $this->denominador * $otra->getDenominador();
    $resultado = new Fraccion($num, $den);
    $resultado->simplificar();
    return $resultado;
}
public function restar(Fraccion $otra) { // Formula de la resta a/b - c/d = (a*d - b*c) / (b*d)
    $num = $this->numerador * $otra->getDenominador() - $otra->getNumerador() * $this->denominador;
    $den = $this->denominador * $otra->getDenominador();
    $resultado = new Fraccion($num, $den);
    $resultado->simplificar();
    return $resultado;
}

public function multiplicar(Fraccion $otra) { //Formula de la multiplicacion a/b * c/d = (a*c) / (b*d)
    $num = $this->numerador * $otra->getNumerador();
    $den = $this->denominador * $otra->getDenominador();
    $resultado = new Fraccion($num, $den);
    $resultado->simplificar();
    return $resultado;
}

public function dividir(Fraccion $otra) { //Formula de la divisicion (a/b) ÷ (c/d) = (a*d) / (b*c)
    if ($otra->getNumerador() == 0) {
        throw new Exception("No se puede dividir entre cero.");
    }
    $num = $this->numerador * $otra->getDenominador();
    $den = $this->denominador * $otra->getNumerador();
    $resultado = new Fraccion($num, $den);
    $resultado->simplificar();
    return $resultado;
}
}
?>