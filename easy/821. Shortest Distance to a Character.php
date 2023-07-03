<?php

class Solution
{
    /**
     * @param String $s
     * @param String $c
     * @return Integer[]
     */
    public function shortestToChar(string $s, string $c): array
    {
        $sLen = strlen($s);
        $res  = [];
        for ($i = 0; $i < $sLen; $i++) {
            if ($s[$i] === $c) {
                $res[] = 0;
                continue;
            }
            for ($j = 1; $j < $sLen; $j++) {
                $leftSym  = (($i - $j) < 0) ? null : $s[$i - $j];
                $rightSym = $s[$i + $j];
                if ($leftSym === $c || $rightSym === $c) {
                    $res[] = $j;
                    break;
                }
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => ['loveleetcode', 'e'], 'output' => [3, 2, 1, 0, 1, 0, 0, 1, 2, 2, 1, 0]],
        ['input' => ['aaab', 'b'], 'output' => [3, 2, 1, 0]],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->shortestToChar($case['input'][0], $case['input'][1]) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();