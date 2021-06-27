<?php
use PHPUnit\Framework\TestCase;
require_once(__DIR__.'\..\src\model\Cidade.php');

    final class CidadeTest extends TestCase {
        
        public function testEvaluateNumberOutOfRange():void{
            $cidade = new Cidade();

            $this->assertFalse(
                $cidade->isCepBetweenValidNumber(99999)
            );

            $this->assertFalse(
                $cidade->isCepBetweenValidNumber(100000)
            );

            $this->assertFalse(
                $cidade->isCepBetweenValidNumber(999999)
            );

            $this->assertFalse(
                $cidade->isCepBetweenValidNumber(1000000)
            );
        }

        public function testEvaluateNumberOnRange():void {
            $cidade = new Cidade();

            $this->assertTrue(
                $cidade->isCepBetweenValidNumber(100001)
            );

            $this->assertTrue(
                $cidade->isCepBetweenValidNumber(500000)
            );

            $this->assertTrue(
                $cidade->isCepBetweenValidNumber(999998)
            );
        }

        public function testEvaluateAlternatedNumber():void {
            $cidade = new Cidade();

            $this->assertTrue(
                $cidade->isCepAlternateNumberRepeated(121426)
            ); 

            $this->assertFalse(
                $cidade->isCepAlternateNumberRepeated(523563)
            ); 

            $this->assertTrue(
                $cidade->isCepAlternateNumberRepeated(552523)
            ); 
        }

        public function testCepInvalidAlternatedNumber():void {
            $this->expectException(InvalidArgumentException::class);
            $cidade = new Cidade();
            $cidade->insertCep(552523);
        }

        public function testCepInvalidOutOfRange():void {
            $this->expectException(InvalidArgumentException::class);
            $cidade = new Cidade();
            $cidade->insertCep(999999);
        }

        public function testCepValid():void {
            $cidade = new Cidade();
            $cidade->insertCep(523563);

            $this->assertEquals(
                523563,
                $cidade->getCep()
            );
        }
    }
?>



