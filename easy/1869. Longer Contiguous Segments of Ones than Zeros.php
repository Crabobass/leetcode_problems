<?php

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    public function checkZeroOnes(string $s): bool
    {
        $a      = str_split($s);
        $m1     = 0;
        $m0     = 0;
        $count1 = 0;
        $count0 = 0;
        if ($s === '1') return true;
        foreach ($a as $ind => $i) {
            $next = $a[$ind+1];
            if ($next === $i) {
                if ($i == 1){
                    $count1++;
                    $m1 = max($m1, $count1);
                }else{
                    $count0++;
                    $m0 = max($m0, $count0);
                }
            }else{
                if ($i == 0){
                    $count1 = 0;
                }else{
                    $count0 = 0;
                }
            }
        }
        return $m1 > $m0;
    }
}

function test()
{
    $cases = [
        ['input' => '01', 'output' => false],
        ['input' => '1', 'output' => true],
        ['input' => '0', 'output' => false],
        ['input' => '', 'output' => false],
        ['input' => '1101', 'output' => true],
        ['input' => '111000', 'output' => false],
        ['input' => '110100010', 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->checkZeroOnes($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();