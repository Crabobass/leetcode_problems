<?php

class Solution
{
    /**
     * @param String $s
     * @param Integer[] $distance
     * @return Boolean
     */
    public function checkDistances(string $s, array $distance): bool
    {
        $map = array_flip(range('a', 'z'));
        $checked = [];
        foreach (str_split($s) as $ind => $l){
            if (isset($checked[$l]))
                continue;

            if ($s[$ind + $distance[$map[$l]] + 1] !== $l){
                return false;
            }else{
                $checked[$l] = 1;
            }
        }
        return true;
    }
}

function test()
{
    $cases = [
        ['input' => ['abaccb', [1, 3, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]], 'output' => true],
        ['input' => ['aa', [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]], 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->checkDistances($case['input'][0], $case['input'][1]) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();