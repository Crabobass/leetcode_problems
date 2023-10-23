<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    public function maximizeSum(array $nums, int $k): int
    {
        $max = max($nums);
        $res = 0;
        for ($i = 0; $i < $k; $i++){
            $res += $max + $i;
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => [[1, 2, 3, 4, 5], 3], 'output' => 18],
        ['input' => [[5, 5, 5], 2], 'output' => 11],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->maximizeSum($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();