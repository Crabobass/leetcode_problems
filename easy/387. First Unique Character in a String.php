<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function firstUniqChar(string $s): int
    {
        $a = array_count_values(str_split($s));
        foreach ($a as $key => $count) {
            if ($count === 1) {
                return strpos($s, $key);
            }
        }
        return -1;
    }
}

function test()
{
    $cases = [
        ['input' => 'leetcode', 'output' => 0],
        ['input' => 'loveleetcode', 'output' => 2],
        ['input' => 'aabb', 'output' => -1],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->firstUniqChar($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();