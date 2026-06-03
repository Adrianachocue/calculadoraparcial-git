<?php

declare(strict_types=1);

namespace App;

class Calculadora
{
    public function sumar(float $a, float $b): float
    {
        return $a + $b;
    }

    public function restar(float $a, float $b): float
    {
        return $a - $b;
    }

    public function multiplicar(float $a, float $b): float
    {
        return $a * $b;
    }

    public function dividir(float $a, float $b): float
    {
        if ($b == 0) {
            throw new \InvalidArgumentException('No se puede dividir por cero.');
        }

        return $a / $b;
    }
}