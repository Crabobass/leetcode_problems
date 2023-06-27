<?php

class Solution
{
    /**
     * @param String $firstWord
     * @param String $secondWord
     * @param String $targetWord
     * @return Boolean
     */
    public function isSumEqual(string $firstWord, string $secondWord, string $targetWord)
    {
        foreach (range('a', 'j') as $k => $v) {
            $map[$v] = $k;
        }
        return self::strToInt($firstWord, $map) + self::strToInt($secondWord, $map) === self::strToInt($targetWord, $map);
    }

    public static function strToInt($s, $map): int
    {
        $len = strlen($s);
        $res = '';
        for ($i = 0; $i < $len; $i++) {
            $res .= $map[$s[$i]];
        }
        return (int) $res;
    }
}

function test()
{
    $cases = [
        ['input' => ['acb', 'cba', 'cdb'], 'output' => true],
        ['input' => ['aaa', 'a', 'aab'], 'output' => false],
        ['input' => ['aaa', 'a', 'aaaa'], 'output' => true],
    ];
    foreach ($cases as $case) {
        $result = (new Solution)->isSumEqual($case['input'][0], $case['input'][1], $case['input'][2]) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();