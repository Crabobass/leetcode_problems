<?php

class Solution
{
    /**
     * @param String $num
     * @return String
     */
    public function largestOddNumber(string $num): string
    {
        $l = strlen($num);
        for ($i = 0; $i < $l; $i++) {
            if ((int)$num[-1 - $i] % 2 !== 0) {
                return substr($num, 0, $l - $i);
            }
        }
        return '';
    }
}

function test()
{
    $cases = [
        ['input' => '52', 'output' => '5'],
        ['input' => '4206', 'output' => ''],
        ['input' => '35427', 'output' => '35427'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->largestOddNumber($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();