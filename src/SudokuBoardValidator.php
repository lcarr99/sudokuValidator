<?php

namespace Carrd\Sudoku;

class SudokuBoardValidator
{
    private static array $errors = [];

    public static function validateRows($rows): void
    {
        foreach ($rows as $row) {
            if ($row->validate()) {
                continue;
            }
            self::$errors = array_merge($row->getErrors(), self::$errors);
        }
    }

    public static function validateColumns($columns): void
    {
        foreach ($columns as $column) {
            if ($column->validate()) {
                continue;
            }
            self::$errors = array_merge($column->getErrors(), self::$errors);
        }
    }

    public static function validateQuadrants($quadrants): void
    {
        foreach ($quadrants as $quadrant) {
            if ($quadrant->validate()) {
                continue;
            }
            self::$errors = array_merge($quadrant->getErrors(), self::$errors);
        }
    }

    public static function getErrors(): array
    {
        sort(self::$errors);

        return array_unique(self::$errors);
    }
}
