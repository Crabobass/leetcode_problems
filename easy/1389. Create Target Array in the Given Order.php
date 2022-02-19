<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer[] $index
     * @return Integer[]
     */
    function createTargetArray($nums, $index)
    {
        $n = count($nums) - 1;
        $result = [];
        for ($i = 0; $i <= $n; $i++) {
            if (isset($result[$index[$i]])) {
                $tmp = [];
                $c = count($result) - 1;
                for ($j = $index[$i]; $j <= $c; $j++) {
                    $tmp[] = $result[$j];
                    unset($result[$j]);
                }
                $result[$index[$i]] = $nums[$i];
                $result = array_merge($result, $tmp);
            } else {
                $result[$index[$i]] = $nums[$i];
            }
        }
        return $result;
    }
}