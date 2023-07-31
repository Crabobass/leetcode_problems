<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    function makeGood(string $s): string
    {
        $ar = str_split($s);
        while (true) {
            $l = count($ar);
            foreach ($ar as $ind => $char) {
                if (abs(ord($ar[$ind]) - ord($ar[$ind + 1])) === 32) {
                    unset($ar[$ind]);
                    unset($ar[$ind + 1]);
                }
            }
            $nl = count($ar);

            if ($l === $nl) {
                return implode('', $ar);
            } else {
                $ar = array_values($ar);
            }
        }
    }
}

function test()
{
    $cases = [
        ['input' => 'abBAcC', 'output' => ''],
        ['input' => 'leEeetcode', 'output' => 'leetcode'],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->makeGood($case['input']);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();