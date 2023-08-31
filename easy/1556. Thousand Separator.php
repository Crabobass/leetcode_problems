<?php

class Solution
{
    /**
     * @param Integer $n
     * @return String
     */
    public function thousandSeparator(int $n): string
    {
        $n = (string)$n;
        $l = strlen($n);
        $r = [];
        for ($i = 1; $i <= $l; $i++){
            array_unshift($r, $n[0-$i]);
            if ($i % 3 === 0 && isset($n[-1 - $i])) {
                array_unshift($r, '.');
            }
        }
        return implode('', $r);
    }
}

function test()
{
    $cases = [
        ['input' => 270725, 'output' => '270.725'],
        ['input' => 987, 'output' => '987'],
        ['input' => 1234, 'output' => '1.234'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->thousandSeparator($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();