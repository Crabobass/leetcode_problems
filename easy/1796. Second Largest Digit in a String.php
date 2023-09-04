<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function secondHighest(string $s): int
    {
        $ars = array_unique(str_split(preg_replace('/[^0-9-\+\.,]+/', '', $s)));
        rsort($ars);
        return (isset($ars[1])) ? $ars[1] : -1;
    }
}

function test()
{
    $cases = [
        ['input' => 'sjhtz8344', 'output' => 4],
        ['input' => 'dfa12321afd', 'output' => 2],
        ['input' => 'abc1111', 'output' => -1],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->secondHighest($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();