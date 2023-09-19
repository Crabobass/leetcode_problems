<?php

class Solution
{
    /**
     * @param String $date1
     * @param String $date2
     * @return Integer
     */
    public function daysBetweenDates(string $date1, string $date2): int
    {
        return abs(strtotime($date1)-strtotime($date2)) / 60 / 60 / 24;
    }
}

function test()
{
    $cases = [
        ['input' => ['2019-06-29', '2019-06-30'], 'output' => 1],
        ['input' => ['2020-01-15', '2019-12-31'], 'output' => 15],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->daysBetweenDates($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();