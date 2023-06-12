<?php

class Solution
{
    /**
     * @param String $rings
     * @return Integer
     */
    public function countPoints(string $rings): int
    {
        $result=0;
        $lenR = strlen($rings);
        $tmp = [];
        for ($i = 0; $i < $lenR; $i+=2) {
            $color = $rings[$i];
            $rod = $rings[$i+1];
            $tmp[$rod][$color] = null;
        }
        foreach ($tmp as $rod) {
            if (count($rod) === 3)
                $result++;
        }
        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => "B0B6G0R6R0R6G9", 'output' => 1],
        ['input' => "B0R0G0R9R0B0G0", 'output' => 1],
        ['input' => "G4", 'output' => 0],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->countPoints($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();