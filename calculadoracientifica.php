<?php
require_once 'calculadora.php';

class CalculadoraCientifica extends Calculadora {
    
    public function potencia($base, $exponente) {
        return pow($base, $exponente);
    }

    public function raizCuadrada($numero) {
        if ($numero < 0) {
            throw new Exception("Error: No se puede calcular la raíz cuadrada de un número negativo.");
        }
        return sqrt($numero);
    }
}
?>