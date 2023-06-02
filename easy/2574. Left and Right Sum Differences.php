<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    public function leftRightDifference(array $nums): ?array
    {
        $allSum = array_sum($nums);
        $leftSum  = 0;
        $result = [];
        foreach ($nums as $i => $num) {
            $leftSum = ($i > 0) ? $leftSum + $nums[$i-1] : 0;
            $rightSum = $allSum-$leftSum-$num;

            $result[] = abs($leftSum - $rightSum);
        }

        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => [10, 4, 8, 3], 'output' => [15, 1, 11, 22]],
        ['input' => [1], 'output' => [0]],
        //        ['input' => [3, 7], 'output' => 12],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->leftRightDifference($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();