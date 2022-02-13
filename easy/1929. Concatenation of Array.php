<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function getConcatenation($nums) {
        $numLens = count($nums)-1;
        for ($i = 0; $i <= $numLens; $i++){
            $nums[] = $nums[$i];
        }
        return $nums;
    }

    //or..
    function getConcatenation2($nums) {
        return array_merge($nums, $nums);
    }

}