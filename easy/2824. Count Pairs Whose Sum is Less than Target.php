<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    public function countPairs(array $nums, int $target): int
    {
        $n = 0;
        $c = count($nums);
        for ($i = 0; $i < $c; $i++){
            if ($nums === ($c+1))
                break;
            for ($j = $i+1; $j < $c; $j++) {
                if (($nums[$i] + $nums[$j]) < $target){
                    $n++;
                }
            }
        }
        return $n;
    }
}

function test()
{
    $cases = [
        ['input' => [[-1, 1, 2, 3, 1], 2], 'output' => 3],
        ['input' => [[-6, 2, 5, -2, -7, -1, 3], -2], 'output' => 10],
        ['input' => [[-4,-6,-7,8], -13], 'output' => 0],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->countPairs($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();