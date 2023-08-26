<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    public function makeFancyString(string $s): string
    {
        $arChars    = str_split($s);
        $prev       = $arChars[0];
        $tmpCounter = 1;
        foreach ($arChars as $i => $char) {
            if ($i === 0) continue;
            if ($prev === $char) {
                $tmpCounter++;
                if ($tmpCounter > 2) {
                    unset($arChars[$i]);
                }
            } else {
                $tmpCounter = 1;
            }
            $prev = $char;
        }

        return implode('', $arChars);
    }
}

function test()
{
    $cases = [
        ['input' => 'aaabaaaa', 'output' => 'aabaa'],
        ['input' => 'leeetcode', 'output' => 'leetcode'],
        ['input' => 'aab', 'output' => 'aab'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->makeFancyString($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();