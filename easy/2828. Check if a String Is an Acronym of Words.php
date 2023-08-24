<?php

class Solution
{
    /**
     * @param String[] $words
     * @param String $s
     * @return Boolean
     */
    public function isAcronym(array $words, string $s): bool
    {
        $res = '';
        foreach ($words as $word) {
            $res .= $word[0];
        }
        return $s === $res;
    }
}

function test()
{
    $cases = [
        ['input' => [["alice", "bob", "charlie"], 'abc'], 'output' => true],
        ['input' => [["an", "apple"], 'a'], 'output' => false],
        ['input' => [["never", "gonna", "give", "up", "on", "you"], 'ngguoy'], 'output' => true],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->isAcronym($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();