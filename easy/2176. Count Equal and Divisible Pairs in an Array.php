<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    public static function countPairs($nums, $k) {
        $lenNums = count($nums)-1;
        $result = 0;
        $skipInd = [];

        for($i = 0; $i <= $lenNums; $i++){
            for($j = $lenNums; $j != 0; $j--){
                if ($i == $j || $nums[$i] !== $nums[$j] || isset($skipInd[$j]))
                    continue;

                if (($i * $j) % $k === 0){
                    $result++;
                    $skipInd[$i] = 0;
                }
            }
        }

        return $result;
    }

}

// tests
$arTests = [
    ['test' => [[3,1,2,2,2,1,3], 2], 'result' => 4],
    ['test' => [[1,2,3,4], 1], 'result' => 0],
];

foreach ($arTests as $t) {
    $a1 = $t['test'][0];
    $a2 = $t['test'][1];
    $result = Solution::countPairs($a1, $a2);
    if ($result !== $t['result']) {
        print_r(Solution::countPairs($a1, $a2));
        var_dump($result);
        die();
    }
}

echo 'success';