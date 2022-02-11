<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    static function maxSubArray($nums) {
        $lenNums = count($nums);
        $max = $nums[0];

        if ($lenNums == 1)
            return $max;

        for($i = 0; $i < $lenNums; $i++){
            $tmp = 0;
            for($j = $i; $j < $lenNums; $j++){
                $tmp += $nums[$j];
                if ($tmp > $max)
                    $max = $tmp;
            }
        }
        return $max;
    }
}

// tests
$arTests = [
    ['test' => [-2,10], 'result' => 8], // [4,-1,2,1]
    ['test' => [-2,1,-3,4,-1,2,1,-5,4], 'result' => 6], // [4,-1,2,1]
    ['test' => [1], 'result' => 1],
    ['test' => [5,4,-1,7,8], 'result' => 23],
];

foreach ($arTests as $testCase) {
    $result = Solution::maxSubArray($testCase['test']);
    if ($result !== $testCase['result']) {
        print_r($testCase['test']);
        var_dump($result);
        die();
    }
}

echo 'success';