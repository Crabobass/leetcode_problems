<?php

class Solution
{
    /**
     * @param String[] $words
     * @param String $s
     * @return Integer
     */
    public function countPrefixes(array $words, string $s): int
    {
        $res = 0;
        $lenS = strlen($s);
        foreach ($words as $word) {
            $lenW = strlen($word);
            for($i = 0; $i < $lenW; $i++){
                if ($word[$i] !== $s[$i]){
                    continue(2);
                }
            }
            $res++;
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => [["a","b","c","ab","bc","abc"], 'abc'], 'output' => 3],
        ['input' => [["a","a"], 'aa'], 'output' => 2],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->countPrefixes($case['input'][0], $case['input'][1]) === $case['output'];
        $time   = round((microtime(true) - $start) * 1000000, 5);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();