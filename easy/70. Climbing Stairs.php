<?php

class Solution
{
    /**
     * @param Integer $n
     * @return Integer
     */
    public function climbStairs(int $n): int
    {
        $m = [
            0 => 0,
            1 => 1,
            2 => 2,
        ];
        if (in_array($n, $m)) return $n;
        for ($i = 3; $i <= $n; $i++) {
            $m[$i] = $m[$i-1] + $m[$i-2];
        }
        return end($m);

    }
}

function test()
{
    $cases = [
        ['input' => 44, 'output' => 500],
        ['input' => 2, 'output' => 2],
        ['input' => 3, 'output' => 3],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->climbStairs($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();