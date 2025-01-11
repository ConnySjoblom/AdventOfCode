<?php

namespace App\Solutions\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day2Part2 extends Puzzle
{
    protected string $puzzleName = "1202 Program Alarm";

    protected string $puzzleAnswerDescription = 'Answer';

    public function solve(): Puzzle
    {
        $found = false;

        for ($n = 0; $n < 100; $n++) {
            for ($v = 0; $v < 100; $v++) {
                $memory = explode(",", $this->puzzleInput);

                $memory[1] = $n;
                $memory[2] = $v;

                for ($address = 0; $address < count($memory); $address += 4) {
                    $instruction = $memory[$address];

                    switch ($instruction) {
                        case 99:
                            break 2;
                        case 1:
                            $a_pos = $memory[$address+1];
                            $b_pos = $memory[$address+2];
                            $r_pos = $memory[$address+3];
                            $memory[$r_pos] = $memory[$a_pos] + $memory[$b_pos];

                            break;

                        case 2:
                            $a_pos = $memory[$address+1];
                            $b_pos = $memory[$address+2];
                            $r_pos = $memory[$address+3];
                            $memory[$r_pos] = $memory[$a_pos] * $memory[$b_pos];

                            break;
                    }
                }

                if ($memory[0] == 19690720) {
                    $this->info("Found match: noun = $n and verb = $v");

                    break 2;
                }

                $this->debug("noun = $n and verb = $v");
            }
        }

        $this->puzzleAnswer = (100 * $n + $v);

        return $this;
    }
}
