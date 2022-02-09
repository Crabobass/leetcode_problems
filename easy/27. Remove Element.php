<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val) {
        foreach($nums as $i => $num){
            if ($num == $val){
                unset($nums[$i]);
            }
        }
        return count($nums);
    }
}
