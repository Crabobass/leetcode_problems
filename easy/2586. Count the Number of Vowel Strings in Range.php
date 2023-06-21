<?php

class Solution
{

    /**
     * @param String[] $words
     * @param Integer $left
     * @param Integer $right
     * @return Integer
     */
    public function vowelStrings(array $words, int $left, int $right): int
    {
        $result = 0;
        $s = ['a', 'e', 'i', 'o', 'u'];
        $i = $left;
        while($i <= $right){
            if (in_array(substr($words[$i], -1), $s, true) && in_array($words[$i][0], $s, true))
                $result++;
            $i++;
        }
        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => [["are", "amy", "u"], 0, 2], 'output' => 2],
        ['input' => [["hey", "aeo", "mu", "ooo", "artro"], 1, 4], 'output' => 3],
        ['input' => [["vo","j","i","s","i"], 0, 3], 'output' => 1],

    ];

    foreach ($cases as $c) {
        $result = (new Solution)->vowelStrings($c['input'][0], $c['input'][1], $c['input'][2]) === $c['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();