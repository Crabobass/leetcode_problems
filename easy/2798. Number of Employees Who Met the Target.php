<?php

class Solution
{
    /**
     * @param Integer[] $hours
     * @param Integer $target
     * @return Integer
     */
    public function numberOfEmployeesWhoMetTarget(array $hours, int $target): int
    {
        $count = 0;
        foreach ($hours as $hour) {
            $count += ($hour >= $target) ? 1 : 0;
        }
        return $count;
    }
}

function test()
{
    $cases = [
        ['input' => [[0,1,2,3,4], 2], 'output' => 3],
        ['input' => [[5,1,4,2,2], 6], 'output' => 0],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->numberOfEmployeesWhoMetTarget($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();