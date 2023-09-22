<?php

class Solution
{
    /**
     * @param String $s
     * @param String[] $words
     * @return Boolean
     */
    public function isPrefixString(string $s, array $words): bool
    {
        $res = '';
        foreach ($words as $word) {
            $res .= $word;
            if ($s === $res)
                return true;
        }
        return false;
    }
}

function test()
{
    $cases = [
        ['input' => ['iloveleetcode', ["i", "love", "leetcode", "apples"]], 'output' => true],
        ['input' => ['iloveleetcode', ["apples", "i", "love", "leetcode"]], 'output' => 'false'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->isPrefixString($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();