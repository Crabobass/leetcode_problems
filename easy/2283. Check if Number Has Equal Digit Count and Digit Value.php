<?php

class Solution
{
    /**
     * @param String $num
     * @return Boolean
     */
    function digitCount(string $num): bool
    {
        $len = strlen($num);
        $t = [];
        for ($i = 0; $i < $len; $i++) {
            $t[$num[$i]]++;
            if ($num[$i] > 9) return false;
        }
        for ($j = 0; $j < $len; $j++) {
            if (($t[$j] != $num[$j] && $t[$j] !== null) || ($t[$j] === null && $num[$j] != 0))
                return false;
        }
        return true;
    }

    function digitCount2($num) {
        $num_parts = str_split($num);
        $num_counts = array_count_values($num_parts);

        foreach ($num_parts as $digit => $freq) {
            if ($num_counts[$digit] == (int)$freq) {
                continue;
            }
            return false;
        }
        return true;
    }
}

function test()
{
    $cases = [
        ['input' => "121000000032131231231231231231231231230123123123123", 'output' => false],
        ['input' => "1210", 'output' => true],
        ['input' => "030", 'output' => false],
        ['input' => "1", 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->digitCount($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 1000000, 5);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
    echo "--------------\r\n";
    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->digitCount2($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 1000000, 5);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();