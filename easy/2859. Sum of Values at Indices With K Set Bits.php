<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    public function sumIndicesWithKSetBits(array $nums, int $k): int
    {
        $res = 0;
        foreach ($nums as $i => $num) {
            if ((int)substr_count((string)decbin($i), '1') === $k) {
                $res += $num;
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => [[1], 0], 'output' => 1],
        ['input' => [[5, 10, 1, 5, 2], 1], 'output' => 13],
        ['input' => [[4, 3, 2, 1], 2], 'output' => 1],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->sumIndicesWithKSetBits($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();