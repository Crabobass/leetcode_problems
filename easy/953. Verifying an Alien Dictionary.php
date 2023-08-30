<?php

class Solution
{
    /**
     * @param String[] $words
     * @param String $order
     * @return Boolean
     */
    public function isAlienSorted(array $words, string $order): bool
    {
        $map = array_flip(str_split($order));
        foreach ($words as $ind => $word) {
            $l = strlen($word);
            for ($i = 0; $i < $l; $i++) {
                $words[$ind][$i] = chr(97 + $map[$words[$ind][$i]]);
            }
        }
        $w = $words;
        asort($words);
        return array_keys($words) === array_keys($w);
    }
}

function test()
{
    $cases = [
        ['input' => [["apple", "app"], 'abcdefghijklmnopqrstuvwxyz'], 'output' => false],
        ['input' => [["mtkwpj", "wlaees"], 'evhadxsqukcogztlnfjpiymbwr'], 'output' => true],
        ['input' => [["hello", "leetcode"], 'hlabcdefgijkmnopqrstuvwxyz'], 'output' => true],
        ['input' => [["word", "world", "row"], 'worldabcefghijkmnpqstuvxyz'], 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->isAlienSorted($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();