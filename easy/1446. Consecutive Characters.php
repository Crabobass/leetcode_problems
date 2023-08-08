<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function maxPower(string $s): int
    {
        $l = strlen($s);
        $m = [];
        $prev = '';
        $nowCount = 1;
        $max = 0;
        for ($i = 0; $i < $l; $i++) {
            if ($prev === $s[$i]){
                $nowCount++;
                if (!isset($m[$s[$i]]) || $m[$s[$i]] < $nowCount){
                    $m[$s[$i]]++;
                }
                if ($nowCount > $max){
                    $max = $nowCount;
                }
            }else{
                $nowCount = 0;
            }
            $prev = $s[$i];
        }
        return $max+1;
    }
}

function test()
{
    $cases = [
        ['input' => 'leetcode', 'output' => 2],
        ['input' => 'abbcccddddeeeeedeeecba', 'output' => 5],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->maxPower($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();