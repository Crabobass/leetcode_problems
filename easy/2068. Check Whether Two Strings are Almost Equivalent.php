<?php

class Solution
{
    /**
     * @param String $word1
     * @param String $word2
     * @return Boolean
     */
    function checkAlmostEquivalent(string $word1, string $word2): bool
    {
        $arW = [
            1 => array_count_values(str_split($word1)),
            2 => array_count_values(str_split($word2)),
        ];

        foreach ($arW as $ind => $word) {
            $otherWord = ($ind === 1) ? $arW[2] : $arW[1];
            foreach ($word as $letter => $count) {
                if (abs($count - $otherWord[$letter]) > 3)
                    return false;
            }
        }

        return true;
    }

}

function test()
{
    $cases = [
        ['input' => ['aaaa', 'bccb'], 'output' => false],
        ['input' => ['abcdeef', 'abaaacc'], 'output' => true],
        ['input' => ['cccddabba', 'babababab'], 'output' => true],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->checkAlmostEquivalent($case['input'][0], $case['input'][1]);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();