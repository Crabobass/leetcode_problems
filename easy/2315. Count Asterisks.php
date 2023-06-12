<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function countAsterisks(string $s): int
    {
        $result = 0;
        $lenS   = strlen($s);
        $f = false;
        for ($i = 0; $i < $lenS; $i++) {
            if ($s[$i] === '|'){
                $f = $f === false;
            }
            if (!$f && $s[$i] === '*'){
                $result++;
            }
        }
        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => "l|*e*et|c**o|*de|", 'output' => 2],
        ['input' => "iamprogrammer", 'output' => 0],
        ['input' => "yo|uar|e**|b|e***au|tifu|l", 'output' => 5],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->countAsterisks($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();