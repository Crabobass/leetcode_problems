<?php

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    public function checkOnesSegment2(string $s): bool
    {
        return !(strpos($s, '1') === false || preg_match('/10+1/', $s));
    }

    /**
     * @param String $s
     * @return Boolean
     */
    public function checkOnesSegment(string $s): bool
    {
        $l = strlen($s);
        $f1 = false;
        $f0 = false;

        if (strpos($s, '1') === false)
            return false;

        for($i = 0; $i < $l; $i++){
            if ($s[$i] === '1'){
                $f1 = true;
            }
            if ($s[$i] === '0' && $f1){
                $f0 = true;
            }
            if ($f0 && $s[$i] === '1'){
                return false;
            }
        }
        return true;
    }
}

function test()
{
    $cases = [
        ['input' => '1', 'output' => true],
        ['input' => '0', 'output' => false],
        ['input' => '1001', 'output' => false],
        ['input' => '1100', 'output' => true],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->checkOnesSegment2($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();