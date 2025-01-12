<?php

namespace App\Solutions\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day3Part2 extends Puzzle
{
    protected string $puzzleName = "Crossed Wires";

    protected string $puzzleAnswerDescription = 'Answer';

    public function solve(): Puzzle
    {
        $lines = explode("\n", $this->puzzleInput);

        $paths = [];
        foreach ($lines as $line) {
            $steps = explode(",", trim($line));

            $x = 0;
            $y = 0;
            $pos = [];
            foreach ($steps as $step) {
                $direction = substr($step, 0, 1);
                $count = intval(substr($step, 1));

                $this->debug(sprintf("%s: %d", $direction, $count));

                switch ($direction) {
                    case 'R':
                        for ($i = 0; $i < $count; $i++) {
                            $x++;
                            $pos[] = "$x:$y";
                        }
                        break;
                    case 'L':
                        for ($i = 0; $i < $count; $i++) {
                            $x--;
                            $pos[] = "$x:$y";
                        }
                        break;
                    case 'U':
                        for ($i = 0; $i < $count; $i++) {
                            $y++;
                            $pos[] = "$x:$y";
                        }
                        break;
                    case 'D':
                        for ($i = 0; $i < $count; $i++) {
                            $y--;
                            $pos[] = "$x:$y";
                        }
                        break;
                }
            }

            $paths[] = $pos;
        }

        $smallest = PHP_INT_MAX;
        foreach (array_intersect($paths[0], $paths[1]) as $intersection) {
            $a = array_search($intersection, $paths[0]) + 1;
            $b = array_search($intersection, $paths[1]) + 1;

            $distance = $a + $b;

            $this->debug($intersection . " = " . $distance);

            if ($distance < $smallest) {
                $smallest = $distance;
            }
        }

        // Remember to finish up by setting the puzzle answer
        $this->puzzleAnswer = $smallest;

        return $this;
    }
}
