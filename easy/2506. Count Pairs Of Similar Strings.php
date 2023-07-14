<?php

class Solution
{
    /**
     * @param String[] $words
     * @return Integer
     */
    public function similarPairs(array $words): int
    {
        $map = [];
        $res = 0;
        foreach ($words as $word){
            $key = array_unique(str_split($word));
            sort($key);
            $map[$word] = $key;
        }

        $count = count($words);
        for($i = 0; $i < $count; $i++){
            for($j = $i+1; $j < $count; $j++){
                if ($map[$words[$i]] === $map[$words[$j]]){
                    $res++;
                }
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => ["aba", "aabb", "abcd", "bac", "aabc"], 'output' => 2],
        ['input' => ["aabb", "ab", "ba"], 'output' => 3],
        ['input' => ["nba", "cba", "dba"], 'output' => 0],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->similarPairs($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();
