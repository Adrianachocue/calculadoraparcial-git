<?php
use PHPUnit\Framework\TestCase;
use App\Calculadora;

class CalculadoraTest extends TestCase
{
    private Calculadora $calc;

    protected function setUp(): void
    {
        $this->calc = new Calculadora();
    }

    public function testSuma(): void
    {
        $this->assertEquals(5, $this->calc->sumar(2, 3));
    }

    public function testResta(): void
    {
        $this->assertEquals(1, $this->calc->restar(4, 3));
    }

    public function testMultiplicacion(): void
    {
        $this->assertEquals(12, $this->calc->multiplicar(4, 3));
    }

    public function testDivision(): void
    {
        $this->assertEquals(2, $this->calc->dividir(6, 3));
    }

    public function testDivisionPorCeroLanzaExcepcion(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->calc->dividir(5, 0);
    }
}