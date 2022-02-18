<?php

/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function smallerNumbersThanCurrent($nums) {
    $sortNums = $nums;
    sort($sortNums, SORT_NUMERIC);

    $hashMap = [];
    foreach ($sortNums as $key => $num) {
        if (!isset($hashMap[$num]))
            $hashMap[$num] = $key;
    }
    unset($sortNums);

    $result = [];
    foreach ($nums as $num){
        $result[] = $hashMap[$num];
    }
    return $result;
}