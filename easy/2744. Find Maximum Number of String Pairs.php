<?php

class Solution
{
    /**
     * @param String[] $words
     * @return Integer
     */
    public function maximumNumberOfStringPairs(array $words): int
    {
        $res = 0;
        $l   = count($words);
        for ($i = 0; $i < $l; $i++) {
            if ($words[$i] === null)
                continue;
            for ($j = 0; $j < $l; $j++) {
                if ($i === $j || $words[$j] === null)
                    continue;
                if ($words[$i] === strrev($words[$j])){
                    $res++;
                    unset($words[$i], $words[$j]);
                }
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => ["cd", "ac", "dc", "ca", "zz"], 'output' => 2],
        ['input' => ["ab", "ba", "cc"], 'output' => 1],
        ['input' => ["aa", "ab"], 'output' => 0],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->maximumNumberOfStringPairs($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();