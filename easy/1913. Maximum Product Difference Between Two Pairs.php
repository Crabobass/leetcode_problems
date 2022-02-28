<?php 

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProductDifference($nums) {
        rsort($nums);
        $lenNums = count($nums);
        return $nums[0] * $nums[1] - $nums[$lenNums-1] * $nums[$lenNums-2];
    }
}