<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function differenceOfSum(array $nums): int
    {
        return array_sum($nums) - array_sum(str_split(implode('', $nums)));

    }
}

function test()
{
    $cases = [
        ['input' => [1,15,6,3], 'output' => 9],
        ['input' => [1,2,3,4], 'output' => 0],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->differenceOfSum($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();