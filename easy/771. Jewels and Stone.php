<?php

class Solution
{

    /**
     * @param String $jewels
     * @param String $stones
     * @return Integer
     */
    public function numJewelsInStones(string $jewels, string $stones): int
    {
        $result = 0;
        $lenS   = strlen($stones);
        $lenJ   = strlen($jewels);
        for ($s = 0; $s < $lenS; $s++) {
            for ($j = 0; $j < $lenJ; $j++) {
                if ($stones[$s] === $jewels[$j]) {
                    $result++;
                }
            }
        }
        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => ['aA', 'aAAbbbb'], 'output' => 3],
        ['input' => ['z', 'ZZ'], 'output' => 0],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->numJewelsInStones($case['input'][0], $case['input'][1]) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();