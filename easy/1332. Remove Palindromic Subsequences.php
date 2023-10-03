<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function removePalindromeSub(string $s): int
    {
        // its task checks to see if you know the difference between a substring and a subsequence
        return ($s === strrev($s)) ? 1 : 2;
    }
}

function test()
{
    $cases = [
        ['input' => 'ababa', 'output' => 1],
        ['input' => 'abb', 'output' => 2],
        ['input' => 'baabb', 'output' => 2],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->removePalindromeSub($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();