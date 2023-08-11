<?php

class Solution
{
    /**
     * @param String $num
     * @return String
     */
    public function largestGoodInteger(string $num): string
    {
        $a = str_split($num);
        $m = -1;
        foreach ($a as $i => $k) {
            if ($a[$i] === $a[$i + 1] && $a[$i] === $a[$i + 2]) {
                $m = max($m, $k);
            }
        }
        return ($m === -1) ? '' : str_repeat($m, 3);
    }
}

function test()
{
    $cases = [
        ['input' => '74444', 'output' => '444'],
        ['input' => '6777133339', 'output' => '777'],
        ['input' => '2300019', 'output' => '000'],
        ['input' => '42352338', 'output' => ''],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->largestGoodInteger($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();