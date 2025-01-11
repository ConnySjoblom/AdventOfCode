<?php

namespace App\Solutions\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day1Part1 extends Puzzle
{
    protected string $puzzleName = "The Tyranny of the Rocket Equation";

    protected string $puzzleAnswerDescription = 'Answer';

    public function solve(): Puzzle
    {
        $input = explode("\n", $this->puzzleInput);

        $fuel_required = 0;
        foreach ($input as $module) {
            $this->debug($module);
            $fuel_required += (int) floor($module / 3) - 2;
        }

        $this->puzzleAnswer = $fuel_required;

        return $this;
    }
}
