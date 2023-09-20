<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function findTheLongestBalancedSubstring(string $s): int
    {
        $l   = strlen($s);
        $res = $tmp0 = $tmp1 = 0;
        for ($i = 0; $i < $l; $i++) {
            if ($prev === '1' && $s[$i] === '0'){
                $tmp0 = $tmp1 = 0;
            }
            if ($s[$i] === '0'){
                $tmp0++;
            }else{
                $tmp1++;
            }
            $res = max($res, min($tmp0, $tmp1) * 2);
            $prev = $s[$i];
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => '00101', 'output' => 2],
        ['input' => '001', 'output' => 2],
        ['input' => '10', 'output' => 0],
        ['input' => '00111', 'output' => 4],
        ['input' => '01000111', 'output' => 6],
        ['input' => '111', 'output' => 0],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->findTheLongestBalancedSubstring($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();