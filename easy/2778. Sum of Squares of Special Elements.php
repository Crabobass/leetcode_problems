<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function sumOfSquares(array $nums): int
    {
        $res = 0;
        $d = count($nums);
        foreach ($nums as $i => $num) {
            $res += ($d % ($i+1) === 0) ? $num * $num : 0;
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => [1,2,3,4], 'output' => 21],
        ['input' => [2,7,1,19,18,3], 'output' => 63],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->sumOfSquares($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();