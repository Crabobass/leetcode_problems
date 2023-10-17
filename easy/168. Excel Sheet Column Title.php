<?php

class Solution
{
    /**
     * @param Integer $columnNumber
     * @return String
     */
    public function convertToTitle(int $columnNumber): string
    {
        $r   = $columnNumber;
        $n   = 26;
        $res = '';
        for ($i = 0; $r >= 1; $i++) {
            if ($r % $n === 0) {
                $sym = $n;
                $r--;
            } else {
                $sym = $r % $n;
            }
            $res = chr($sym + 64) . $res;
            $r   = $r / $n;
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => 1, 'output' => 'A'],
        ['input' => 28, 'output' => 'AB'],
        ['input' => 701, 'output' => 'ZY'],
        ['input' => 702, 'output' => 'ZZ'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->convertToTitle($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();