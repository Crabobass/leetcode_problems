<?php

class Solution
{
    /**
     * @param String[] $patterns
     * @param String $word
     * @return Integer
     */
    public function numOfStrings(array $patterns, string $word): int
    {
        $result = 0;
        foreach ($patterns as $pattern) {
            if (strripos($word, $pattern) !== false)
                $result++;
        }
        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => [["a", "b", "c"], 'aaaaabbbbb'], 'output' => 2],
        ['input' => [["bc", "d"], 'abc'], 'output' => 1],
        ['input' => [["a", "abc", "bc", "d"], 'abc'], 'output' => 3],
        ['input' => [["a", "a", "a"], 'ab'], 'output' => 3],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->numOfStrings($case['input'][0], $case['input'][1]) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();