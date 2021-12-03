<?php

namespace Carrd\Sudoku;

class Row
{
    private array $rowValues;
    private int $rowNumber;
    private array $errors = [];

    public function setRowValues(array $rowValues): void
    {
        $this->rowValues = $rowValues;
    }

    public function getRowValues(): array
    {
        return $this->rowValues;
    }

    public function setRowNumber(int $rowNumber): void
    {
        $this->rowNumber = $rowNumber;
    }

    public function getRowNumber(): int
    {
        return $this->rowNumber;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function validate(): bool
    {
        $instances = array_count_values($this->rowValues);

        foreach ($this->rowValues as $position => $rowValue) {
            if ($rowValue === 'x') {
                continue;
            }

            if ($instances[$rowValue] > 1) {
                $this->errors[] = QuadrantCalculator::calculate($this->rowNumber, $position + 1);
            }
        }

        return count($this->errors) === 0;
    }

    public function getValueAtPosition(int $position): string
    {
        return $this->rowValues[$position];
    }
}
