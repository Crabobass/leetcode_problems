<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function countGoodSubstrings(string $s): int
    {
        $res = 0;
        $len = strlen($s);
        for($i = 0; $i < $len; $i++){
            if (count(array_unique(str_split(substr($s, $i, 3)))) === 3){
                $res++;
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => 'xyzzaz', 'output' => 1],
        ['input' => 'aababcabc', 'output' => 4],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->countGoodSubstrings($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();