<?php

namespace Carrd\Sudoku;

class SudokuBoard
{
    private array $rows;
    private int $rowNumber;
    private array $quadrants = [];
    private array $columns = [];
    private array $errors = [];

    public function setRow(array $rowValues, int $rowNumber): void
    {
        $row = new Row();
        $row->setRowValues($rowValues);
        $row->setRowNumber($rowNumber);
        $this->rows[] = $row;
    }

    public function getRows(): array
    {
        return $this->rows;
    }

    public function setColumns(): void
    {
        $position = 0;
        $columnNumber = 1;
        while ($position < count($this->rows)) {
            $columnValues = [];
            foreach ($this->rows as $row) {
                $columnValues[] = $row->getValueAtPosition($position);
            }


            $this->columns[] = new Column($columnNumber, $columnValues);

            $position++;
            $columnNumber++;
        }
    }

    public function getColumns(): array
    {
        return $this->columns;
    }

    public function setQuadrants(): void
    {
        $quadrantArray = [];
        foreach ($this->rows as $row) {
            foreach ($row->getRowValues() as $position => $value) {
                $quadrantNumber = QuadrantCalculator::calculate($row->getRowNumber(), $position + 1);

                if (isset($quadrantArray[$quadrantNumber])) {
                    $quadrantArray[$quadrantNumber][] = $value;
                } else {
                    $quadrantArray[$quadrantNumber] = [];
                    $quadrantArray[$quadrantNumber][] = $value;
                }
            }
        }

        foreach ($quadrantArray as $quadrantNumber => $quadrantValues) {
            $this->quadrants[] = new Quadrant($quadrantNumber, $quadrantValues);
        }
    }

    public function getQuadrants(): array
    {
        return $this->quadrants;
    }
}
