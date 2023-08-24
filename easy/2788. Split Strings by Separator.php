<?php

class Solution
{
    /**
     * @param String[] $words
     * @param String $separator
     * @return String[]
     */
    public function splitWordsBySeparator(array $words, string $separator): array
    {
        $res = [];
        foreach ($words as $str) {
            $exp = explode($separator, $str);
            foreach ($exp as $word) {
                if (!empty($word)){
                    $res[] = $word;
                }
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => [["one.two.three", "four.five", "six"], '.'], 'output' => ["one", "two", "three", "four", "five", "six"]],
        ['input' => [['$easy$', '$problem$'], '$'], 'output' => ["easy", "problem"]],
        ['input' => [["|||"], '|'], 'output' => []],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->splitWordsBySeparator($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();