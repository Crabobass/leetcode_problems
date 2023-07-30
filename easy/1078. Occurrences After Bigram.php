<?php

class Solution
{
    /**
     * @param String $text
     * @param String $first
     * @param String $second
     * @return String[]
     */
    public function findOcurrences(string $text, string $first, string $second): array
    {
        $res = [];
        $arText = explode(' ', $text);
        foreach ($arText as $i => $iValue) {
            if ($iValue === $first && $arText[$i + 1] === $second) {
                if (isset($arText[$i + 2])){
                    $res[] = $arText[$i + 2];
                }
            }
        }
        return $res;
    }

}

function test()
{
    $cases = [
        ['input' => ['alice is a good girl she is a good student', 'a', 'good'], 'output' => ["girl", "student"]],
        ['input' => ['we will we will rock you', 'we', 'will'], 'output' => ["we", "rock"]],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->findOcurrences($case['input'][0], $case['input'][1], $case['input'][2]);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();