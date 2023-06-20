<?php

class Solution
{

    /**
     * @param String[] $s
     * @return void
     */
    public function reverseString(array &$s): void
    {
        $count    = count($s);
        $breakInd = intdiv($count, 2);
        for ($i = 0; $i < $breakInd; $i++) {
            $tmp                = $s[$i];
            $s[$i]              = $s[$count - $i - 1];
            $s[$count - $i - 1] = $tmp;
        }
    }

    /**
     * @param array $s
     * @return void
     */
    public function reverseStringFast(array &$s): void
    {
        $s = array_reverse($s);
    }
}

function test()
{
    $cases = [
        ['input' => ["h", "e", "l", "l", "o"], 'output' => ["o", "l", "l", "e", "h"]],
        ['input' => ["H", "a", "n", "n", "a", "h"], 'output' => ["h", "a", "n", "n", "a", "H"]],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->reverseString($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();