<?php

namespace App\Solutions\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day1Part2 extends Puzzle
{
    protected string $puzzleName = "The Tyranny of the Rocket Equation";

    protected string $puzzleAnswerDescription = 'Fuel required';

    public function solve(): Puzzle
    {
        $input = explode("\n", $this->puzzleInput);

        $fuel_required = 0;
        foreach ($input as $module) {
            $this->calculate_fuel($module, $fuel_required);
        }

        $this->puzzleAnswer = $fuel_required;

        return $this;
    }

    private function calculate_fuel($entity, &$fuel_required): void
    {
        $new_fuel = (int) floor($entity / 3) - 2;

        if ($new_fuel > 5) {
            $this->calculate_fuel($new_fuel, $fuel_required);
        }

        $fuel_required += $new_fuel;
    }
}
