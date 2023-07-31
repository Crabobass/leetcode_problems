<?php

class Solution
{
    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary(string $a, string $b): string
    {
        $la  = strlen($a);
        $lb  = strlen($b);
        $lm  = max($la, $lb);
        $tmp = '';
        $res = '';
        for ($i = -1; abs($i) <= $lm; $i--) {
            $s = (int)$a[$i] + (int)$b[$i] + (int)$tmp;
            switch ($s) {
                case 0:
                case 1:
                    $res .= $s;
                    $tmp = '';
                    break;
                case 2:
                    $res .= '0';
                    $tmp = '1';
                    break;
                case 3:
                    $res .= '1';
                    $tmp = '1';
                    break;
            }
        }
        if (!empty($tmp)){
            $res .= $tmp;
        }

        return strrev($res);
    }
}

function test()
{
    $cases = [
        ['input' => ['11', '1'], 'output' => "100"],
        ['input' => ['1010', '1011'], 'output' => "10101"],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->addBinary($case['input'][0], $case['input'][1]);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();