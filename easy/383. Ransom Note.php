<?php

class Solution
{
    /**
     * @param String $ransomNote
     * @param String $magazine
     * @return Boolean
     */
    public function canConstruct(string $ransomNote, string $magazine): bool
    {
        $r = array_count_values(str_split($ransomNote));
        $m = array_count_values(str_split($magazine));
        foreach ($r as $sym => $count) {
            if (!isset($m[$sym]) || $m[$sym] < $count){
                return false;
            }
        }
        return true;
    }
}

function test()
{
    $cases = [
        ['input' => ['a', 'b'], 'output' => false],
        ['input' => ['aa', 'ab'], 'output' => false],
        ['input' => ['aa', 'aab'], 'output' => true],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->canConstruct($case['input'][0], $case['input'][1]) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();