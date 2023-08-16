<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function maxLengthBetweenEqualCharacters(string $s): int
    {
        $res = -1;
        $ars = str_split($s);
        $map = [];
        foreach ($ars as $ind => $sym) {
            $map[$sym][] = $ind;
        }
        foreach ($map as $sym => $arIndexes) {
            if (count($arIndexes) <= 1)
                continue;
            $first = $arIndexes[0];
            $last = end($arIndexes);
            $d = $last - $first - 1;
            $res = max($res, $d);
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => 'aa', 'output' => 0],
        ['input' => 'abca', 'output' => 2],
        ['input' => 'cbzxy', 'output' => -1],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->maxLengthBetweenEqualCharacters($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();