<?php

use PHPUnit\Framework\TestCase;
use Carrd\Sudoku\QuadrantCalculator;

class QuadrantCalculatorTest extends TestCase
{
    public function testRowOneAndPositionThreeReturnsOne()
    {
        $this->assertEquals(1, QuadrantCalculator::calculate(1, 3));
    }

    public function testRowThreeAndPositionThreeReturnsOne()
    {
        $this->assertEquals(1, QuadrantCalculator::calculate(3, 3));
    }

    public function testRowThreeAndPositionNineReturnsThree()
    {
        $this->assertEquals(3, QuadrantCalculator::calculate(3, 9));
    }

    public function testRowTwoAndPositionEightReturnsThree()
    {
        $this->assertEquals(3, QuadrantCalculator::calculate(2, 8));
    }
}
