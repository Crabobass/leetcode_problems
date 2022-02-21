<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function countKDifference($nums, $k) {
        $result = 0;
        $countNums = count($nums)-1;
        for ($i = 0; $i <= $countNums; $i++) {
            for ($j = $i+1; $j <= $countNums; $j++) {
                if (abs($nums[$i]-$nums[$j]) == abs($k))
                    $result++;
            }
        }
        return $result;
    }
}