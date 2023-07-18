<?php

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    public function areNumbersAscending(string $s): bool
    {
        $t = 0;
        foreach (explode(' ', $s) as $item) {
            if (is_numeric($item)){
                if ((int)$item > $t){
                    $t = (int) $item;
                }else{
                    return false;
                }
            }
        }
        return true;
    }
}

function test()
{
    $cases = [
        ['input' => "1 box has 3 blue 4 red 6 green and 12 yellow marbles", 'output' => true],
        ['input' => "hello world 5 x 5", 'output' => false],
        ['input' => "sunset is at 7 51 pm overnight lows will be in the low 50 and 60 s", 'output' => false],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->areNumbersAscending($case['input']);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
//        echo ' [' . $res . ']';
        echo ' ' . $time . "\r\n";
    }
}

test();