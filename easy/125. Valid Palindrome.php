<?php

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    public function isPalindrome(string $s): bool
    {
        $s = strtolower($s);
        $s = preg_replace("/[^a-z0-9]+/", "", $s);
        return $s === strrev($s);
    }
}

function test()
{
    $cases = [
        ['input' => "ab_a", 'output' => true],
        ['input' => "A man, a plan, a canal: Panama", 'output' => true],
        ['input' => "race a car", 'output' => false],
        ['input' => " ", 'output' => true],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->isPalindrome($case['input']);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();