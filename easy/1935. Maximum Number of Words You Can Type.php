<?php

class Solution
{
    /**
     * @param String $text
     * @param String $brokenLetters
     * @return Integer
     */
    public function canBeTypedWords(string $text, string $brokenLetters): int
    {
        $brokens = str_split($brokenLetters);
        $words   = explode(' ', $text);
        if (!empty($brokenLetters)){
            foreach ($words as $i => $word) {
                foreach ($brokens as $broken) {
                    if (strpos($word, $broken) !== false) {
                        unset($words[$i]);
                        break;
                    }
                }
            }
        }
        return count($words);
    }
}

function test()
{
    $cases = [
        ['input' => ['"abc de"', ''], 'output' => 2],
        ['input' => ['hello world', 'ad'], 'output' => 1],
        ['input' => ['leet code', 'lt'], 'output' => 1],
        ['input' => ['leet code', 'e'], 'output' => 0],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->canBeTypedWords($case['input'][0], $case['input'][1]) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();