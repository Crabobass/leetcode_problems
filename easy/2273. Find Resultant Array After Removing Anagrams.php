<?php

class Solution
{
    /**
     * @param String[] $words
     * @return String[]
     */
    public function removeAnagrams(array $words): array
    {

        $l = count($words);

        for ($i = 1; $i < $l; $i++) {
            $a = array_count_values(str_split($words[$i]));
            $b = array_count_values(str_split($words[$i - 1]));
            ksort($a);
            ksort($b);

            if (/*$words[$i] !== $words[$i - 1] && */$a === $b) {
                unset($words[$i]);
                $words = array_values($words);
                $i--;
                $l = count($words);
            }
        }

        return $words;
    }
}

function test()
{
    $cases = [
        ['input' => ["abba", "baba", "bbaa", "cd", "cd"], 'output' => ["abba", "cd"]],
        ['input' => ["a", "b", "c", "d", "e"], 'output' => ["a", "b", "c", "d", "e"]],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->removeAnagrams($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();