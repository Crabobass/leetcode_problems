<?php

class Solution
{
    /**
     * @param Integer $num
     * @param Integer $k
     * @return Integer
     */
    public function divisorSubstrings(int $num, int $k): int
    {
        $l = strlen((string)$num);
        $parts = $l - $k + 1;
        $res = 0;
        for($i = 0; $i < $parts; $i++){
            $subnum = (int)substr((string)$num, $i, $k);
            if ($subnum === 0)
                continue;
            if ($num % $subnum === 0){
                $res++;
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => [240, 2], 'output' => 2],
        ['input' => [430043, 2], 'output' => 2],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->divisorSubstrings($case['input'][0], $case['input'][1]) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();