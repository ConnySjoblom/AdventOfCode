<?php

namespace App\Solutions\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day2Part1 extends Puzzle
{
    protected string $puzzleName = "1202 Program Alarm";

    protected string $puzzleAnswerDescription = 'Answer';

    public function solve(): Puzzle
    {
        $input = explode(",", $this->puzzleInput);

        $input[1] = 12;
        $input[2] = 2;

        for ($i = 0; $i < count($input); $i += 4) {
            $opcode = $input[$i];

            $output = "Processing $i :: $opcode :: ";

            switch ($opcode) {
                case 99:
                    break 2;
                case 1:
                    $output .= "Addition!";
                    $a_pos = $input[$i+1];
                    $b_pos = $input[$i+2];
                    $r_pos = $input[$i+3];
                    $input[$r_pos] = $input[$a_pos] + $input[$b_pos];

                    break;

                case 2:
                    $output .= "Multiplication!";
                    $a_pos = $input[$i+1];
                    $b_pos = $input[$i+2];
                    $r_pos = $input[$i+3];
                    $input[$r_pos] = $input[$a_pos] * $input[$b_pos];

                    break;
            }

            $this->debug($output);
        }

        $this->puzzleAnswer = $input[0];

        return $this;
    }
}
