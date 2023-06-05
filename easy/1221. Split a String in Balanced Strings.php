<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    public function balancedStringSplit(string $s): int
    {
        $result = 0;
        $len    = strlen($s);
        $r      = $l = 0;
        for ($i = 0; $i < $len; $i++) {
            if ($s[$i] === 'R') {
                $r++;
            } else {
                $l++;
            }
            if ($r === $l) {
                $r = $l = 0;
                $result++;
            }
        }
        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => "RLRRLLRLRL", 'output' => 4],
        ['input' => "RLRRRLLRLL", 'output' => 2],
        ['input' => "LLLLRRRR", 'output' => 1],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->balancedStringSplit($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();