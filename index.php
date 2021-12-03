<?php

use Carrd\Sudoku\QuadrantCalculator;
use Carrd\Sudoku\SudokuBoard;
use Carrd\Sudoku\SudokuBoardValidator;

include './vendor/autoload.php';

$rows = [
    [1, 1, 3, 4, 5, 6, 7, 8, 9,],
    ['x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x',],
    ['x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x',],
    ['x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x',],
    ['x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x',],
    ['x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x',],
    ['x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x',],
    ['x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x',],
    ['x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 9,],
];

$sudokuBoard = new SudokuBoard();

$rowNumber = 1;

foreach ($rows as $row) {
    $sudokuBoard->setRow($row, $rowNumber);
    $rowNumber++;
}

$sudokuBoard->setColumns();
$sudokuBoard->setQuadrants();

SudokuBoardValidator::validateRows($sudokuBoard->getRows());
SudokuBoardValidator::validateColumns($sudokuBoard->getColumns());
SudokuBoardValidator::validateQuadrants($sudokuBoard->getQuadrants());

$errorList = SudokuBoardValidator::getErrors();

echo empty($errorList) ? 'Board Valid' : 'Errors found in quadrants: ' . implode(', ', $errorList);
