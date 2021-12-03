<?php

namespace Carrd\Sudoku;

class QuadrantCalculator
{
    public static function calculate(int $row, int $position): int
    {
        $quadrant = ceil(($position) / 3);

        $boardRow = ceil($row / 3) - 1;

        $quadrant += $boardRow * 3;

        return $quadrant;
    }
}
