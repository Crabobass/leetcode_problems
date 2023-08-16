<?php

class Solution
{
    /**
     * @param String[] $words
     * @return Boolean
     */
    public function makeEqual(array $words): bool
    {
        $c = count($words);
        $s = array_count_values(str_split(implode('', $words)));
        foreach ($s as $sym => $count) {
            if ($count % $c !== 0)
                return false;
        }
        return true;
    }
}

function test()
{
    $cases = [
        ['input' => ["abc", "aabc", "bc"], 'output' => true],
        ['input' => ["ab", "a"], 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->makeEqual($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();