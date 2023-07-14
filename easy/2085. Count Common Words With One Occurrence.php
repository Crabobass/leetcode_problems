<?php

class Solution
{
    /**
     * @param String[] $words1
     * @param String[] $words2
     * @return Integer
     */
    public function countWords(array $words1, array $words2): int
    {
        $words1 = array_diff($words1, array_diff_assoc($words1, array_unique($words1)));
        $words2 = array_diff($words2, array_diff_assoc($words2, array_unique($words2)));
        return count(array_intersect($words1, $words2));
    }
}

function test()
{
    $cases = [
        ['input' => [["leetcode", "is", "amazing", "as", "is"], ["amazing", "leetcode", "is"]], 'output' => 2],
        ['input' => [["b", "bb", "bbb"], ["a", "aa", "aaa"]], 'output' => 0],
        ['input' => [["a", "ab"], ["a", "a", "a", "ab"]], 'output' => 1],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->countWords($case['input'][0], $case['input'][1]) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();