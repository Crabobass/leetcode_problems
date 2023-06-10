<?php

class Solution
{

    /**
     * @param String $allowed
     * @param String[] $words
     * @return Integer
     */
    public function mergeAlternately(string $word1, string $word2): string
    {
        $result = '';
        $maxLen = max(strlen($word1), strlen($word2));
        for($i = 0; $i < $maxLen; $i++){
            $result .= $word1[$i] . $word2[$i];
        }
        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => ['abc', 'pqr'], 'output' => 'apbqcr'],
        ['input' => ['ab', 'pqrs'], 'output' => 'apbqrs'],
        ['input' => ['abcd', 'pq'], 'output' => 'apbqcd'],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->mergeAlternately($case['input'][0], $case['input'][1]) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();