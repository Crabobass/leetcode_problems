<?php

class Solution
{

    /**
     * @param String $allowed
     * @param String[] $words
     * @return Integer
     */
    public function countConsistentStrings(string $allowed, array $words): int
    {
        $result    = 0;
        $allowedAr = str_split($allowed);
        foreach ($words as $word) {
            $f       = true;
            $wordLen = strlen($word);
            for ($i = 0; $i < $wordLen; $i++) {
                if (!in_array($word[$i], $allowedAr, true)) {
                    $f = false;
                    break;
                }
            }
            $result += ($f) ? 1 : 0;
        }
        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => ['ab', ["ad", "bd", "aaab", "baa", "badab"]], 'output' => 2],
        ['input' => ['abc', ["a", "b", "c", "ab", "ac", "bc", "abc"]], 'output' => 7],
        ['input' => ['cad', ["cc", "acd", "b", "ba", "bac", "bad", "ac", "d"]], 'output' => 4],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->countConsistentStrings($case['input'][0], $case['input'][1]) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();