<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums)
    {
        arsort($nums);
        return (current($nums)-1)*(next($nums)-1);
    }
}

function test()
{
    $cases = [
        ['input' => [3, 4, 5, 2], 'output' => 12],
        ['input' => [1, 5, 4, 5], 'output' => 16],
        ['input' => [3, 7], 'output' => 12],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->maxProduct($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();