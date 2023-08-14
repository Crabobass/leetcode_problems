<?php

class Solution
{
    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    public function findTheDifference(string $s, string $t): string
    {
        $ars = array_count_values(str_split($s));
        $art = array_count_values(str_split($t));
        foreach ($art as $k => $n) {
            if ($n !== $ars[$k]) {
                return $k;
            }
        }
    }
}

function test()
{
    $cases = [
        ['input' => ['abcd', 'abcde'], 'output' => 'e'],
        ['input' => ['', 'y'], 'output' => 'y'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->findTheDifference($case['input'][0], $case['input'][1]) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();