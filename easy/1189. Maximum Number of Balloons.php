<?php

class Solution
{
    /**
     * @param String $text
     * @return Integer
     */
    public function maxNumberOfBalloons(string $text): int
    {
        $word = array_count_values(str_split('balloon'));
        $s    = array_count_values(str_split($text));
        $min  = PHP_INT_MAX;
        foreach ($word as $letter => $count) {
            if (($s[$letter] / $count > 0)) {
                $c   = floor($s[$letter] / $count);
                $min = ($min > $c) ? $c : $min;
            } else {
                return 0;
            }
        }
        return $min;
    }
}

function test()
{
    $cases = [
        ['input' => 'nlaebolko', 'output' => 1],
        ['input' => 'loonbalxballpoon', 'output' => 2],
        ['input' => 'leetcode', 'output' => 0],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->maxNumberOfBalloons($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();