<?php

class Solution
{
    /**
     * @param String $date
     * @return Integer
     */
    public function dayOfYear(string $date): int
    {
        return date('z', strtotime($date))+1;
    }
}

function test()
{
    $cases = [
        ['input' => '2019-01-09', 'output' => 9],
        ['input' => '2019-02-10', 'output' => 41],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->dayOfYear($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();