<?php

class Solution
{
    /**
     * @param String[] $words
     * @return String[]
     */
    public function stringMatching(array $words): array
    {
        $res = [];
        foreach ($words as $ind => $word) {
            foreach ($words as $ind2 => $word2) {
                if (strpos($word, $word2) !== false && $ind !== $ind2){
                    $res[$word2] = 1;
                }
            }
        }
        return array_keys($res);
    }
}

function test()
{
    $cases = [
        ['input' => ["mass", "as", "hero", "superhero"], 'output' => ["as", "hero"]],
        ['input' => ["leetcode", "et", "code"], 'output' => ["et", "code"]],
        ['input' => ["blue", "green", "bu"], 'output' => []],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->stringMatching($case['input']);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();