<?php

class Solution
{
    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    public function reverseStr(string $s, int $k): string
    {
        $l = strlen($s);
        $res = '';
        $repeat = $l / $k;
        for ($i = 0; $i < $repeat; $i++) {
            $res .= ($i % 2 === 0) ? strrev(substr($s, $i * $k, $k)) : substr($s, $i * $k, $k);
        }
        return $res;
    }
}


function test()
{
    $cases = [
        ['input' => ['abcdefg', 2], 'output' => 'bacdfeg'],
        ['input' => ['abcd', 2], 'output' => 'bacd'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->reverseStr($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();