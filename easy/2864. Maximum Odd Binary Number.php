<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    public function maximumOddBinaryNumber(string $s): string
    {
        $a = array_count_values(str_split($s));
        return str_repeat('1', $a[1]-1) . str_repeat('0', $a[0]) . '1';
    }
}

function test()
{
    $cases = [
        ['input' => '010', 'output' => '001'],
        ['input' => '0101', 'output' => '1001'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->maximumOddBinaryNumber($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();