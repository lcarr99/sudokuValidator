<?php

namespace Carrd\Sudoku;

class Quadrant
{
    private array $quadrantValues;
    public int $quadrantNumber;
    private $errorArray = [];

    public function __construct(int $quadrantNumber, array $quadrantValues)
    {
        $this->quadrantNumber = $quadrantNumber;
        $this->quadrantValues = $quadrantValues;
    }

    public function getQuadrantNumber(): int
    {
        return $this->quadrantNumber;
    }

    public function getQuadrantValues(): array
    {
        return $this->quadrantValues;
    }

    public function validate(): bool
    {
        $instances = array_count_values($this->quadrantValues);

        foreach ($this->quadrantValues as $value) {
            if ($value === 'x') {
                continue;
            }

            if ($instances[$value] > 1) {
                $this->errorArray[] = $this->quadrantNumber;
            }
        }

        return count($this->errorArray) > 0;
    }

    public function getErrors(): array
    {
        return $this->errorArray;
    }
}
