<?php

class Solution
{
    /**
     * @param String $s
     * @param String $target
     * @return Integer
     */
    public function rearrangeCharacters(string $s, string $target): int
    {
        $arS = array_count_values(str_split($s));
        $arTarget = array_count_values(str_split($target));

        $res = 100;
        foreach ($arTarget as $letter => $count) {
            if (!isset($arS[$letter]))
                return 0;

            $res = min($res, floor($arS[$letter]/$count));
        }

        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => ['ilovecodingonleetcode', 'code'], 'output' => 2],
        ['input' => ['abcba', 'abc'], 'output' => 1],
        ['input' => ['abbaccaddaeea', 'aaaaa'], 'output' => 1],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->rearrangeCharacters($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();