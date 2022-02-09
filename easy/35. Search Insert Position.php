<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsertV2($nums, $target)
    {
        $p = 0;
        foreach ($nums as $num) {
            if ($target > $num) {
                $p++;
            }
        }
        return $p;
    }

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsertV1($nums, $target)
    {
        $len = count($nums) - 1;

        if ($len < 0)
            return 0;

        foreach ($nums as $i => $num) {
            if ($num == $target) {
                return $i;
            }

            if ($target > $num && $target < $nums[$i + 1] && ($i + 1 <= $len)) {
                return $i + 1;
            }

            // last position
            if ($i == $len) {
                if ($target > $num) {
                    return $len + 1;
                } else {
                    return $i;
                }
            }

            // first
            if ($i == 0 && $target < $num) {
                return 0;
            }
        }
    }
}