<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function minimizedStringLength(string $s): int
    {
        $res = [];
        $len  = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            $res[$s[$i]] = null;
        }
        return count($res);
        // or in one string
        // return count(array_unique(str_split($s)));
    }
}

function test()
{
    $cases = [
        ['input' => "aaabc", 'output' => 3],
        ['input' => "cbbd", 'output' => 3],
        ['input' => "dddaaa", 'output' => 2],
        ['input' => "a", 'output' => 1],
        ['input' => "ipi", 'output' => 2],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->minimizedStringLength($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();