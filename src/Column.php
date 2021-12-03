<?php

namespace Carrd\Sudoku;

class Column
{
    private array $columnValues;
    private array $errors = [];
    private int $columnNumber;

    public function __construct(int $columnNumber, $columnValues)
    {
        $this->columnNumber = $columnNumber;
        $this->columnValues = $columnValues;
    }

    public function getColumnValues()
    {
        return $this->columnValues;
    }

    public function getColumnNumber(): int
    {
        return $this->columnNumber;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function validate(): bool
    {
        $instances = array_count_values($this->columnValues);

        foreach ($this->columnValues as $position => $columnValue) {
            if ($columnValue === 'x') {
                continue;
            }

            if ($instances[$columnValue] > 1) {
                $this->errors[] = QuadrantCalculator::calculate($position + 1, $this->columnNumber);
            }
        }

        return count($this->errors) === 0;
    }
}
