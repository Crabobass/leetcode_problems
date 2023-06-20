<?php

class Solution
{

    /**
     * @param String[] $words
     * @param String $pref
     * @return Integer
     */
    public function prefixCount(array $words, string $pref): int
    {
        $result = 0;
        foreach ($words as $word) {
            $result += strpos($word, $pref)===0 ? 1 : 0;
        }        
        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => [["pay", "attention", "practice", "attend"], 'at'], 'output' => 2],
        ['input' => [["leetcode", "win", "loops", "success"], 'code'], 'output' => 0],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->prefixCount($case['input'][0], $case['input'][1]) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();