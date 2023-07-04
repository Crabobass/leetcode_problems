<?php

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    public function checkString(string $s): bool
    {
        $len = strlen($s);
        for($i = 0; $i < $len; $i++){
            if ($s[$i] === 'b' && $s[$i+1] === 'a'){
                return false;
            }
        }
        return true;
    }
}

function test()
{
    $cases = [
        ['input' => 'aaabbb', 'output' => true],
        ['input' => 'abab', 'output' => false],
        ['input' => 'bbb', 'output' => true],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->checkString($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();