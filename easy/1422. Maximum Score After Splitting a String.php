<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function maxScore(string $s): int
    {
        $m = 0;
        $l = strlen($s);
        for ($i = 1; $i < $l; $i++) {
            $left  = strlen(str_replace('1', '', substr($s, 0, $i)));
            $right = strlen(str_replace('0', '', substr($s, $i, $l - $i)));
            $m = max($m, $left+$right);
        }
        return $m;
    }
}

function test()
{
    $cases = [
        ['input' => '011101', 'output' => 5],
        ['input' => '1111', 'output' => 3],
        ['input' => '00111', 'output' => 5],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->maxScore($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();