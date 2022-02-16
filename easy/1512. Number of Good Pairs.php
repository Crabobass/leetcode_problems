<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function numIdenticalPairs($nums) {
        $count = 0;
        $numsCount = count($nums);
        for($i = 0; $i < $numsCount; $i++){
            for($j = $i+1; $j < $numsCount; $j++){
                if ($nums[$i] == $nums[$j]){
                    $count++;
                }
            }
        }
        return $count;
    }
}