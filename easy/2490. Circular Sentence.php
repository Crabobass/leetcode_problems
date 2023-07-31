<?php

class Solution
{
    /**
     * @param String $sentence
     * @return Boolean
     */
    public function isCircularSentence(string $sentence): bool
    {
        if ($sentence[0] !== $sentence[-1])
            return false;

        $arWords    = explode(' ', $sentence);
        $countWords = count($arWords);
        if ($countWords === 1)
            return true;

        foreach ($arWords as $i => $word) {
            if (isset($arWords[$i + 1]) && $arWords[$i][-1] !== $arWords[$i + 1][0])
                return false;
        }

        return true;
    }
}

function test()
{
    $cases = [
        ['input' => 'leetcode exercises sound delightful', 'output' => true],
        ['input' => 'eetcode', 'output' => true],
        ['input' => 'Leetcode is cool', 'output' => false],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->isCircularSentence($case['input']);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();