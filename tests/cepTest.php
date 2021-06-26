<?php
use PHPUnit\Framework\TestCase;
require_once(__DIR__.'\..\src\Cep.php');

    final class CepTest extends TestCase {
        
        public function testEvaluateNumberOutOfRange():void{
            $cep = new Cep();

            $this->assertFalse(
                $cep->isCepBetweenValidNumber(99999)
            );

            $this->assertFalse(
                $cep->isCepBetweenValidNumber(100000)
            );

            $this->assertFalse(
                $cep->isCepBetweenValidNumber(999999)
            );

            $this->assertFalse(
                $cep->isCepBetweenValidNumber(1000000)
            );
        }

        public function testEvaluateNumberOnRange():void {
            $cep = new Cep();

            $this->assertTrue(
                $cep->isCepBetweenValidNumber(100001)
            );

            $this->assertTrue(
                $cep->isCepBetweenValidNumber(500000)
            );

            $this->assertTrue(
                $cep->isCepBetweenValidNumber(999998)
            );
        }

        public function testEvaluateAlternatedNumber():void {
            $cep = new Cep();

            $this->assertTrue(
                $cep->isCepAlternateNumberRepeated(121426)
            ); 

            $this->assertFalse(
                $cep->isCepAlternateNumberRepeated(523563)
            ); 

            $this->assertTrue(
                $cep->isCepAlternateNumberRepeated(552523)
            ); 
        }

        public function testCepInvalidAlternatedNumber():void {
            $this->expectException(InvalidArgumentException::class);
            $cep = new Cep();
            $cep->insertCep(552523);
        }

        public function testCepInvalidOutOfRange():void {
            $this->expectException(InvalidArgumentException::class);
            $cep = new Cep();
            $cep->insertCep(999999);
        }

        public function testCepValid():void {
            $cep = new Cep();
            $cep->insertCep(523563);

            $this->assertEquals(
                523563,
                $cep->getCodigo()
            );
        }
    }
?>



